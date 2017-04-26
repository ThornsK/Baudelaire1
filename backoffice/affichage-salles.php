<?php

require('../inc/init.inc.php');

header("Access-Control-Allow-Origin: *");

$id_salle = $_GET["id_salle"];

$resultat = $pdo -> query("SELECT * FROM salle WHERE id_salle = $id_salle");



$retour = array("erreur" => true); // Initialisation de la variable de retour
			
	$salles = $resultat -> fetchAll(PDO::FETCH_ASSOC);

	// $retour["informations"] = $salles;

echo json_encode($salles);
?>