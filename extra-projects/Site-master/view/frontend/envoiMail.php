<?php $title = 'envoi de Mail'; ?>
<?php ob_start(); ?>

<div id="titre">
    Contact par Mail
</div>
<hr class="trait2">
<br>
<br>
<form method="post">
    <div class="groupe_mail">
        <label>Prénom-Nom</label>
        <input type="text" name="nom" required>
    </div>
    <div class="groupe_mail">
        <label>Votre Email</label>
        <input type="email" name="email" required>
    </div>
    <div class="groupe_mail">
        <label>Objet du Mail</label>
        <input type="text" name="objet" required>
    </div>
    <div class="groupe_mail">
        <label>Message</label>
        <textarea name="message" required></textarea>
    </div>
    <div>
        <br>
        <button id="erreur_boutonv" type="submit" name="envoyerMail">Envoyer le mail</button>
    </div>
</form>
<br>
<br>
<?php
if (isset($_POST['message'])) {
    $message = '<h1>Message envoyé depuis la page contact de louisdelatullaye.fr/projets/app/</h1>
        <p><b>Nom : </b>' . $_POST['nom'] . '<br>
        <b>Email : </b>' . $_POST['email'] . '<br>
        <b>Objet : </b>' . $_POST['objet'] . '<br>
        <b>Message : </b>' . $_POST['message'] .' <br><br>
        <b> Ne pas répondre</b>' . '</p>';

    envoyerMail($_POST['objet'], $message, $_POST['email']);
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>