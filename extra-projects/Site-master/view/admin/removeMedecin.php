
<?php
session_start();
if (isset($_SESSION['idUtilisateur'])) {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "appinfo";
    $bdd = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $value = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ?");
    $value->bind_param('s', $_SESSION['idUtilisateur']);
    $value->execute();
    $result = $value->get_result();
    $user = $result->fetch_object();
    if ($user->role == "administrateur") {
    } else {
        header("Location: main.php");
    }
} else {
    // Redirect them to the login page
    header("Location: login.php");
}
$medecinQ = $bdd->prepare("SELECT * FROM medecin WHERE idUtilisateur = ?");
$medecinQ->bind_param('s', $_GET['id']);
$medecinQ->execute();
$medecinR = $medecinQ->get_result();
$medecin = $medecinR->fetch_object();
$idcentre = $medecin->idCentre;
mysqli_query($bdd, "UPDATE medecin SET idCentre = '0' WHERE idUtilisateur = '" . $_GET['id'] . "'");
header("Location: centre.php?id=$idcentre");

?>
