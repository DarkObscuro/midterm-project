<?php
require('model/admin.php');

function admin()
{
    if (isAdmin()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        require("view/admin/admin.php");
    } else {
        redirect();
    }
}

function centre()
{
    if (isAdmin()) {
        $bdd = dbConnect();
        $user = userFromSession($bdd);
        $centre = getCentre($_GET["id"], $bdd);
        $listeBoitiers = getBoitierQueryByCentre($bdd, $_GET["id"]);
        $medecinList = getListMedecinByCentre($bdd, $_GET["id"]);
        require("view/admin/centre.php");
    } else {
        redirect();
    }
}

function ajoutBoitier()
{
    if (isAdmin()) {
        $errors = "";
        addBoitier();

        require("view/admin/ajoutBoitier.php");
    } else {
        redirect();
    }
}
function verifDelBoitier()
{
    if (isAdmin()) {
        $listeInfoBoitier = verifDelBoiterM();
        $boitier = $listeInfoBoitier[0];
        $centre = $listeInfoBoitier[1];
        require("view/admin/verifDelBoitier.php");
    } else {
        redirect();
    }
}
function medSupp()
{
    if (isAdmin()) {
    } else {
        redirect();
    }
}

function verifDelCentre()
{
    if (isAdmin()) {
        $bdd = dbConnect();
        require("view/admin/verifDelCentre.php");
    } else {
        redirect();
    }
}
function ajoutCentre()
{
    if (isAdmin()) {
        require("view/admin/addCentre.php");
    } else {
        redirect();
    }
}

function delCentre()
{
    if (isAdmin()) {
        delCentreM();
    } else {
        redirect();
    }
}

function ajoutMedecin()
{
    if (isAdmin()) {
        addMedecin();
        $id = $_GET["idC"];
        $listeMedecinsSansCentre = getListMedecinWithoutCentre();
        $idCentre = $id;

        require("view/admin/ajoutMedecin.php");
    } else {
        redirect();
    }
}

function removeBoitier()
{
    if (isAdmin()) {
        removeBoitierM();
    } else {
        redirect();
    }
}

function verifDelMedecin()
{
    if (isAdmin()) {
        $listeInfoMedecin = verifDelMedecinM();
        $idCentre = $listeInfoMedecin[0];
        $user = $listeInfoMedecin[1];
        require("view/admin/verifDelMedecin.php");
    } else {
        redirect();
    }
}


function removeMedecin()
{
    if (isAdmin()) {
        removeMedecinM();
    } else {
        redirect();
    }
}
function carte()
{
    if(isAdmin()){
        require("view/admin/CarteApp2.php");
    }
    else{
        redirect();
    }
}
function liste()
{
    if (isAdmin()){
        $bdd=dbConnect();
        $user=userFromSession($bdd);
        $region=$_GET["id"];
        require("view/admin/liste.php");
    }
}
