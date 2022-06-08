<?php $title = 'test en cours'; ?>
<?php ob_start(); ?>

<div id="conteneurTest2">
  <div id="conteneurTest">
    <div id="chargement">
      Récupération des données
    </div>

    <div style="margin-left: 20%;margin-right: 20%;padding-bottom: 4%;">
      <br>
      <div class="bordure">
        <div id="myBar" class="completion">0%</div>
      </div>
      <div id="correct">
        <img src="public/images/correct.png" id="correct">
        <br>
        Les données ont été sauvegardées
      </div>

    </div>

    <div id="recommencer_test">
      <a onclick="location.reload()">
        <img src="public/images/restart_button.png">
      </a>
      <br>
      Recommencer
    </div>

    <div id="retour" style="padding-top: 4%;">
      <a style="font-size:large" href="index.php?action=profilPatient&idP=<?php echo $_GET['idP'] ?>" id="erreur_boutonr">Retour</a>

    </div>
  </div>
</div>

<script type="text/javascript" src="public/js/pourcent.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>