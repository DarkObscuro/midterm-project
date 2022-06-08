<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



function loginM()
{
    try {
        $bdd = dbConnect();

        $mail = $mdp = " ";
        $mailErr = $mdpErr = " ";
        $resultat = " ";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //Test de l'entrée de l'email
            if (empty($_POST["email"])) {
                $mailErr = "Une adresse mail est demandée";
            } else {
                $mail = htmlspecialchars($_POST["email"]);
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $mailErr = "Mauvais format d'adresse mail";
                }
            }

            //Test de l'entrée du mdp
            if (empty($_POST["motdepasse"])) {
                $mdpErr = "Un mot de passe est demandée";
            } else {
                $mdp = trim($_POST["motdepasse"]);
                $mdp = stripslashes($_POST["motdepasse"]);
                $mdp = htmlspecialchars($_POST["motdepasse"]);
            }

            $query = 'SELECT * FROM utilisateur WHERE mail = ?';
            $req = $bdd->prepare($query);
            $req->bind_param('s', $_POST["email"]);
            $req->execute();
            $result = $req->get_result();
            $user = $result->fetch_object();
            $hashed = $user->motdepasse;
            $solution = $_POST['motdepasse'];

            if (isset($user)) {
                if (password_verify($solution, $hashed)) {
                    $_SESSION['idUtilisateur'] = $user->idUtilisateur;
                    $resultat = "Connexion réussie";
                    header("Location: index.php?action=redirect");
                } else {
                    $resultat = "email ou mot de passe incorect";
                }
            } else {
                $resultat = "email ou mot de passe incorect";
            }
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $resultat;
}



function profilRedirect()
{
    if (isset($_SESSION['idUtilisateur'])) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        if ($user->role == "administrateur") {
            header("Location: index.php?action=admin");
        } elseif ($user->role == "medecin") {
            header("Location: index.php?action=medecin");
        } else {
            header("Location: index.php?action=patient");
        }
    } else {
        // Redirect them to the login page
        header("Location: index.php?action=login");
    }
}


function logoutUser()
{
    //logout.php  
    session_start();
    session_destroy();
    header("location:main.php");
}


function envoyerMail($objet, $message, $envoyeur)
{
    require 'public/PHPMailer/src/Exception.php';
    require 'public/PHPMailer/src/PHPMailer.php';
    require 'public/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->setLanguage('fr', 'public/PHPMailer/language/');
    try {
        //Server settings

        $mail->SMTPDebug = 0; // Niveau de debug
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP(); // Utiliser SMTP
        $mail->Host = 'ssl0.ovh.net'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = ''; // SMTP username
        $mail->Password = ''; // SMTP password
        $mail->SMTPSecure = 'TLS'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //En-tete
        $mail->setFrom('contact@chateaudepierrefitte.com', $envoyeur); //Envoyeur
        $mail->addAddress('appinfog8d@gmail.com', 'Receveur'); // Receveur
        $mail->addReplyTo($envoyeur, 'Information'); //Répondre à

        // Contenue
        $mail->isHTML(true); // Format HTML
        $mail->Subject = 'ticket : '. $envoyeur ; //Objet
        $mail->Body = $message; //Texe
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; //Texte si non HTML

        $mail->send();
        echo '<p style="color: Green">Votre message a bien été envoyé.</p>';
        header("Location: index.php?action=patienter");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function MenuConnected()
{
    if (isset($_SESSION['idUtilisateur'])) {
        $loginMsg = "Mon profil";
        $profilconnecte = "Se déconnecter";
        $header = "header3";
        return array($loginMsg, $profilconnecte, $header);
    } else {
        // Redirect them to the login page
        $loginMsg = "Se connecter";
        $profilconnecte = "";
        $header = "header3";
        return array($loginMsg, $profilconnecte, $header);
    }
}


function dbConnect()
{
    try {
        $db_host = "";
        $db_user = "";
        $db_pass = "";
        $db_name = "";
        $bdd = new mysqli($db_host, $db_user, $db_pass, $db_name);
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function  userFromSession($bdd)
{
    $bdd = dbConnect();
    $value = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ?");
    $value->bind_param('s', $_SESSION['idUtilisateur']);
    $value->execute();
    $result = $value->get_result();
    $user = $result->fetch_object();
    return $user;
}

function isConnected()
{
    if (isset($_SESSION['idUtilisateur'])) {
        return true;
    } else {
        return false;
    }
}
