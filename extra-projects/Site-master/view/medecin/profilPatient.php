<?php $title = 'Medecin'; ?>
<?php ob_start(); ?>

<?php

$nom = $patient["nom"];
$prenom = $patient["prenom"];
$adresse = $patient["adresse"];
$mail = $patient["mail"];
$idPatient = $_GET["idP"];

?>


<div id="conteneurMainAdmin">
    <div id="conteneur3Admin">
        <div id="conteneurCentreC">
            <div id="infoCentre" style="padding-top: 1%">
                <h1>
                    <?php echo " ", $prenom, " ", $nom ?>
                </h1>
            </div>
            <div style="color: white; font-weight: bold; padding-top:2%;">
                <?php echo $adresse ?>
                |
                <?php echo $mail ?>
            </div>
            <br>
            <div id="ConteneurPatient">
                Liste tests
                <hr class="trait2">
                <div class="listePreview">
                    <?php
                    foreach ($listeTests as $test) {
                        $idTest = $test["idTest"];
                    ?>
                        <div class="previewTest">
                            <a style="color: #4488f3" href="test.php?idTest=<?php echo $idTest; ?>"><?php echo $test["date"] ?></a>
                            <br>
                            <a href="index.php?action=test&idTest=<?php echo $idTest; ?>"><img src="public/images/testIcon.png"></a>
                            <br>
                            <br>
                            <a style="color: #50b5a9" href="test.php?idTest=<?php echo $idTest; ?>">Résultats obtenus : <font color="#a51a4f"><?php echo  $test["resultat"] ?></font></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <br>
                <div id="boxCentre1">
                    <p style="font-size:10px;color:green">*Pour accèder à un test, cliquez dessus</p>
                    <a style="font-size:x-large" href=" index.php?action=newTest&idP=<?php echo $_GET["idP"] ?>" id="erreur_boutonv">Nouveau Test</a>
                </div>
            </div>
            <br><br>
            <div id="boxCentre1">
                <a href="index.php?action=medecin" id="erreur_boutong">Retour</a>
            </div>
            <br>
        </div>
        <div id="boitierInfo">
            <br>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>