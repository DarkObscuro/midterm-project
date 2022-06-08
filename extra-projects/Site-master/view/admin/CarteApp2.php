<?php $title = 'Admin'; ?>
<?php ob_start(); ?>


<img src="public/images/France.jpg" width="500" height="500" alt="Carte" border="0" usemap="#carte" />
<map name="carte">
	<area shape="rect" coords="30,110,105,170" href="index.php?action=liste&id=Bretagne" style Alt="Sud Ouest"/>
	<area shape="rect" coords="110,70,210,120" href="index.php?action=liste&id=Normandie" Alt="Sud Ouest"/>
	<area shape="rect" coords="218,10,282,100" href="index.php?action=liste&id=Hauts-de-France" Alt="Sud Ouest"/>
	<area shape="rect" coords="220,110,270,140" href="index.php?action=liste&id=Ile-de-France" Alt="Sud Ouest"/>
	<area shape="rect" coords="300,75,400,160" href="index.php?action=liste&id=Grand-Est" Alt="Sud Ouest"/>
	<area shape="rect" coords="265,170,390,230" href="index.php?action=liste&id=Bourgogne-Franche-Comté" Alt="Sud Ouest"/>
	<area shape="poly" coords="250,240,390,300,300,330" href="index.php?action=liste&id=Auvergne-Rhones-Alpes" Alt="Sud Ouest"/>
	<area shape="rect" coords="450,400,500,500" href="index.php?action=liste&id=Corse" Alt="Sud Ouest"/>
	<area shape="rect" coords="190,160,255,225" href="index.php?action=liste&id=Centre-Val-De-Loire" Alt="Sud Ouest"/>
	<area shape="poly" coords="142,136,184,150,115,250,100,200" href="index.php?action=liste&id=Pays-de-la-Loire" Alt="Sud Ouest"/>
	<area shape="poly" coords="156,210,216,270,120,400" href="index.php?action=liste&id=Nouvelle-Aquitaine" Alt="Sud Ouest"/>
	<area shape="poly" coords="218,330,300,370,250,430,150,430" href="index.php?action=liste&id=Occitanie" Alt="Sud Ouest"/>
	<area shape="poly" coords="330,380,368,312,400,370,380,400" href="index.php?action=liste&id=Provences-Alpes-Cotes-Dazur" Alt="Sud Ouest"/>	
</map>
</body>
</html>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
