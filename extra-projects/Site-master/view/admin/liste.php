<?php $title = 'Admin'; ?>
<?php ob_start(); ?>


<?php
$lieux = $_GET['id'];
?>

<body>
    <div id="liste">
        <main class="carte-position">
            <?php

            $medecin = $bdd->query("SELECT * FROM centremedical WHERE region LIKE '" . $lieux . "'");
            if (($medecin->num_rows) < 1) {

                echo "</br></br></br></br></br>";
                echo "Il n'y a pas de centres médicaux enregistré dans cette région";
                echo "</br></br></br>";
            } else {
                if ($lieux == 'Provences-Alpes-Cotes-Dazur') {
                    echo "</br></br>";
                    echo "<p style='color:green'>Liste des centre médicaux de la région <br> Provences-Alpes-Cotes-D'Azur :";
                } else {
                    echo "</br></br>";
                    echo "<p style='color:green'> Liste des centre médicaux de la région </p>";

                    echo "<p style='color:green'>" . $lieux;
                    echo ':';
                }
                echo "</br>";
                while ($a = $medecin->fetch_array()) {
            ?>
                    </br>
                    <p><?= $a['nom'] ?>
                        <?= $a['adresse'] ?></p>
                    <br>
            <?php
                }
            }
            ?>
            </br>
            </br>
            </br>
            <a href="index.php?action=carte" id="erreur_bouton">Retour vers la carte</a>

    </div>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>