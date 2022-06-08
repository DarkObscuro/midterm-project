<?php $title = 'Nous contacter'; ?>
<?php ob_start(); ?>
<div id="NousContacter">
    <div id="titre">
        Nous Contacter
    </div>

    <div class="mail">
        <a href="index.php?action=envoiMail">
            <img src="public/images/mail.png" class="contacter_image" style="width: 140px; height: 100px;">
        </a>
        <p>
            <font size="+1">infinitemeasures.society@gmail.com</font>
        </p>
    </div>

    <div class="ReseauSociaux">
        <div id="contacter_block">
            <a href="https://www.instagram.com/infinite_measures_society/"> <img src="public/images/logoInsta.png" class="contacter_image"></a>
            <p>
                <font size="+1">Instagram</font>
            </p>
        </div>
        <div id="contacter_block">
            <a href="https://twitter.com/InfiniteMeasur2"><img src="public/images/logoTwitter.png" class="contacter_image"></a>
            <p>
                <font size="+1">Twitter</font>
            </p>
        </div>
        <div id="contacter_block">
            <a href="https://www.linkedin.com/in/infinite-measures-8454771a5/"><img src="public/images/logoLinked.png" class="contacter_image"></a>
            <p>
                <font size="+1">Linkedin</font>
            </p>
        </div>
        <div id="contacter_block">
            <a href="https://www.facebook.com/Infinite-Measures-107016680954018/"><img src="public/images/logoFacebook.png" class="contacter_image"></a>
            <p>
                <font size="+1">Facebook</font>
            </p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>