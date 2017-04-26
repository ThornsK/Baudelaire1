<?php

require('../inc/init.inc.php');

header("Access-Control-Allow-Origin: *");

$resultat = $pdo -> query("SELECT * FROM salle");



$retour = array("erreur" => true); // Initialisation de la variable de retour
			
	$salles = $resultat -> fetchAll(PDO::FETCH_ASSOC);

	$retour["informations"] = $salles;

echo json_encode($retour);
?>