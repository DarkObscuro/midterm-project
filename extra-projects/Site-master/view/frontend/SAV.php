<?php $title = 'SAV'; ?>
<?php ob_start(); ?>

<div id="contenuSAV">
    <button id="gotop"><a href="#top">&#8743</a></button>
    <div id="titre">
        Service&nbsp;Après-Vente
    </div>
    <div class="camion_SAV">
        <img src="public/images/camionSAV.png">
        <div class="texte_SAV">
            <p>
                <b>
                    <FONT color="orange">LE SERVICE APRÈS-VENTE INFINITE&nbsp;MEASURES&nbsp;:
                        <br>
                        DES TECHNICIENS À VOTRE SERVICE</FONT>
                </b>
                <hr class="new1">
                Vous rencontrez des problèmes avec votre appareil ? Qu'il soit sous garantie ou non, nos techniciens SAV sont à votre écoute pour vous aider à trouver une solution.
            </p>
        </div>
    </div>
    <div class="paragraphe_SAV">
        <div class="titre_SAV">
            LA RÉPARATION&nbsp;: UNE MAÎTRISE EXEMPLAIRE
        </div>
        <hr class="new1">
        <p class="texte_paragraphe_SAV">
            La complexité de création du Capteurator implique une manœuvre de réparation des plus difficiles.
            C'est pourquoi, <b>INFINITE MEASURES</b> forme des techniciens ultras-performants connaissant le moindre ressort de la machine.
            Une seconde vie sera alors donnée à votre appareil, un geste important pour notre planète.
        </p>
    </div>
    <div class="paragraphe_SAV">
        <div class="titre_SAV">
            CONTACTEZ-NOUS
        </div>
        <hr class="new1">
        <p class="texte_paragraphe_SAV">
            En cas de problèmes, notre Service Après-Ventes est ouvert <b>7j/7</b> et <b>24h/24</b>.
            Contactez nous au <b> 01&nbsp;44&nbsp;75&nbsp;47&nbsp;00&nbsp;(prix d'un appel local)</b> ou par mail à <b>infinitemeasures.society@gmail.com</b>.
        </p>
    </div>
    <div class="paragraphe_SAV">
        <div class="titre_SAV">
            LA GARANTIE INFINITE&nbsp;MEASURES
        </div>
        <hr class="new1">
        <div class="paragraphe_block">
            <p>
                Si une panne survient, vous pouvez beneficer de votre service <b>SAV&nbsp;INFINITE&nbsp;MEASURES</b> valable jusqu'à <b>10 ans</b> après votre achat.
                <br>
                Ce service comprend&nbsp;:
                <ul>
                    <li>
                        Des conseillés téléphonique <b>7j/7</b> et <b>24h/24</b>
                    </li>
                    <li>
                        Des techniciens de maintenance disponibles <b>7j/7</b> de <b>5h à 23h</b>
                    </li>
                    <li>
                        L'envoi et le prêt de materiels de remplacement en cas de panne.
                    </li>
                    <li>
                        Échange du produit, <b>sans surcoût</b> s'il est défectueux dans les 15 jours suivant l'achat.
                    </li>
                </ul>
            </p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>