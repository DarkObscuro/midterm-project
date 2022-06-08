<?php


function isAdmin(){
    if(isConnected()){
        $bdd=dbConnect();
        $user = userFromSession($bdd);
        if($user->role == "administrateur"){
           return true;
        }
        else{
            return false;
        }

    }
    else{
        return false;
    }
}

function getCentre($id,$bdd){
    $value = $bdd->prepare("SELECT * FROM centremedical WHERE numero = ?");
    $value->bind_param('s', $id);
    $value->execute();
    $result = $value->get_result();
    $centre = $result->fetch_object();
    return $centre;
}

function getBoitierQueryByCentre($bdd,$id){
    $listeBoitiers=array();
    $value = $bdd->prepare("SELECT * FROM boitier WHERE idCentre=?");
    $value->bind_param('s', $id);
    $value->execute();
    $boitiers = $value->get_result();
    while($boitier= $boitiers->fetch_array()){
        array_push($listeBoitiers,$boitier);
    }
    return $listeBoitiers;
}

function getListMedecinByCentre($bdd,$id){
    $listeMedecins=array();
    $value = $bdd->prepare("SELECT * FROM medecin WHERE idCentre=?");
    $value->bind_param('s', $id);
    $value->execute();
    $medecinListQ = $value->get_result();
    while ($row = $medecinListQ->fetch_array()) {
        $idUser = $row["idUtilisateur"];
        $test = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur=? LIMIT 1");
        $test->bind_param('s', $idUser);
        $test->execute();
        $medecinQ = $test->get_result();
        $medecine=$medecinQ->fetch_array();
        array_push($listeMedecins,$medecine);
    }
    return $listeMedecins;
}


function addCentreM(){
    
$bdd=dbConnect();
if (isset($_POST['enregistrerMed'])) {
    $errors="";
    $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
    $enseigne = mysqli_real_escape_string($bdd, $_POST['enseigne']);
    $numero = mysqli_real_escape_string($bdd, $_POST['numeroRue']);
    $rue = mysqli_real_escape_string($bdd, $_POST['rue']);
    $ville = mysqli_real_escape_string($bdd, $_POST['ville']);
    $codeP = mysqli_real_escape_string($bdd, $_POST['codeP']);
    $region = mysqli_real_escape_string($bdd, $_POST['region']);
    $nom = $enseigne . " - " . $nom;
    $adresse = $numero . " " . $rue. ", " .$codeP . " " . $ville;
    $alreadyExistQ = "SELECT * FROM centremedical WHERE adresse='$adresse' LIMIT 1";
    $result = mysqli_query($bdd, $alreadyExistQ);
    $user = mysqli_fetch_assoc($result);

    if ($user) {  
        if ($user['adresse'] === $adresse) {
            $errors = "Un centre est déjà renseigné à cette adresse";
        }
    }

    if ($errors == "") {
        $query = "INSERT INTO centremedical (adresse,nom,region) VALUES('$adresse', '$nom','$region')";
        mysqli_query($bdd, $query);

        header("Location: index.php?action=admin");
    }
}

}

function centreExist($id){

    $bdd=dbConnect();
    $value = $bdd->prepare("SELECT * FROM centremedical WHERE numero = ? LIMIT 1");
    $value->bind_param('s', $id);
    $value->execute();
    $result = $value->get_result();
    $user = $result->fetch_object();
    if(isset($user)){
        return true;
    }
    else{
        return false;
    }

}

function delCentreM(){
    $bdd=dbConnect();
    $centreQ = $bdd->prepare("SELECT * FROM centremedical WHERE numero = ?");
    $centreQ->bind_param('s', $_GET['id']);
    $centreQ->execute();
    $centreR = $centreQ->get_result();
    $centre = $centreR->fetch_object();
    $idcentre = $centre->numero;
    
    $RQ = $bdd->prepare("UPDATE medecin SET idCentre = '0' WHERE idCentre = ?");
    $RQ->bind_param('s', $idcentre);
    $RQ->execute();
    
    
    
    $delCentre = $bdd->prepare("DELETE FROM `centremedical` WHERE numero= ?");
    $delCentre->bind_param('s', $idcentre);
    $delCentre->execute();
    
    
    
    header("Location: index.php?action=admin");
    
}

function addMedecin(){
    $bdd=dbConnect();
    $username = $email = "";

    try {
        if (isset($_GET['idU'])) {
            $first = $bdd->prepare("UPDATE medecin SET idCentre = ? WHERE idUtilisateur = ?");
            $idMedecin = $_GET["idU"];
            $idCentreT = $_GET['idC'];

            $first->bind_param('ss', $idCentreT, $_GET["idU"]);
            $first->execute();
            header("Location: index.php?action=centre&id=" . $idCentreT);
        }
    } catch (Exception $e) {
        print_r($e);
    }
        
        
        
    if (isset($_POST['enregistrerMed'])) {
        // receive all input values from the form
        $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
        $prenom = mysqli_real_escape_string($bdd, $_POST['prenom']);
        $adresse = mysqli_real_escape_string($bdd, $_POST['adresse']);
        $numeroSS = mysqli_real_escape_string($bdd, $_POST['numeroSS']);
        $email = mysqli_real_escape_string($bdd, $_POST['email']);
        $password_1 = mysqli_real_escape_string($bdd, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($bdd, $_POST['password_2']);
        if ($password_1 != $password_2) {
            $errors = "The two passwords do not match";
        }
        $password_hashed_1 = password_hash($password_1, PASSWORD_DEFAULT);

        $alreadyExistQ = "SELECT * FROM utilisateur WHERE mail='$email' LIMIT 1";
        $result = mysqli_query($bdd, $alreadyExistQ);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['mail'] === $email) {
                $errors = "email already exists";
            }
        }

        // Finally, register user if there are no errors in the form
        if ($errors == "") {
            $query = "INSERT INTO utilisateur (mail,prenom,nom,adresse,role,motdepasse) VALUES('$email', '$prenom', '$nom','$adresse','medecin','$password_hashed_1')";
            mysqli_query($bdd, $query);
            
            $Reqbdd2 = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
            $Reqbdd2->bind_param('s', $email);
            $Reqbdd2->execute();
            $resultReq2 = $Reqbdd2->get_result();
            $medecin = $resultReq2->fetch_object();
            $idUser = "";
            $idCentre = $_GET["idC"];
            $idUser = $medecin->idUtilisateur;
            $query2 = "INSERT INTO medecin (idUtilisateur,idCentre,numeroSS) VALUES('$idUser', '$idCentre', '$numeroSS')";
            mysqli_query($bdd, $query2);

            header("Location: index.php?action=centre&id=".$idCentre);
        }
    }

}

