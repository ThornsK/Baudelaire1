<?php 

require_once("php/init.php");

// if (!userAdmin()) {
// 	header("location:profil.php");
// }

if ($_GET) { // modification de produit

	$id_produit = $_GET["id_produit"];
	$date_arrivee = $_GET["date_arrivee"];
	$date_depart = $_GET["date_depart"];
	$prix = $_GET["prix"];

	$resultat = $pdo -> prepare("REPLACE INTO produit(id_produit, date_arrivee, date_depart, prix) VALUES (:id_produit, :date_arrivee, :date_depart, :prix)");

	$resultat -> bindParam(":id_produit", $_GET["id_produit"], PDO::PARAM_INT);
	$resultat -> bindParam(":date_arrivee", $_GET["date_arrivee"], PDO::PARAM_STR);
	$resultat -> bindParam(":date_depart", $_GET["date_depart"], PDO::PARAM_STR);
	$resultat -> bindParam(":prix", $_GET["prix"], PDO::PARAM_STR);

	if($resultat -> execute()){
		header("location:../gestion-produit.php");

	}

	else {
		$msg .= "<div class='erreur'>Erreur dans la requette</div>";
	}
} // fin if get

if($_POST) { //traitement suppression

	$resultat = $pdo -> prepare("SELECT id_produit FROM produit WHERE id_produit = :id_produit");

	$resultat -> bindParam(":id_produit", $_POST["id_produit"], PDO::PARAM_INT);

	$resultat -> execute();

	if($resultat -> rowCount() > 0){
		$id_produit = $_POST["id_produit"];
		$resultat = $pdo -> exec("DELETE FROM produit WHERE id_produit = $id_produit");
		$msg .= "produit supprimée"
	}

}
?>