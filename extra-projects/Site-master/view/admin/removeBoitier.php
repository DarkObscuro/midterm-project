
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
$boitierQ = $bdd->prepare("SELECT * FROM boitier WHERE idBoitier = ?");
$boitierQ->bind_param('s', $_GET['idB']);
$boitierQ->execute();
$boitierR = $boitierQ->get_result();
$boitier = $boitierR->fetch_object();
$idBoitier = $boitier->idBoitier;
$idcentre = $boitier->idCentre;
mysqli_query($bdd, "DELETE FROM `boitier` WHERE idBoitier= $idBoitier");
header("Location: centre.php?id=$idcentre");


?>
