<?php $title = 'Centre'; ?>
<?php ob_start(); ?>

<?php

$id = $centre->numero;
$nom = $centre->nom;
$adresse = $centre->adresse;
$region = $centre->region;
?>


<div id="conteneurMainAdmin">
    <div id="conteneur3Admin">
        <div id="conteneurCentreC">
            <div id="infoCentre">
                <h1>
                    <?php echo $nom ?>
                </h1>
                <p>
                    <?php echo $adresse ?>
                </p>
                <p>
                    <?php echo $region, "<br><br>" ?>
                </p>
            </div>
            <div id="SepConteneurCentre">
                <div id="infoCentreBoitier">
                    <p>Liste des boitiers utilisés : </p>

                    <hr class="trait5">
                    <br>
                    <br>

                    <?php foreach ($listeBoitiers as $boitier) { ?>
                        <a class="verifBoitier" href="index.php?action=verifDelBoitier&idB=<?php echo $boitier["idBoitier"]; ?>"><?php echo "Id boitier: #", $boitier["idBoitier"], "<br>", "<br>" ?></a>
                    <?php } ?>

                    <div id="boxCentre">
                        <p style="font-size:10px;">*Pour enlever un boitier de la liste, cliquez sur son ID</p>
                        <br>
                        <a href="index.php?action=ajoutBoitier&idC=<?php echo $_GET["id"] ?>" id="erreur_bouton">Ajouter un boitier</a>
                    </div>

                </div>
                <hr class="trait4">

                <div id="infoCentreMedecins">
                    <p>Liste des médecins : </p>

                    <hr class="trait5">
                    <br>
                    <br>
                    <?php foreach ($medecinList as $medecin) { ?>
                        <a class="verifBoitier" href="index.php?action=medSupp&idM=<?php echo $medecin["idUtilisateur"]; ?>"><?php echo "", $medecin["prenom"], " ", $medecin["nom"], ",  ", $medecin["mail"], "<br>", "<br>"; ?></a>
                    <?php } ?>
                    <div id="boxCentre">
                        <p style="font-size:10px;">*Pour enlever un médecin de la liste, cliquez sur son nom</p>
                        <br>
                        <a href="index.php?action=ajoutMedecin&idC=<?php echo $_GET["id"] ?>" id="erreur_bouton">Ajouter un médecin</a>
                    </div>
                </div>
            </div>

            <br><br>
            <div id="boxCentre2">
                <br>
                <a href="index.php?action=verifDelCentre&idC=<?php echo $_GET["id"] ?>" id="erreur_boutonr">Supprimer le centre</a>
            </div>
            <br>
            <br>
            <div id="boxCentre2">
                <a href="index.php?action=admin" id="erreur_boutong">Retour</a>
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