function getListMedecinWithoutCentre(){
    $listeMedecinScentre=array();
    $bdd=dbConnect();
    $id=0;
    $medecinRQ = $bdd->prepare("SELECT * FROM medecin WHERE idCentre= ?");
    $medecinRQ->bind_param('s', $id);
    $medecinRQ->execute();
    $medecins = $medecinRQ->get_result();
    while ($medecin = $medecins->fetch_array()) {
        $userRQ = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur= ?");
        $idUSer=$medecin['idUtilisateur'];
        $userRQ->bind_param('s', $idUSer);
        $userRQ->execute();
        $users = $userRQ->get_result();
        $user = $users->fetch_array();
        array_push($listeMedecinScentre,$user);
    }
    return $listeMedecinScentre;        
}

function addBoitier(){
$bdd=dbConnect();
$username = $email = "";
$idCentre = $_GET['idC'];
$numBoitier = "";
$errors = "";
if (isset($_POST['enregistrerMed'])) {
    $numBoitier = mysqli_real_escape_string($bdd, $_POST['numeroBoitier']);

    $alreadyExistQ = "SELECT * FROM boitier WHERE idBoitier='$numBoitier' LIMIT 1";
    $result = mysqli_query($bdd, $alreadyExistQ);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists    
        if ($user['idBoitier'] === $numBoitier) {
            $errors = "Ce boitier est déjà assigné à un centre";
        }
    }
    $idCentre = $_GET['idC'];

    // Finally, register user if there are no errors in the form
    if ($errors == "") {
        $query = "INSERT INTO boitier (idBoitier,idCentre) VALUES('$numBoitier', '$idCentre')";
        mysqli_query($bdd, $query);
        header("Location: index.php?action=centre&id=" . $idCentre);
    }
}
return $errors;



}
function verifDelBoiterM(){
    $nom = $prenom = $adresse = $numeroSecu = "OUI";
    $bdd=dbConnect();
    $value = $bdd->prepare("SELECT * FROM boitier WHERE idBoitier = ?");
    $value->bind_param('s', $_GET["idB"]);
    $value->execute();
    $result = $value->get_result();
    $boitier = $result->fetch_array();
    $idBoitier = $boitier["idBoitier"];
    $idCentre = $boitier["idCentre"];
    $boitierQ = $bdd->query("SELECT * FROM centremedical WHERE numero=$idCentre");
    $centre = $boitierQ->fetch_array();
    $listInfoBoitier=array();
    array_push($listInfoBoitier,$boitier);
    array_push($listInfoBoitier,$centre);
    return $listInfoBoitier;
}

function removeBoitierM(){
    $bdd=dbConnect();
    $boitierQ = $bdd->prepare("SELECT * FROM boitier WHERE idBoitier = ?");
    $boitierQ->bind_param('s', $_GET['idB']);
    $boitierQ->execute();
    $boitierR = $boitierQ->get_result();
    $boitier = $boitierR->fetch_object();
    $idBoitier = $boitier->idBoitier;
    $idcentre = $boitier->idCentre;
    mysqli_query($bdd, "DELETE FROM `boitier` WHERE idBoitier= $idBoitier");
    header("Location: index.php?action=centre&id=$idcentre");
}


function verifDelMedecinM(){
    $nom = $prenom = $adresse = $numeroSecu = "OUI";
    $bdd=dbConnect();
    $medecinRQ = $bdd->prepare("SELECT * FROM medecin WHERE idUtilisateur = ?");
    $medecinRQ->bind_param('s', $_GET["idM"]);
    $medecinRQ->execute();
    $medecinR = $medecinRQ->get_result();
    $medecin = $medecinR->fetch_array();

    $idCentre = $medecin["idCentre"];
    $idMedecin= $medecin["idMedecin"];
    $idUtilisateur = $medecin["idUtilisateur"];


    $userRQ = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur= ?");
    
    $userRQ->bind_param('s',$idUtilisateur);
    $userRQ->execute();
    $userR = $userRQ->get_result();
    $user = $userR->fetch_array();
    
    $listInfoMedecin=array();
    array_push($listInfoMedecin,$idCentre);
    array_push($listInfoMedecin,$user);
    return $listInfoMedecin;
}

function removeMedecinM(){
    $bdd=dbConnect();
    $medecinQ = $bdd->prepare("SELECT * FROM medecin WHERE idUtilisateur = ?");
    $medecinQ->bind_param('s', $_GET['id']);
    $medecinQ->execute();
    $medecinR = $medecinQ->get_result();
    $medecin = $medecinR->fetch_object();
    $idcentre = $medecin->idCentre;
    mysqli_query($bdd, "UPDATE medecin SET idCentre = '0' WHERE idUtilisateur = '" . $_GET['id'] . "'");
    header("Location: index.php?action=centre&id=$idcentre");

}