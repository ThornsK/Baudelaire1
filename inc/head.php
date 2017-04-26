<?php 



if(userConnecte()){
	$state = "déconnexion";
}

elseif(isset($_SESSION["membre"])){
	$state = "connexion";
}
else{
	$state = "connexion";
}



?>

<!DOCTYPE html>
<html lang="fr">
	<head>
	<!-- stylesheets -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="contact.css">
		<link rel="stylesheet" type="text/css" href="profil.css">
		<link rel="stylesheet" type="text/css" href="tableau.css">

		<!-- scripts -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script type="text/javascript" src="menu.js"></script>

		<meta charset="utf-8">
		<title>Salle A</title>
	</head>
	<body>

		<header>
			<i class="fa fa-bars toggle_menu"></i>

			<!-- div de maintien du respect, elle permet le bon fonctionnenment du flex -->
			<div></div>

			

			<div class="logo" alt="logo Salle A">
			</div>


			<div class="user_content">
				
				<i class="fa fa-user-circle" aria-hidden="true"></i>
				<button class="bouton_header" id="state"><?= $state; ?></button>

			</div>
			
		</header>

		<div id="connexion-popup"></div>

		<div class="sidebar_menu hide_menu">
				<i class="fa fa-times"></i>
				<center>
					<a href="#"><h1 class="boxed_item">SALLE A</h1 ></a>
					<h2 class="logo_title">Location incroyables !</h2>
				</center>

				<ul class="navigation_selection">
					<!-- pages utilisateurs -->
					<li class="navigation_item"><a href="#">A Propos</a></li>
					<li class="navigation_item"><a href="#">Catalogue</a></li>
					<li class="navigation_item"><a href="#">Nous Contacter</a></li>
					<li class="navigation_item"><a href="profil.php">Profil</a></li>

					<!--  pages admins -->

					<li class="navigation_item"><a href="formulaire-membre.php">Membres</a></li>
					<li class="navigation_item"><a href="formulaire-produit.php">Produits</a></li>
					<li class="navigation_item"><a href="formulaire-salle.php">Salles</a></li>
					<li class="navigation_item"><a href="gestion-commandes.php">Commandes</a></li>
					<li class="navigation_item"><a href="gestion-avis.php">Avis</a></li>
					
				</ul>

			</div> <!-- fin de la side bar -->
      
      <div class="page_content">	

	<script>
	$(function(){

		if($( "#state" ).text() == "déconnexion"){
			$("#state").click(function(e) {
				var request = $.ajax({ 	
					url: "backoffice/traitement-connexion.php",
					method: "GET",
					data : {deconnexion : "deconnexion"}
				});	

				request.done(function( msg ) {
					window.location.href = "home.php";
				});
			 
				request.fail(function( jqXHR, textStatus ) {
				  alert( "Request failed: " + textStatus );
				});				
			});
		}
		else if($( "#state" ).text() == "connexion"){
			$("#state").click(function(e) {
				$("#connexion-popup").css('display','none');
				$("#connexion-popup").load("connexion.php");
			});
		}
		else{
			console.log("fuck");
		}
	});
	</script>