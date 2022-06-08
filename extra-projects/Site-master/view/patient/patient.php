<?php $title = 'patient'; ?>
<?php ob_start(); ?>

<?php
$nom = $prenom = $adresse = "OUI";
$nom = $user->nom;
$prenom = $user->prenom;
$adresse = $user->adresse;
$numeroSecu = $patient["numeroSS"];

?>

<div id="conteneurProfil">
    <div id="infoProfil">
        <h1 id="pageadmin_titre1">
            Mon profil:
        </h1>
        <hr class="trait3">
        <br>
        <br>
        <p><b>
                <font color="orange">Prénom :</font>
            </b><?php echo $prenom; ?></p>
        <p><b>
                <font color="orange">Nom :</font>
            </b><?php echo $nom; ?></p>
        <p><b>
                <font color="orange">Adresse :</font>
            </b><?php echo $adresse; ?></p>
        <p><b>
                <font color="orange">Numéro de Sécurité Sociale :</font>
            </b><?php echo $numeroSecu; ?></p>
    </div>
    <div id="listeTests">
        <h1 id="pageadmin_titre2">
            Mes tests :
        </h1>
        <hr class="trait2">
        <br>
        <br>
        <div class="listePreview">
            <?php
            foreach ($listeTests as $test) {
                $idTest = $test["idTest"];
            ?>
                <div class="previewTest">
                    <a style="color: #4488f3" href="index.php?action=accesTest&idTest=<?php echo $idTest; ?>"><?php echo $test["date"] ?></a>
                    <br>
                    <a href="index.php?action=accesTest&idTest=<?php echo $idTest; ?>"><img src="public/images/testIcon.png"></a>
                    <br>
                    <br>
                    <a style="color: #50b5a9" href="index.php?action=accesTest&idTest=<?php echo $idTest; ?>">Résultats obtenus : <font color="#a51a4f"><?php echo  $test["resultat"] ?></font></a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>