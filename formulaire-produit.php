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
				<div id="produits">
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
							<label>Date d'arrivée</label><br/>
							<input type="text" name="arrivee" id="arrivee" placeholder="00/00/0000 00:00"/><br/><br/>

							<label>Date de départ</label><br/>
							<input type="text" name="depart" id="depart" placeholder="00/00/0000 00:00"/>
						</div>

						<div>
							<label>Salle</label><br/>
							<select name="salle" id="salle">
								<option value=""></option>
							</select><br/><br/>

							<label>Tarif</label><br/>
							<input type="text" name="prix" id="prix" placeholder="Prix en euros"/><br/><br/>


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