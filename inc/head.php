<!DOCTYPE html>
<html lang="fr">
	<head>
	<!-- stylesheets -->
		<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<!-- scripts -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../menu.js"></script>

		<meta charset="utf-8">
		<title>Header projet Baudelaire</title>
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
				<button class="bouton_header">INSCRIPTION</button>

			</div>
			
		</header>

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
					<li class="navigation_item"><a href="#">Connexion</a></li>
					<li class="navigation_item"><a href="#">Inscription</a></li>
					<li class="navigation_item"><a href="#">Profil</a></li>
					<!--  pages admins -->
					<li class="navigation_item"><a href="#">Membres</a></li>
					<li class="navigation_item"><a href="#">Produits</a></li>
					<li class="navigation_item"><a href="#">Salles</a></li>
					<li class="navigation_item"><a href="#">Commandes</a></li>
					<li class="navigation_item"><a href="#">Avis</a></li>
					
				</ul>

			</div>
	</body>
</html>