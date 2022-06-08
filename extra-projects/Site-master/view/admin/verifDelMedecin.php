<?php $title = 'Supprimer un centre'; ?>
<?php ob_start(); ?>

<div id="conteneurMainAdmin">
    <div id="conteneur1Admin">
        <div id="conteneurCentreAdmin">
            <p style="width:70%;margin:auto;margin-top:2%;margin-bottom:2%;color:white">Êtes-vous sur de vouloir enlever <?php echo $user["prenom"], " ", $user["nom"] ?> de la liste des medecin ?</p>
            <a id="erreur_bouton" style="width:30%;margin:auto;" href="index.php?action=removeMedecin&id=<?php echo $user["idUtilisateur"]; ?>">Oui</a>
            <br>
            <br>
            <br>
            <a id="erreur_boutonr" style="width:30%;margin:auto;" href="index.php?action=centre&id=<?php echo $idCentre ?>">Annuler</a>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>