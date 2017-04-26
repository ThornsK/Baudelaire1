<?php 

require_once("inc/init.inc.php");

require_once("inc/head.php");
?>



<!-- <div class="page_content"> -->


		<div class="titre">
			
			<h2>UN MESSAGE ? ENVOYEZ-NOUS UN PIGEON !</h2>

			<p>
				Post-ironic drinking vinegar laboris, aesthetic nostrud eu activated charcoal try-hard chartreuse shabby chic chia unicorn chillwave excepteur forage. Duis banjo laborum readymade qui mlkshk, microdosing next level bushwick pariatur lyft sed. Twee austin williamsburg fap messenger bag swag.
			</p>

		</div>

		

		<div class="formulaire">
			
			<form method="post" action="" id="form1" name="form1">
				<label>Nom : </label><br/>
				<input type="text" name="nom" id="nom" placeholder="Veuillez insérer une marque."><br/>
				<label>Prénom : </label><br/>
				<input type="text" name="prenom" id="prenom" placeholder="Veuillez insérer un modèle."><br/>
				<label>Email : </label><br/>
				<input type="mail" name="email" id="email" placeholder="Veuillez inscrire une année."><br/>
				<label>Message : </label><br/><br/>
				<textarea rows="10" cols="50" placeholder="Votre message"></textarea><br/><br/>

				<input type="submit" id="Mike" value="Envoyer">
			</form>
		</div>



























<?php
require_once("inc/footer.php");
?>