<?php 

require_once("../inc/init.inc.php");


// if (!userAdmin()) {
// 	header("location:profil.php");
// }

if ($_GET) { 

	if (isset($_GET["ajout"])) { // ajoutation de salle
		$resultat = $pdo -> prepare("INSERT INTO salle( titre, description, photo, capacite, categorie, pays, ville, adresse, cp) VALUES(:titre, :description, :photo, :capacite, :categorie, :pays, :ville, :adresse, :code_postal)");

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
			$msg .= "Ajout effectuee";

		}

		else {
			$msg .= "Erreur dans la requette ajout";
		}
	}
	if (isset($_GET["modif"])) { // modification de salle
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

		$resultat = $pdo -> prepare("REPLACE INTO salle(id_salle, titre, description, photo, capacite, categorie, pays, ville, adresse, cp) VALUES (:id_salle, :titre, :description, :photo, :capacite, :categorie, :pays, :ville, :adresse, :code_postal)");

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
			$msg .= "modification effectuee";

		}

		else {
			$msg .= "Erreur dans la requette modif";
		}
	}

} // fin if get

if($_POST) { //traitement supprimer

	$resultat = $pdo -> prepare("SELECT id_salle FROM salle WHERE id_salle = :id_salle");

	$resultat -> bindParam(":id_salle", $_POST["id_salle"], PDO::PARAM_INT);

	$resultat -> execute();

	if($resultat -> rowCount() > 0){
		$id_salle = $_POST["id_salle"];
		$resultat = $pdo -> exec("DELETE FROM salle WHERE id_salle = $id_salle");
		$msg .= "salle supprimée";
	}
	
}

echo $msg;
?>