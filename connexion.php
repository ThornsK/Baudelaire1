

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
				<h1>Se connecter</h1>

				<form action="" method="post">

					<label>Pseudo</label>
					<input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"/><br/><br/>

					<label>Mot de passe</label>
					<input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"/><br/><br/>

					<input type="submit" value="Connexion"/>

				</form>
			</div>
		</main>

		<footer>
		</footer>
	</body>

<script>
$(function(){

	$('input[type="submit"]').click(function(e) {

		e.preventDefault(); 
		var request = $.ajax({ 	
			url: "backoffice/traitement-connexion.php",
			method: "POST",
			data : $( "form" ).serialize()
		});	

		request.done(function( msg ) {
			console.log(msg);
		});
	 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
});
		
</script>
</html>