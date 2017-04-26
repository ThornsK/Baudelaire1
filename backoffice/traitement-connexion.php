<?php 

require_once("../inc/init.inc.php");

if(isset($_GET["action"]) && $_GET["action"] == "deconnexion"){
	unset($_SESSION["membre"]);
	header("location:connexion.php");
}

if ($_POST) {

$resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");

$resultat -> bindParam(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);

$resultat -> execute();

	if($resultat -> rowCount() != 0){

		// $mdp = md5($_POST["mdp"]);

		$mdp = $_POST["mdp"];

		$membre = $resultat -> fetch(PDO::FETCH_ASSOC);

		if($membre["mdp"] == $mdp){
			foreach ($membre as $key => $value) {
				$_SESSION["membre"][$key] = $value;
			}
			$msg .= "ça marche";
		} // fin if $membre["mdp"] -> si mdp est bon

		else{
			$msg .= "<div class='erreur'>Erreur de mot de passe !</div>";
		}
	} //fin if resulta rowcount -> si pseudo existe

	else{
		$msg .= "<div class='erreur'>Erreur de pseudo !</div>";
	}


} //fin if post

echo $msg;
?>