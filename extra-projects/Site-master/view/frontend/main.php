<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<div class="opening">
	<div class="texteMain">
		<h4>
			Un condensé de design et de technologie
		</h4>
		<p> <b>Infinite Measures</b> présente un tout nouveau type d'appareil de mesures. Ergonomique, design, léger, abordable, laissez-vous tenter par notre boitier de mesures psychotechniques : <b>Le capteurator !</b> Rejoignez dès maintenant plus de <b>10 000 médecins</b> en France !</p>
		<br>
		<br>
		<a id="decouvrir" href="index.php?action=Professionnel">Découvrir</a>
	</div>
	<div class="productImage">
		<a><img src="public/images/product.png"></a>
	</div>
</div>

<div class="capteuratorMain">
	<h1>
		Le capteurator
	</h1>
	<p>
		Appareil connecté de mesures psychotechniques
	</p>
	<a href="index.php?action=faq"><img src="public/images/capteur.jpeg"></a>
</div>

<div class="blueBox">
	<br>
	<p>La <b>santé</b> à portée de main</p>
	<form action="index.php?action=profil" class="santeBox">
		<button class="btn">Accéder à mes résultats</button>
	</form>
	<br>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>