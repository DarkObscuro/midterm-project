<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<div id="conteneurAddMed">
    <div id="formBox">
        <div id="itemMed2">
            <h1 id="ajoutBoitier">
                Formulaire d'ajout d'un nouveau boitier :
            </h1>
            <br>
            <hr class="trait3">
            <br>
            <form method="post" action="index.php?action=ajoutBoitier&idC=<?php echo $_GET['idC'] ?>">
            <br>
                <div class="groupe_medecin">
                    <input type="number" name="numeroBoitier" required minlength="1" value="" min="0">
                    <span data-placeholder="Numéro du boitier"></span>
                </div>
                <?php echo $errors; ?>
                <div class="input-group">

                    <br>
                    <button id="erreur_boutong" type="submit" class="btn" name="enregistrerMed">Ajouter le boitier</button>
                </div>
            </form>

            <br>
            <div id="boxCentre1">
                <a href="index.php?action=centre&id=<?php echo $_GET["idC"] ?>" id="erreur_boutonr">Retour</a>
            </div>
            <br>
        </div>
    </div>
</div>

<script type="text/javascript" src="public/js/form.js"></script>
<script>
    document.querySelector(".groupe_medecin").style.width="90%";
    document.querySelector("#formBox").style.width = "25%"; 
</script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>