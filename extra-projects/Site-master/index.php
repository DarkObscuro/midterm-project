
<?php
session_start();
require('controller/frontend.php');
require('controller/admin.php');
require('controller/medecin.php');
require('controller/patient.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case ('main'):
            main();
            break;
        case ('faq'):
            faq();
            break;
        case ('contactus'):
            contactus();
            break;
        case ('Professionnel'):
            professionnel();
            break;
        case ('SAV'):
            sav();
            break;
        case ('CGU'):
            cgu();
            break;
        case ('envoiMail'):
            envoiMail();
            break;
        case ('patienter'):
            patienter();
            break;
        case ('logout'):
            logout();
            break;
        case ('login'):
            login();
            break;
        case ('redirect'):
            redirect();
            break;
        case ('admin'):
            admin();
            break;
        case ('centre'):
            centre();
            break;
        case ('ajoutBoitier'):
            ajoutBoitier();
            break;
        case ('verifDelBoitier'):
            verifDelBoitier();
            break;
        case ('medSupp'):
            verifDelMedecin();
            break;
        case ('ajoutMedecin'):
            ajoutMedecin();
            break;
        case ('verifDelCentre'):
            verifDelCentre();
            break;
        case ('ajoutCentre'):
            ajoutCentre();
            break;
        case ('carte'):
            carte();
            break;
        case ('liste'):
            liste();
            break;
        case ('delCentre'):
            if (isset($_GET['id']) && centreExist($_GET['id'])) {
                delCentre($_GET["id"]);
            } else {
                main();
            }
            break;
        case ('removeBoitier'):
            removeBoitier();
            break;
        case ('removeMedecin'):
            removeMedecin();
            break;
        case ('medecin'):
            medecin();
            break;
        case ('profilPatient'):
            profilPatient();
            break;
        case ('test'):
            test();
            break;
        case ('newTest'):
            newTest();
            break;
        case ('ajoutPatient'):
            ajoutPatient();
            break;
        case ('testEnCours'):
            testEnCours();
            break;
        case ('patient'):
            patient();
            break;
        case ('accesTest'):
            accesTest();
            break;
        default:
            error();
            break;
    }
} else {
    main();
}
