<?php 

require_once("php/init.php");

// if (!userAdmin()) {
// 	header("location:profil.php");
// }

if ($_GET) { // modification de membre

	$id_membre = $_GET["id_membre"];
	$pseudo = $_GET["pseudo"];
	$date_depart = $_GET["date_depart"];
	$prix = $_GET["prix"];

	$resultat = $pdo -> prepare("REPLACE INTO membre(id_membre, pseudo, date_depart, prix) VALUES (:id_membre, :pseudo, :date_depart, :prix)");

	$resultat -> bindParam(":id_membre", $_GET["id_membre"], PDO::PARAM_INT);
	$resultat -> bindParam(":pseudo", $_GET["pseudo"], PDO::PARAM_STR);
	$resultat -> bindParam(":date_depart", $_GET["date_depart"], PDO::PARAM_STR);
	$resultat -> bindParam(":prix", $_GET["prix"], PDO::PARAM_STR);

	if($resultat -> execute()){
		header("location:../gestion-membre.php");

	}

	else {
		$msg .= "<div class='erreur'>Erreur dans la requette</div>";
	}
} // fin if get

if($_POST) { //traitement suppression

	$resultat = $pdo -> prepare("SELECT id_membre FROM membre WHERE id_membre = :id_membre");

	$resultat -> bindParam(":id_membre", $_POST["id_membre"], PDO::PARAM_INT);

	$resultat -> execute();

	if($resultat -> rowCount() > 0){
		$id_membre = $_POST["id_membre"];
		$resultat = $pdo -> exec("DELETE FROM membre WHERE id_membre = $id_membre");
		$msg .= "membre supprimée"
	}

}
?>