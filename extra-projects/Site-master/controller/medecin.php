<?php
require('model/medecin.php');

function medecin()
{
    if (isMedecin()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $medecin = getMedecinById($user->idUtilisateur, $bdd);
        $idCentre = $medecin["idCentre"];
        $idM = $medecin["idMedecin"];
        $listePatients = getListPatientOfMedecin($bdd, $idM, $idCentre);
        require("view/medecin/medecin.php");
    } else {
        redirect();
    }
}
function profilPatient()
{
    if (isMedecin()) {

        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $medecin = getMedecinById($user->idUtilisateur, $bdd);
        $patient = getUserByIdP($bdd);
        $patientInfo = getPatientByIdP($bdd);
        if($patientInfo["idMedecin"]==$medecin["idMedecin"]){
            $listeTests = getListTests($bdd);
            require("view/medecin/profilPatient.php");

        }
        else{
            redirect();
        }
        
    } else {
        redirect();
    }
}

function test()
{
    $bdd = dbConnect();
    $user = userFromSession($bdd);
    if (verifyAcessTest($bdd, $user)) {
        $medecin = getMedecinById($user->idUtilisateur, $bdd);
        $patient = getUserByIdP($bdd);
        $listeTests = getListTests($bdd);
        $resultTest = getTestResults($bdd);

        require("view/medecin/test.php");
    } else {
        redirect();
    }
}
function newTest()
{
    if (isMedecin()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $medecin = getMedecinById($user->idUtilisateur, $bdd);
        $listeBoitier = getListBoitier($bdd, $medecin);
        $message = newTestM($bdd, $medecin);
        require("view/medecin/newTest.php");
    } else {
        redirect();
    }
}
function ajoutPatient()
{
    if (isMedecin()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $medecin = getMedecinById($user->idUtilisateur, $bdd);
        $listePatients = getListPatientWithoutMedecin($medecin);
        addPatient($medecin);
        require("view/medecin/ajoutPatient.php");
    } else {
        redirect();
    }
}

function testEnCours()
{
    if (isMedecin()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $medecin = getMedecinById($user->idUtilisateur, $bdd);
        require("view/medecin/testEnCours.php");
    } else {
        redirect();
    }
}
