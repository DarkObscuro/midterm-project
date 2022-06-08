<?php $title = 'newTest'; ?>
<?php ob_start(); ?>

<?php

$username = $email = "";
$adresse = "";
$nom = "";
$numBoitier = "";

?>

<div id="conteneurAddMed">
    <div id="itemMed">
        <div id="itemMed2" style="text-align:center;">
            <h1>
                Nouveau test :
            </h1>
            <br>
            <hr class="trait3">
            <br>
            <br>

            <form method="post" action="index.php?action=newTest&idP=<?php echo $_GET["idP"] ?>">
                <div class="input-group">
                    <label>Merci de selectionner le boitier à utiliser :</label>
                    <select name="idBoitier">
                        <?php foreach ($listeBoitier as $boitier) { ?>
                            <option value="<?= $boitier; ?>"> <?= $boitier ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <br>
                    <button id="erreur_boutonv" type="submit" class="btn" name="enregistrerMed">Lancer le test</button>
                </div>
                <?php echo $message ?>
            </form>

            <div id="boxCentre1" style="padding-top: 2%">
                <a href="index.php?action=medecin" id="erreur_boutonr">Retour</a>
            </div>

        </div>
    </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>