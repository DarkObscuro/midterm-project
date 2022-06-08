<?php $title = 'erreur'; ?>

<?php ob_start(); ?>




<div id="erreur" class="erreur">

  <br>

  <div id="erreur">
    <img src="public/images/im.gif" class="erreur_image" style="width: 185px; height: 170px;">
  </div>

  <div id="erreur">

    <font size="+4"> <b>ERREUR</b> </font>
  </div>

  <br>

  <div id="erreur">
    La page que vous demandez est introuvable.
  </div>
  <div>
    <br>

    <a id="erreur_bouton" href="index.php?action=main"> <b>Revenir à l'Accueil</b></a>
  </div>

  <br>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>