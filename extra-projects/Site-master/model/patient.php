<?php

function isPatient()
{
    if (isConnected()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        if ($user->role == "patient") {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getPatientbyId($id, $bdd)
{
    $patientRQ = $bdd->prepare("SELECT * FROM patient WHERE idUtilisateur= ?");
    $patientRQ->bind_param('s', $id);
    $patientRQ->execute();
    $patientR = $patientRQ->get_result();
    $patient = $patientR->fetch_array();
    return $patient;
}

function verifyAcessPatient($bdd, $user, $patient)
{
    if (isset($_SESSION['idUtilisateur'])) {

        $idTest = $_GET["idTest"];
        $value = $bdd->prepare("SELECT * FROM test WHERE idTest = ?");
        $value->bind_param('s', $idTest);
        $value->execute();
        $result = $value->get_result();
        $test = $result->fetch_array();

        if ($test["idPatient"] == $patient["idPatient"]) {
            return true;
        } else {
            return false;
        }
    } else {
        // Redirect them to the login page
        return false;
    }
}

function getListTestsPatient($bdd, $patient)
{
    $idP = $patient["idPatient"];
    $listeTests = array();
    $tests = $bdd->prepare("SELECT * FROM test WHERE idPatient=?");
    $tests->bind_param('s', $idP);
    $tests->execute();
    $testR = $tests->get_result();
    while ($test = $testR->fetch_array()) {
        array_push($listeTests, $test);
    }
    return $listeTests;
}
