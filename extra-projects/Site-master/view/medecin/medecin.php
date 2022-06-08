<?php $title = 'Medecin'; ?>
<?php ob_start(); ?>




<div id="conteneurMainAdmin">
    <div id="conteneur1Admin">
        <div id="infoAdmin">
            <h1 id="pageadmin_titre1" style="padding-top: 2%">
                Mes informations :
            </h1>
            <br>
            <hr class="trait3">
            <br>
            <br>
            <p><b>
                    <font color="orange">Prénom :</font>
                </b> <?php echo $user->prenom; ?></p>
            <p><b>
                    <font color="orange">Nom :</font>
                </b><?php echo $user->nom; ?></p>
            <p><b>
                    <font color="orange">Adresse :</font>
                </b><?php echo $user->adresse; ?></p>
        </div>
        <div id="conteneurCentreAdmin">
            <div id="listeCentres">
                <h1 id="pageadmin_titre2">
                    Mes patients :
                </h1>
                <br>
                <hr class="trait2">
                <br>
                <br>
                <?php
                foreach ($listePatients as $patient) { ?>
                    <a class="listePatients" href="index.php?action=profilPatient&idP=<?php echo $patient["idPatient"]; ?>"><?php echo  "- ", $patient["prenom"], " ", $patient["nom"], " (numéro : ", $patient["numeroSS"], ")"; ?></a>
                    <br><br><?php } ?>
            </div>
            <div id="buttonAdminCentre">
                <br>
                <br>
                <a href="index.php?action=ajoutPatient" id="erreur_bouton">Ajouter ou retrouver un patient</a>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>