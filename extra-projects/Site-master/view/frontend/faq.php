<?php $title = 'FAQ'; ?>
<?php ob_start(); ?>
<div style="background-color:#F5F5F5;">
  <div id="faq">
    <div id="titre">
      FAQ
    </div>
    <div id="question">
      A qui s'adresse ces boitiers ?
    </div>

    <div id="reponse">
      Le capteurator a pour but d'aider les personnes ayant
      subi un accident à retrouver leur mobilité et à les suivre dans leur
      parcours.
    </div>

    <div id="question">
      Est-il possible de passer chaque test séparement ?
    </div>

    <div id="reponse">
      Le médecin est libre de faire passer un ou plusieurs tests.
    </div>

    <div id="question">
      Qui a accès aux résultats des tests ?
    </div>

    <div id="reponse">
      Les données sont sécurisés et seul le médecin et son
      patient ont accès à leur propre tests.
    </div>

    <div id="question">
      Comment se procurer un boitier ?
    </div>

    <div id="reponse">
      Les boitiers appartiennent aux hopitaux et sont
      attribués à un unique médecin. Il n'est pas possible pour un
      particulier de posséder un boitier.
    </div>
  </div>
  <br>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>