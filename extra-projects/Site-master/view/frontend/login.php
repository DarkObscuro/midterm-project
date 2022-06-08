<?php $title = 'Se connecter'; ?>
<?php ob_start(); ?>



<form method="post" action="index.php?action=login">

  <br><br>

  <div class="form_wrapper">

    <div id="titre"> Connexion </div>

    <label for="mail"></label>
    <div class="input_container">
      <i class="fas fa-envelope"></i>
      <input type="mail" name="email">
      <span data-placeholder="Email"></span>
    </div>

    <label for="mdp"></label>
    <div class="input_container">
      <i class="fas fa-lock"></i>
      <input type="password" name="motdepasse">
      <span data-placeholder="Mot de passe"></span>
    </div>
    <br>
    <label for="sign"></label>
    <span class="result"><?php echo $resultat ?></span>
    <input type="submit" value="Se connecter" class='logbtn'>

    <br><br>
    <span><a href="#">
        <font color="orange"> Mot de passe </font>
      </a> oublié ?</span>

  </div>
</form>

<script type="text/javascript" src="public/js/login.js"></script>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>