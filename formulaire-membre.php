<?php 

require_once("inc/init.inc.php");

require_once("inc/head.php");
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
				<div id="membres">
					<table>
						<tr>
							<th></th>
						</tr>

						<tr>
							<td>
							</td>
						</tr>
					</table>
				</div>

				<div>
					<form action="" method="post">
						<div>
							<label>Pseudo</label><br/>
							<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"/><br/><br/>

							<label>Mot de passe</label><br/>
							<input type="password" name="mdp" id="mdp" placeholder="Mot de passe"/><br/><br/>

							<label>Nom</label><br/>
							<input type="text" name="nom" id="nom" placeholder="Votre nom"/><br/><br/>

							<label>Prénom</label><br/>
							<input type="text" name="prenom" id="prenom" placeholder="Votre prénom"/>
						</div>

						<div>
							<label>Email</label><br/>
							<input type="text" name="email" id="email" placeholder="Votre email"/><br/><br/>

							<label>Civilité</label><br/>
							<select name="civilite"" id="civilite">
								<option value=""></option>
							</select><br/><br/>

							<label>Statut</label><br/>
							<select name="statut" id="statut">
								<option value=""></option>
							</select><br/><br/>


							<input type="submit" value="Enregistrer"/>
						</div>
					</form>
				</div>
			</div>
		</main>

		<footer>
		</footer>
	</body>
</html>