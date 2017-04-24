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
			<div id="container">
				<div id="salles">
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
					<form action="" method="post" enctype="multipart/form-data">
					<!-- Attribut enctype -> obligatoire si élément input "file" dans le formulaire -->
						<div>
							<label>Titre</label><br/>
							<input type="text" name="titre" id="titre" placeholder="Titre de la salle"/><br/><br/>

							<label>Description</label><br/>
							<textarea rows=5 cols=60 name="description" id="description" placeholder="Description de la salle"></textarea><br/><br/>

							<label>Photo</label><br/>
							<input type="file" name="photo" id="photo"/><br/><br/>

							<label>Capacité</label><br/>
							<select name="capacite" id="capacite">
								<option value=""></option>
							</select><br/><br/>

							<label>Catégorie</label><br/>
							<select name="categorie" id="categorie">
								<option value=""></option>
							</select><br/><br/>
						</div>

						<div>
							<label>Pays</label><br/>
							<select name="pays" id="pays">
								<option value=""></option>
							</select><br/><br/>

							<label>Ville</label><br/>
							<select name="ville" id="ville">
								<option value=""></option>
							</select><br/><br/>

							<label>Adresse</label><br/>
							<textarea rows=5 cols=60 name="adresse" id="adresse" placeholder="Adresse de la salle"></textarea><br/><br/>

							<label>Code Postal</label><br/>
							<input type="text" name="code_postal" id="code_postal" placeholder="Code Postal de la salle"/><br/><br/>


							<input type="submit" value="Enregistrer"/><br/><br/>
						</div>
					</form>
				</div>
			</div>
		</main>

		<footer>
		</footer>
	</body>
</html>