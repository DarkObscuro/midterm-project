<?php $title = 'Ajout Centre'; ?>
<?php ob_start(); ?>




<div id="conteneurMainAdmin">
    <div id="conteneur1Admin">
        <div id="conteneurCentreAdmin">
            <p style="width:70%;margin:auto;margin-top:2%;margin-bottom:2%;color:white">Êtes-vous sur de vouloir enlever le boitier #<?php echo $boitier["idBoitier"] ?> du centre <?php echo $centre['nom'] ?> ?</p>


            <a id="erreur_bouton" style="width:30%;margin:auto;" href="index.php?action=removeBoitier&idB=<?php echo $boitier["idBoitier"]; ?>">Oui</a>
            <br>
            <br>
            <br>
            <a id="erreur_boutonr" style="width:30%;margin:auto;" href="index.php?action=centre&id=<?php echo $boitier["idCentre"]; ?>">Annuler</a>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>