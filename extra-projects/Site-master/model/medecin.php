<?php

function isMedecin()
{
    if (isConnected()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        if ($user->role == "medecin") {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getMedecinById($id, $bdd)
{
    $medecinRQ = $bdd->prepare("SELECT * FROM medecin WHERE idUtilisateur= ?");
    $medecinRQ->bind_param('s', $id);
    $medecinRQ->execute();
    $medecinR = $medecinRQ->get_result();
    $medecin = $medecinR->fetch_array();
    return $medecin;
}

function getListPatientOfMedecin($bdd, $idM, $idCentre)
{
    $ListePatient = array();
    $patients = $bdd->prepare("SELECT * FROM patient WHERE idMedecin= ? AND idCentre= ?");
    $patients->bind_param('ss', $idM, $idCentre);
    $patients->execute();
    $medecinR = $patients->get_result();

    while ($row = $medecinR->fetch_array()) {
        $patientRQ = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur= ?");
        $patientRQ->bind_param('s', $row["idUtilisateur"]);
        $patientRQ->execute();
        $patientR = $patientRQ->get_result();
        $patient = $patientR->fetch_array();
        $patient["idPatient"] = $row["idPatient"];
        $patient["idMedecin"] = $row["idMedecin"];
        $patient["numeroSS"] = $row["numeroSS"];
        array_push($ListePatient, $patient);
    }
    return $ListePatient;
}

function getUserByIdP($bdd)
{
    $value = $bdd->prepare("SELECT * FROM patient WHERE idPatient = ?");
    $value->bind_param('s', $_GET["idP"]);
    $value->execute();
    $result = $value->get_result();
    $patient = $result->fetch_array();

    $value2 = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ?");
    $value2->bind_param('s', $patient["idUtilisateur"]);
    $value2->execute();
    $result2 = $value2->get_result();
    $patientInfo = $result2->fetch_array();

    return $patientInfo;
}
function getPatientByIdP($bdd)
{
    $value = $bdd->prepare("SELECT * FROM patient WHERE idPatient = ?");
    $value->bind_param('s', $_GET["idP"]);
    $value->execute();
    $result = $value->get_result();
    $patient = $result->fetch_array();
    return $patient;
}

function getListTests($bdd)
{
    $listeTests = array();
    $tests = $bdd->prepare("SELECT * FROM test WHERE idPatient=?");
    $tests->bind_param('s', $_GET["idP"]);
    $tests->execute();
    $testR = $tests->get_result();


    while ($test = $testR->fetch_array()) {
        array_push($listeTests, $test);
    }
    return $listeTests;
}
function verifyAcessTest($bdd, $user)
{
    if (isset($_SESSION['idUtilisateur'])) {



        $value = $bdd->prepare("SELECT * FROM medecin WHERE idUtilisateur = ?");
        $value->bind_param('s', $user->idUtilisateur);
        $value->execute();
        $result = $value->get_result();
        $medecin = $result->fetch_object();
        /*
        $value = $bdd->prepare("SELECT * FROM patient WHERE idUtilisateur = ?");
        $value->bind_param('s', $user->idUtilisateur);
        $value->execute();
        $result = $value->get_result();
        $patient = $result->fetch_object();
    */
        $idTest = $_GET["idTest"];
        $value = $bdd->prepare("SELECT * FROM test  WHERE idTest = ?");
        $value->bind_param('s', $idTest);
        $value->execute();
        $result = $value->get_result();
        $test = $result->fetch_array();



        if ($user->role == "medecin" && $test["idMedecin"] == $medecin->idMedecin) {
            return true;
        }
        /*elseif ($user->role == "patient" && $test["idPatient"] == $patient->idPatient) {
        } */ else {
            return false;
        }
    } else {
        // Redirect them to the login page
        return false;
    }
}

function getTestResults($bdd)
{
    $testResults = array();
    $idTest = $_GET["idTest"];


    $testQ = $bdd->prepare("SELECT * FROM test  WHERE idTest = ?");
    $testQ->bind_param('s', $idTest);
    $testQ->execute();
    $testR = $testQ->get_result();
    $test = $testR->fetch_array();

    $mesuresQ = $bdd->prepare("SELECT * FROM mesure  WHERE idTest = ?");
    $mesuresQ->bind_param('s', $idTest);
    $mesuresQ->execute();
    $mesuresR = $mesuresQ->get_result();
    $mesures = $mesuresR->fetch_array();

    array_push($testResults, $mesures);
    array_push($testResults, $test);
    return $testResults;
}




function newTestM($bdd, $medecin)
{
    if (isset($_POST['idBoitier'])) {
        // receive all input values from the form

        $idBoitier = $_POST["idBoitier"];
        $date = date("Y-m-d");                     // 2001-03-10(le format DATE de MySQL)
        $idP = $_GET["idP"];
        $idMedecin = $medecin["idMedecin"];
        $resultat = rand(0, 20);

        $query = "INSERT INTO test (resultat,date,idPatient,idMedecin) VALUES('$resultat','$date', '$idP','$idMedecin')";
        mysqli_query($bdd, $query);
        $idTest = $bdd->insert_id; // Cette ligne récupère le dernier id généré automatiquement ( celui du nouveau test médical)
        $value = $bdd->prepare("SELECT * FROM test WHERE idTest = ?");
        $value->bind_param('s', $idTest);
        $value->execute();
        $result = $value->get_result();
        $testResult = $result->fetch_array();

        $idTest = $testResult["idTest"];

        $fq = rand(0, 100);
        $temp = rand(0, 100);
        $audio = rand(0, 100);
        $reactivite = rand(0, 100);
        $query = "INSERT INTO mesure (idTest,fq,temp,audio,reactivite) VALUES($idTest, $fq,$temp,$audio,$reactivite)";
        mysqli_query($bdd, $query);

        header("Location: index.php?action=testEnCours&idP=" . $idP);
    }
}

function getListBoitier($bdd, $medecin)
{
    $idCentre = $medecin["idCentre"];
    $listeBoitiers = array();
    $value = $bdd->prepare("SELECT * FROM boitier WHERE idCentre = ?");
    $value->bind_param('s', $idCentre);
    $value->execute();
    $result = $value->get_result();

    while ($listBoitier = $result->fetch_array()) {
        array_push($listeBoitiers, $listBoitier["idBoitier"]);
    }
    return $listeBoitiers;
}

function addPatient($medecin)
{
    $bdd = dbConnect();
    $username = $email = "";

    try {

        if (isset($_GET['idP'])) {
            $first = $bdd->prepare("UPDATE patient SET idMedecin = ? WHERE idPatient = ?");
            $idMedecin = $medecin["idMedecin"];
            $idPatient = $_GET['idP'];
            $first->bind_param('ss', $idMedecin, $idPatient);
            $first->execute();
            header("Location: index.php?action=medecin");
        }
    } catch (Exception $e) {
        print_r($e);
    }


    $nom = "";
    $prenom = "";
    $adresse = "";
    $numeroSS = "";
    $email = "";
    $password_1 = "";
    $password_2 = "";
    $errors = "";



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

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
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
            $query = "INSERT INTO utilisateur (mail,prenom,nom,adresse,role,motdepasse) VALUES('$email', '$prenom', '$nom','$adresse','patient','$password_hashed_1')";
            mysqli_query($bdd, $query);
            $Reqbdd2 = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
            $Reqbdd2->bind_param('s', $email);
            $Reqbdd2->execute();
            $resultReq2 = $Reqbdd2->get_result();
            $patient = $resultReq2->fetch_object();
            $idUser = "";

            $idUser = $patient->idUtilisateur;
            $idMedecin = $medecin["idMedecin"];
            $idCentre = $medecin["idCentre"];
            $query2 = "INSERT INTO patient (idUtilisateur,idCentre,numeroSS,idMedecin) VALUES('$idUser', '$idCentre', '$numeroSS','$idMedecin')";
            mysqli_query($bdd, $query2);

            header("Location: index.php?action=medecin");
        }
    }
}

function getListPatientWithoutMedecin($medecin)
{
    $listePatientSmedecin = array();
    $bdd = dbConnect();
    $id = $medecin["idCentre"];
    $idMedecin = $medecin["idMedecin"];
    $patientsRQ = $bdd->prepare("SELECT * FROM patient WHERE idCentre= ? AND idMedecin NOT LIKE ?");
    $patientsRQ->bind_param('ss', $id, $idMedecin);
    $patientsRQ->execute();
    $patients = $patientsRQ->get_result();
    while ($patient = $patients->fetch_array()) {
        $userRQ = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur= ?");
        $idUSer = $patient['idUtilisateur'];
        $userRQ->bind_param('s', $idUSer);
        $userRQ->execute();
        $users = $userRQ->get_result();
        $user = $users->fetch_array();
        $user["idPatient"] = $patient["idPatient"];
        $user["idMedecin"] = $patient["idMedecin"];
        array_push($listePatientSmedecin, $user);
    }
    return $listePatientSmedecin;
}
