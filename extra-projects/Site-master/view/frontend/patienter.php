<?php $title = 'SAV'; ?>
<?php ob_start(); ?>


<div class="mailEnvoye"> <br>
    <div id="mailPatiente">
        <img src="public/images/mailEnvoye.png" style="width: 400px; height: 200px;" class="patienter_image">
    </div>
    <br>
    <br>
    <div id="erreur"> Le Mail a été envoyé </div>

    <hr class="trait2">
    <br>
    <br>
    <p style="color: #a51a4f; font-size: large">Vous allez être redirigé dans <span id="compteur">5</span> <span id="secondes">secondes</span></p>
    <script type="text/javascript">
        function decompte() {
            var i = document.getElementById('compteur');
            let seconde = document.getElementById('secondes');
            if (parseInt(i.innerHTML) <= 0) {
                location.href = 'index.php';
                i.innerHTML = parseInt(i.innerHTML) + 1;
            }
            i.innerHTML = parseInt(i.innerHTML) - 1;
            if (parseInt(i.innerHTML) <= 1) {
                seconde.innerHTML = 'seconde';
            }
        }
        setInterval(function() {
            decompte();
        }, 1000);
    </script>
    <br>
    <div><a class="erreur_boutonv" id="erreur_boutonv" href="index.php"> <b>Revenir à l'Accueil</b></a></div>
    <br>
    <br>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>