<?php 

require_once("inc/init.inc.php");

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<header>
		</header>

		<main>
			<div class="container">
				<h1>S'inscrire'</h1>

				<form action="" method="post">

					<label>Pseudo</label>
					<input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"/><br/><br/>

					<label>Mot de passe</label>
					<input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"/><br/><br/>

					<label>Nom</label>
					<input type="text" name="nom" id="nom" placeholder="Votre nom"/><br/><br/>

					<label>Prénom</label>
					<input type="text" name="prenom" id="prenom" placeholder="Votre prenom"/><br/><br/>

					<input type="submit" value="Connexion"/>

				</form>
			</div>
		</main>

		<footer>
		</footer>
	</body>
</html>