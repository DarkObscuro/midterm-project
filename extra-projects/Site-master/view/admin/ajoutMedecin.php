<?php $title = 'Ajouter medecin'; ?>
<?php ob_start(); ?>

<?php

$nom = "";
$prenom = "";
$adresse = "";
$numeroSS = "";
$email = "";
$password_1 = "";
$password_2 = "";
$errors = "";

?>

<body>
    <div id="conteneurAddMed">
        <div id="itemMed">
            <br>
            <h1 id="ajoutBoitier">Ajout d'un médecin : </h1>
            <br>
            <hr class="trait3">
            <br>
            <div id="itemMed4">
                <div id="itemMed2">
                    <h1 id="ajoutBoitier">
                        Nouveau médecin :
                    </h1>
                    <br>
                    <br>
                    <form method="post" action="index.php?action=ajoutMedecin&idC=<?php echo $_GET['idC']; ?>">
                        <div class="groupe_medecin">
                            <input type="text" name="prenom" required minlength="1" value="<?php echo $prenom; ?>">
                            <span data-placeholder="Prénom"></span>
                        </div>

                        <div class="groupe_medecin">
                            <input type="text" name="nom" required minlength="1" value="<?php echo $nom; ?>">
                            <span data-placeholder="Nom"></span>
                        </div>

                        <div class="groupe_medecin">
                            <input type="text" name="adresse" required minlength="1" value="<?php echo $adresse; ?>">
                            <span data-placeholder="Adresse"></span>
                        </div>

                        <div class="groupe_medecin">
                            <input type="number" name="numeroSS" required min="0" minlength="15" maxlength="15" value="<?php echo $numeroSS; ?>">
                            <span data-placeholder="Numéro de sécurité sociale"></span>
                        </div>

                        <div class="groupe_medecin">
                            <input type="email" required minlength="1" name="email" value="<?php echo $email; ?>">
                            <span data-placeholder="Email"></span>
                        </div>

                        <div class="groupe_medecin">
                            <input type="password" required minlength="1" name="password_1">
                            <span data-placeholder="Mot de passe"></span>
                        </div>

                        <div class="groupe_medecin">
                            <input type="password" required minlength="1" name="password_2">
                            <span data-placeholder="Confirmer mot de passe"></span>
                        </div>
                        <?php echo $errors; ?>
                        <br>
                        <br>
                        <div>
                            <center><button id="erreur_boutong" type="submit" class="btn" name="enregistrerMed">Enregistrer le Médecin</button></center>
                        </div>
                    </form>
                </div>
                <hr class="trait6">
                <div id="itemMed3">
                    <h1 id="ajoutBoitier">
                        Ajouter un médecin déjà inscrit :
                    </h1>
                    <br>
                    <br>

                    <?php
                    foreach ($listeMedecinsSansCentre as $medecin) {
                    ?>
                        <a href="index.php?action=ajoutMedecin&idC=<?php echo $idCentre; ?>&idU=<?php echo $medecin["idUtilisateur"]; ?>" class="ancienMedecin" name=<?php $medecin["idUtilisateur"]; ?>><?php echo "-Dr. ", $medecin["prenom"], " ", $medecin["nom"], " (", $medecin["adresse"], ")"; ?></a>
                        <br><br>
                    <?php } ?>


                </div>
            </div>
            <br>
            <br>
            <div id="boxCentre1">

                <br>
                <a href="index.php?action=centre&id=<?php echo $_GET["idC"]; ?>" id="erreur_boutonr">Retour</a>
                <br>
                <br>
                <br>

            </div>
            <br>
            <br>
        </div>
    </div>

    <script type="text/javascript" src="public/js/form.js"></script>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>