 <?php

require('inc/init.inc.php');



// Traitement pour récupérer toutes les infos des salles
$resultat = $pdo -> query("SELECT * FROM salle");

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
				<div id="salles">
					<?php

					$contenu= '<table border="1">';
					$contenu.= '<tr>';
					for ($i=0; $i<$resultat -> columnCount(); $i++){
						$meta = $resultat -> getColumnMeta($i);
						$contenu.= '<th>' . $meta['name'] . '</th>';
					}

					$contenu.='<th>';
					$contenu.='actions';
					$contenu.='</th>';
					$contenu.= '</tr>';

					$salles = $resultat -> fetchAll(PDO::FETCH_ASSOC);

					for ($i=0; $i<count($salles); $i++){
						$contenu.= '<tr>';
						foreach ($salles[$i] as $indice => $valeur){
							$contenu .= '<td>' . $valeur . '</td>';
						}

						$contenu.='<td>';
						$contenu.='<a href="" title=""><img src="" alt=""/></a>';
						$contenu.='<a href="" title=""><img src="img/edit.png" alt=""/></a>';
						$contenu.='<a href="" title=""><img src="img/delete.png" alt=""/></a>';
						$contenu.='</td>';
						$contenu.= '</tr>';
					}
					$contenu.= '</table>';


					echo $contenu;


					?>

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
								<?php for ($i=1; $i<=20; $i++) : ?>
								<option value="<?= $i ?>"><?= $i ?>
								</option>
								<?php endfor; ?>
								<?php for ($i=20; $i<50; $i++) : ?>
									<?php if ($i%10==0) : ?>
										<option value="<?= $i+10 ?>"><?= $i+10 ?></option>
									<?php endif; ?>
								<?php endfor; ?>
								
								<?php for ($i=50; $i<500; $i++) : ?>
								<?php if ($i%50==0) : ?>
										<option value="<?= $i+50 ?>"><?= $i+50 ?></option>
									<?php endif; ?>
								<?php endfor; ?>
							</select><br/><br/>

							<label>Catégorie</label><br/>
							<select name="categorie" id="categorie">
								<option value="reunion">Réunion</option>
								<option value="bureau">Bureau</option>
								<option value="formation">Formation</option>
							</select><br/><br/>
						</div>

						<div>
							<label>Pays</label><br/>
							<select name="pays" id="pays">
								<option value="France">France</option>
								<option value="Angleterre">Angleterre</option>
								<option value="Espagne">Espagne</option>
								<option value="Italie">Italie</option>
							</select><br/><br/>

							<label>Ville</label><br/>
							<select name="ville" id="ville">
								<option value="Paris">Paris</option>
								<option value="Lyon">Lyon</option>
								<option value="Nantes">Nantes</option>
								<option value="Marseille">Marseille</option>
								<option value="Grenoble">Grenoble</option>
								<option value="Rennes">Rennes</option>
								<option value="Lille">Lille</option>
								<option value="Nimes">Nimes</option>
								<option value="London">London</option>
								<option value="Brighton">Brighton</option>
								<option value="London">London</option>
								<option value="Brighton">Brighton</option>
								<option value="Barcelona">Barcelona</option>
								<option value="Madrid">Madrid</option>
								<option value="Santander">Santander</option>
								<option value="Roma">Roma</option>
								<option value="Milan">Milan</option>
								<option value="Firenze">Firenze</option>
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
