<?php $title = 'Professionnels'; ?>
<?php ob_start(); ?>


<div id="centre" style="background-color:#F5F5F5;">
  <div id="généralité">
    <div id="titre"> Le Capteurator </div>
    <div class="description_produit"> <br>
      <img src="public/images/capteur.jpeg" class="image_texte_capteur" alt="image_capteur" title="Capteurator">
      <dl class="texte_image" style="text-align: right;">
        <dd>
          <font size="+3"> Une&nbsp;carte&nbsp;mère <b>surpuissante</b>
            qui&nbsp;repousse&nbsp;les&nbsp;limites&nbsp;de&nbsp;la&nbsp;précision
            <br> <br>
            Un design qui <b>révolutionne</b> l'industrie médicale <br>
            <br>
            Les capacités du <b>Capteurator</b> sont telles qu'il est le
            premier à être validé par l'Ordre mondial des médecins et <b>Hippocrate</b>
            lui-même </font>
        </dd>
      </dl>
    </div>
    <br>
  </div>
  <div id="tonalité" style="background-color:#8FC5FF;">
    <div id="titre"><span style="color: #980000;animation: fadein 2s; -moz-animation: fadein 2s; -webkit-animation: fadein 2s; -o-animation: fadein 2s;"> Capteur de tonalité </span></div>
    <div class="description_produit"> <br>
      <p class="texte_image" style="color: white; text-align: left;">
        <font size="+3">
          <span style="color: #f3f3f3;"> Des années de recherches pour
            arriver à une précision extrême <br>
            <br>
            Doté d'un <b>capteur&nbsp;ultra&nbsp;performant</b>, les bandes
            sonores peuvent être analysées jusqu'au <b>millième</b> de
            Hertz </span></font>
      </p>
      <img src="public/images/tonalite.png" class="image_texte" alt="image_capteur" title="Capteurator">
    </div>
  </div>
  <div id="température">
    <div id="titre" style="animation: fadein 2s; -moz-animation: fadein 2s; -webkit-animation: fadein 2s; -o-animation: fadein 2s;"> Capteur de température </div>
    <div class="description_produit"> <br>
      <img src="public/images/temperature.png" class="image_texte" alt="image_capteur" title="Capteurator">
      <p class="texte_image" style="text-align: right;">
        <font size="+3">
          Petit et incassable <br>
          <br>
          Créé par les meilleurs scientifiques <br>
          le capteur peut ressentir la température du corps au <b>dixième&nbsp;de&nbsp;degré&nbsp;près</b><br>
        </font>
      </p>
    </div>
    <br>
    <br>
  </div>

  <div class="contactPro">
    <h1 id="titreProContact">Intéressé par nos solutions ?</h1>
    <h1 id="solutionProContact">Prenez contact avec nous :</h1>
    <a id="erreur_boutono" href="index.php?action=contactus">Contact</a>
  </div>
  <button id="gotop"><a href="#top">&#8743</a></button>

  <div id="cardiaque" style="background-color:#8FC5FF;">
    <div id="titre"><span style="color: #980000;animation: fadein 2s; -moz-animation: fadein 2s; -webkit-animation: fadein 2s; -o-animation: fadein 2s;">Mesure du rythme cardiaque<br>
      </span></div>
    <div class="description_produit"> <br>
      <p class="texte_image" style="color: white; text-align: left;">
        <font size="+3">
          <span style="color: #f3f3f3;"> Une façon <b>innovante</b> de
            mesurer son pouls<br>
            <br>
            La prise en main est des plus simple, <b>la&nbsp;création&nbsp;et&nbsp;la&nbsp;simplification</b>
            au service de tous.</span></font>
      </p>
      <img src="public/images/frequencecardiaque.png" class="image_texte" alt="image_capteur" title="Capteurator">
    </div>
  </div>
  <div id="reactivite">
    <div id="titre" style="animation: fadein 2s; -moz-animation: fadein 2s; -webkit-animation: fadein 2s; -o-animation: fadein 2s;"> Mesure de la réactivité </div>
    <div class="description_produit"> <br>
      <img src="public/images/reactivite.png" class="image_texte" alt="image_capteur" title="Capteurator">
      <p class="texte_image" style="text-align: right;">
        <font size="+3">
          Un afficheur, une DEL, un haut-parleur et 3 boutons pour des <b>milliers&nbsp;de&nbsp;combinaisons</b><br>
          <br>
          Il est possible d'évaluer l'ouïe, la vue ou encore le temps de
          réaction<br>
        </font>
      </p>
    </div>
    <br>
    <br>
  </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>