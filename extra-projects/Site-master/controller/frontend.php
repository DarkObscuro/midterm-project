<?php

require('model/frontend.php');

function error()
{
    require('view/frontend/error.php');
}

function faq()
{
    require('view/frontend/faq.php');
}

function contactus()
{
    require('view/frontend/nousContacter.php');
}

function professionnel()
{
    require('view/frontend/professionnel.php');
}

function main()
{
    require('view/frontend/main.php');
}

function sav()
{
    require('view/frontend/SAV.php');
}
function cgu()
{
    require('view/frontend/CGU.php');
}
function envoiMail()
{

    require('view/frontend/envoiMail.php');
}
function patienter()
{
    require('view/frontend/patienter.php');
}

function menu()
{
    $menu = MenuConnected();
    require("view/frontend/menu.php");
}
function logout()
{
    logoutUser();
    header("location:index.php");
}
function login()
{
    if (isConnected()) {

        redirect();
    } else {
        $resultat = loginM();
        require("view/frontend/login.php");
    }
}

function redirect()
{
    profilRedirect();
}
