<?php $title = 'Medecin'; ?>
<?php ob_start(); ?>


<?php
/*  ajustement des données pour l'affichage */

$mesures = $resultTest[0];
$test = $resultTest[1];
$dataPoints = array(
    array("y" => $mesures["fq"], "label" => "Fréquence Cardiaque"),
    array("y" => $mesures["temp"], "label" => "Température"),
    array("y" => $mesures["audio"], "label" => "Cohérence audio"),
    array("y" => $mesures["reactivite"], "label" => "Réactivité")

);

$dataPoints2 = array(
    array("y" => 50, "label" => "Moyenne fréquence Cardiaque"),
    array("y" => 40, "label" => "Température"),
    array("y" => 65, "label" => "Cohérence audio"),
    array("y" => 70, "label" => "Réactivité")
);

$nom = $prenom = $adresse = $numeroSecu = "OUI";

?>

<div id="conteneurMainAdmin">
    <div id="conteneur3Admin">
        <div id="conteneurCentreC">
            <br>
            <div id="chartContainer" style="height: 370px; width: 70%;margin:auto;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <br>
            <br>
            <div id="boxCentre1">
                <a href="index.php?action=redirect" id="erreur_boutong">Retour</a>
            </div>
        </div>
    </div>
</div>


<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "dark2",
            title: {
                text: "Test du <?php echo   $test["date"] ?>"
            },
            axisY: {
                title: " Réussite (%)"
            },
            data: [
                {
                    type: "column",
                    color: "#6495ED",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                },
	            {
                    type: "splineArea",
                    fillOpacity: .3, 
                    color: "orange",
		            name: "Moyenne",
		            showInLegend: true,
		            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
        });
    
        chart.render();
    }


</script>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>