<?php $title = 'CGU'; ?>
<?php ob_start(); ?>
<div id="contenuCGU">
	<div id="titre">
		Conditions Générales d'utilisation
	</div>
	<p>
		<div id="CGU">
			Les sociétés Infinite Mesures et IotNov déclinent toutes responsabilités en cas de blessures lors de l'utilisation des capteurs fournis dans le cadre des tests. Les valeurs des tests doivent être interprétées par des médecins et des spécialistes, et sont indicatives.
			<br>
			Restez chez vous jusqu'à la fin du confinement s'il vous plaît.
			<br>
			Les capteurs ne peuvent pas être utilisés en dehors de centre agréées dont la liste est disponible sur le site internet.
			<br>
			Les techniques et prises de mesures sont réalisées par des professionnels surentrainés. En conséquence, il ne faut pas tenter de reproduire ou d'imiter le contenu de ce projet. Ne faites pas ça chez vous.
			<br>
			Le capteurator mais les résultats sont bons.
		</div>
	</p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>