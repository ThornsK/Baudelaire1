
 <?php 

require_once("inc/init.inc.php");

?>

			<div class="connexion" id="dialog" title="Se connecter">
				<div id="load">
					<form action="" method="post">

						<label>Pseudo</label><br>
						<input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"/><br/><br/>


						<label>Mot de passe</label><br>
						<input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"/><br/><br/>


						<input type="submit" value="Connexion"/>

						<div id="load_inscription"><a href="#" id="inscription">Inscription</a></div>
						
						<div id="msg"></div>

					</form>
				</div>
			</div>

<script> 
$(function(){
	$( function() {
		$( "#dialog" ).dialog();
	} );

	$( function() {
		$( "#dialog" ).dialog();
	} );

	$('input[type="submit"]').click(function(e) {

		e.preventDefault(); 

		console.log($( "form" ).serialize());

		var request = $.ajax({ 	
			url: "backoffice/traitement-connexion.php",
			method: "POST",
			data : $( "form" ).serialize()
		});	

		request.done(function( msg ) {

			if(msg == "ça marche"){
				window.location.href = "profil.php";
			}
			else{
				$("#msg").html(msg);
			}
		});
	 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});

	$('#inscription').click(function(e) {

		$("#dialog").attr("title", "S'inscrire");
		e.preventDefault();
		$("#load").load("inscription.php");

	});

});
		
</script>