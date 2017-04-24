<?php 

require_once("init.php");

if(userConnecte()){
	header("location:profil.php");
}

if($_POST){

	$verif_caracteres = preg_match("#^[a-zA-Z0-9._-]+$#", $_POST["pseudo"]);

	if(!empty($_POST["pseudo"])){

		if($verif_caracteres){
			if(strlen($_POST["pseudo"]) < 3 || strlen($_POST["pseudo"]) > 20){
				$msg .= "<div class='erreur'>Veuillez renseigner un pseudo compris entre 3 et 20 caractères.</div>";
			}
		}
		else{
			$msg .= "<div class='erreur'>Pseudo : Caracteres autorisés : A-Z, 0-9 et '-', '.' et '_'.</div>";
		}
	}

	else{
		$msg .= "<div class='erreur'>Veuillez renseigner un pseudo !</div>";
	}

	if(empty($msg)){

		$resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
		$resultat -> bindParam(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
		$resultat -> execute();

		if($resultat -> rowcount() > 0){
			$msg .= "<div class='erreur'>Ce pseudo <b>" . $_POST["pseudo"] . "<b/> n'est pas disponible. Veuillez choisir un autre pseudo.</div>";

		}

		else{ 

			$resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, statut) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, 0)");

			$resultat -> bindParam(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);

			$mdp = md5($_POST["mdp"]);
			$resultat -> bindParam(":mdp", $mdp, PDO::PARAM_STR);

			$resultat -> bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);

			$resultat -> bindParam(":prenom", $_POST["prenom"], PDO::PARAM_STR);

			$resultat -> bindParam(":email", $_POST["email"], PDO::PARAM_STR);
			$resultat -> bindParam(":civilite", $_POST["civilite"], PDO::PARAM_STR);

			if($resultat -> execute()){
				header("location:connexion.php");
			}
		} //fin du traitement ajout de membre

	} //fin empty msg

} //fin if post
?>