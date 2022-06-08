<?php
require('model/patient.php');

function patient()
{
    if (isPatient()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $patient = getPatientbyId($user->idUtilisateur, $bdd);
        $listeTests = getListTestsPatient($bdd, $patient);
        require("view/patient/patient.php");
    } else {
        redirect();
    }
}


function accesTest()
{
    if (isPatient()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $patient = getPatientbyId($user->idUtilisateur, $bdd);
        if (verifyAcessPatient($bdd, $user, $patient)) {
            $resultTest = getTestResults($bdd);
            require("view/patient/test.php");
        } else {
            redirect();
        }
    } else {
        redirect();
    }
}
