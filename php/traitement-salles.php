<?php 

require_once("init.php");

if (!userAdmin()) {
	header("location:profil.php");
}

if ($_GET) { // modification de salle

	$id_salle = $_GET["id_salle"];
	$titre = $_GET["titre"];
	$description = $_GET["description"];
	$photo = $_GET["photo"];
	$capacite = $_GET["capacite"];
	$categorie = $_GET["categorie"];
	$pays = $_GET["pays"];
	$ville = $_GET["ville"];
	$adresse = $_GET["adresse"];
	$code_postal = $_GET["code_postal"];

	$resultat = $pdo -> prepare("REPLACE INTO salle(id_salle, titre, description, photo, capacite, categorie, pays, ville, adresse, code_postal) VALUES (:id_salle, :titre, :description, :photo, :capacite, :categorie, :pays, :ville, :adresse, :code_postal)");

	$resultat -> bindParam(":id_salle", $_GET["id_salle"], PDO::PARAM_INT);
	$resultat -> bindParam(":titre", $_GET["titre"], PDO::PARAM_STR);
	$resultat -> bindParam(":description", $_GET["description"], PDO::PARAM_STR);
	$resultat -> bindParam(":photo", $_GET["photo"], PDO::PARAM_STR);
	$resultat -> bindParam(":capacite", $_GET["capacite"], PDO::PARAM_INT);
	$resultat -> bindParam(":categorie", $_GET["categorie"], PDO::PARAM_STR);
	$resultat -> bindParam(":pays", $_GET["pays"], PDO::PARAM_STR);
	$resultat -> bindParam(":ville", $_GET["ville"], PDO::PARAM_STR);
	$resultat -> bindParam(":adresse", $_GET["adresse"], PDO::PARAM_STR);
	$resultat -> bindParam(":code_postal", $_GET["code_postal"], PDO::PARAM_INT);

	if($resultat -> execute()){
		header("location:gestion_membre.php");

	}

	else {
		$msg .= "<div class='erreur'>Erreur dans la requette</div>";
	}
} // fin if get
?>