var connexion = document.getElementById("estConnecte")
	window.onload = function() {
		if (connexion.innerHTML === "") {
			connexion.style.display = 'none';
		}

	}

function cacher(objet) {
	objet.style.display = "none";
}


function montrer(objet) {
	objet.style.display = "block";
}

function test() {
	alert("test");
}

function animationRecherche() {
	var boutton=document.getElementById("bouttonloupe");
	var recherche=document.getElementById("recherche");
	var texteRecherche=document.getElementById("texteRecherche");
	
	var accueil=document.getElementById("menuAccueil");
	var professionels=document.getElementById("menuPro");
	var contact=document.getElementById("menuContact");
	var faq=document.getElementById("menuFAQ");


	if(recherche.style.display=="block"){
		cacher(recherche);
		montrer(accueil);
		montrer(professionels);
		montrer(contact);
		montrer(faq);
	} else {
		montrer(recherche);
		texteRecherche.focus();
		cacher(accueil);
		cacher(professionels);
		cacher(contact);
		cacher(faq);
	}
}