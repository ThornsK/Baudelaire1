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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<header>
		</header>

		<main>
			<div class="container">
				<div id="salles">
				<?php
					$contenu = '<table border="1"><tr>';

					//Affichage des noms de colonnes pour le tableau de donnees
					for ($i=0; $i<$resultat -> columnCount(); $i++){
						$meta = $resultat -> getColumnMeta($i);
						$contenu.= '<th>' . $meta['name'] . '</th>';
					}
									
					$contenu.='<th>';
					$contenu.='actions';
					$contenu.='</th>';
					$contenu.= '</tr>';

					$salles = $resultat -> fetchAll(PDO::FETCH_ASSOC);
					// Affichage des donnees dans le tableau
					for ($i=0; $i<count($salles); $i++){
						$contenu.= '<tr>';
						foreach ($salles[$i] as $indice => $valeur){
							if($indice=="photo"){
								// Definition de la source de la photo
								// Definition d'un id par cellule (selon le type de donnee concerne)
								$contenu .= '<td id="'.$indice.'-'.$salles[$i]["id_salle"].'"><img style="max-width:400px;" src="photo /' . $valeur . '" alt="photo salle'. $valeur.'"/></td>';
							}
							else{
								$contenu .= '<td id="'.$indice.'-'.$salles[$i]["id_salle"]. '">' . $valeur . '</td>';
							}
						}

						$contenu.='<td>';
						$contenu.='<a href="" title=""><img src="img/apercu-salle.png" alt="icone-loupe"/></a>';
						$contenu.='<img src="img/edit.png" alt="icone-ardoise" data-id="'. $salles[$i]["id_salle"] . '" title="modifier-salle"/>';
						$contenu.='<img src="img/delete.png" alt="icone-corbeille" id="'. $salles[$i]["id_salle"] . '" title="supprimer-salle"/>';
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
								<option value="réunion">Réunion</option>
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


							<input type="submit" value="Ajouter" id="validation"/><br/><br/>
						</div>
					</form>
				</div>
				<div id="erreur"></div>
			</div>


		</main>

		<footer>
		</footer>
	</body>

	<script>
	$(function(){

		// suppression de salle
		$('img[title="supprimer-salle"]').click(function(e) {
			var id_salle_suppr = $(this).attr("id");
			console.log(id_salle_suppr);
			var suppr = $.ajax({ 	
					url: "backoffice/traitement-salles.php",
					method: "POST",
					data : {id_salle : id_salle_suppr}
			});	

			suppr.done(function( msg ) {
				window.location.href = "";
			});
			suppr.fail(function( jqXHR, textStatus ) {
				  alert( "Request failed: " + textStatus );
			});
		});


		// Récupération des informations de l'élément à modifier
		$('img[title="modifier-salle"]').click(function(e) {

			var salle_select = $(this).attr("data-id");

			var form = $.ajax({ 	
					url: "backoffice/affichage-salles.php",
					method: "GET",
					data : {id_salle : salle_select}
			});	

			form.done(function( msg ) {
				msg = JSON.parse(msg) 

				var salle_amodif = msg[0];
				console.log(salle_amodif);
				// Récupération des valeurs de l'élément qu'on souhaite modifier, dans les balises du formulaire
				$("#titre").val(salle_amodif.titre);
				$("#description").val(salle_amodif.description);
				$("#capacite").val(salle_amodif.capacite);
				$("#categorie").val(salle_amodif.categorie);
				$("#pays").val(salle_amodif.pays);
				$("#ville").val(salle_amodif.ville);
				$("#adresse").val(salle_amodif.adresse);
				$("#code_postal").val(salle_amodif.cp);
				$("#validation").val("Modifier");


				
				// Modifications d'un élément
				$('input[value="Modifier"]').click(function(modif) {
					//modif.preventDefault();
					// Récupération des valeurs envoyées via le formulaire de mofication

					var id_salle = salle_select;
					var titre = $("#titre").val(); 
					var description = $("#description").val();
					var photo = $("#photo").val(); 
					var capacite = $("#capacite").val();
					var categorie = $("#categorie").val();
					var pays = $("#pays").val(); 
					var ville = $("#ville").val();
					var adresse = $("#adresse").val(); 
					var code_postal = $("#code_postal").val();
					var modif = "true";

					
					var request = $.ajax({ 	
							url: "backoffice/traitement-salles.php",
							method: "GET",
							data : {modif : modif, id_salle : id_salle, titre : titre, description : description, photo : photo, capacite : capacite, categorie : categorie, pays : pays, ville : ville, adresse : adresse, code_postal : code_postal}
					});	
					// Affichage des modifications dans le tableau de données
					request.done(function( msg ) {
						if(msg == "Erreur dans la requette"){
							$('#erreur').html(msg);
						}
						else{
							//$('#titre-'+id_salle).html(titre);

						}
					});
					request.fail(function( jqXHR, textStatus ) {
						  alert( "Request failed: " + textStatus );
					});
				});

			});
			form.fail(function( jqXHR, textStatus ) {
				  alert( "Request failed: " + textStatus );
			});

		});

		$('input[value="Ajouter"]').click(function(modif) {
			var ajout = "true"
			var titre = $("#titre").val(); 
			var description = $("#description").val();
			var photo = $("#photo").val(); 
			var capacite = $("#capacite").val();
			var categorie = $("#categorie").val();
			var pays = $("#pays").val(); 
			var ville = $("#ville").val();
			var adresse = $("#adresse").val(); 
			var code_postal = $("#code_postal").val();

			var request = $.ajax({ 	
					url: "backoffice/traitement-salles.php",
					method: "GET",
					data : {ajout: ajout, titre : titre, description : description, photo : photo, capacite : capacite, categorie : categorie, pays : pays, ville : ville, adresse : adresse, code_postal : code_postal}
			});	
			// Affichage des modifications dans le tableau de données
			request.done(function( msg ) {
				if(msg == "Erreur dans la requette"){
					$('#erreur').html(msg);
				}
				else{
					//$('#titre-'+id_salle).html(titre);

				}
			});
			request.fail(function( jqXHR, textStatus ) {
				  alert( "Request failed: " + textStatus );
			});
		});

	})
			
	</script>

</html>
