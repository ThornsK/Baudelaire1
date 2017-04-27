<?php 

require_once("inc/init.inc.php");

?>

				<form action="" method="post">

				<h2>Formulaire Inscription</h2>
					<label>Pseudo</label><br>
					<input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"/><br/><br/>

					<label>Mot de passe</label><br>
					<input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"/><br/><br/>

					<label>Nom</label><br>
					<input type="text" name="nom" id="nom" placeholder="Votre nom"/><br/><br/>

					<label>Prénom</label><br>
					<input type="text" name="prenom" id="prenom" placeholder="Votre prenom"/><br/><br/>

					<label>Email</label><br>
					<input type="text" name="email" id="email" placeholder="Votre Email"/><br/><br/>

					<label>Civilité</label><br>

					<div>Homme</div>
					<input type="radio" name="civilite" id="homme" value="Homme"/>
					<div>Femme</div>

					<input type="radio" name="civilite" id="femme" value="femme"/>
					<br/><br/>

					<input type="submit" value="Inscription"/>
					<div id="msg"></div>

				</form>

<script>
$(function(){

	$('input[type="submit"]').click(function(e) {

		e.preventDefault(); 
		var request = $.ajax({ 	
			url: "backoffice/traitement-inscription.php",
			method: "POST",
			data : $( "form" ).serialize()
		});	

		request.done(function( msg ) {
			if(msg == "ça marche"){
				$("#dialog").attr("title", "Se connecter");
				$("#load").load("Connexion.php");
			}
			else{
				$("#msg").html(msg);
			}
		});
	 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
});
</script>