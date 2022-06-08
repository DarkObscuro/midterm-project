
<header>
	<a href="index.php?action=main"><img id="logo" class="erreur_image" src="public/images/im.gif"></a>
	<a class="header2" id="menuAccueil" href="index.php?action=main">Accueil</a>
	<a class="header2" id="menuPro" href="index.php?action=Professionnel">Professionnels</a>
	<a class="header2" id="menuContact" href="index.php?action=contactus">Nous contacter</a>
	<a class="header2" id="menuFAQ" href="index.php?action=faq">FAQ</a>

	<form methode="get" action="index.php?action=recherche" id="recherche">
		<p> <input type="search" id="texteRecherche" placeholder="Que recherchez-vous ?" /></p>
	</form>
	<button id="bouttonloupe" onclick="animationRecherche()">
		<img class="loupe" src="public/images/loupe4.png">
	</button>

	<a class="<?php echo $menu[2] ?>" href="index.php?action=login"><?php echo $menu[0]; ?></a>
	<a id="estConnecte" class="header2" href="index.php?action=logout"><?php echo $menu[1]; ?></a>
</header>


<script type="text/javascript" src="public/js/recherche.js"></script>


<button id="gotop"><a href="#top">&#8743</a></button>