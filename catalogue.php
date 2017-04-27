<?php 

require_once("inc/init.inc.php");


	$resultat = $pdo -> query("SELECT * FROM salle");
	$salles = $resultat -> fetchAll(PDO::FETCH_ASSOC);




require_once("inc/head.php");

?>

<link rel="stylesheet" type="text/css" href="catalogue.css">
<!-- <div class="page_content"> -->




<aside>
	<section>
		<h2>Catégorie</h2>
		<ul>
			<li><a href="#" id="réunion">Réunion</a></li>
			<li><a href="#" id="bureau">Bureau</a></li>
			<li><a href="#" id="formation">Formation</a></li>
		</ul>
	</section>
	<section>
		<h2>Ville</h2>
		<ul>
			<li><a href="#" id="Paris">Paris</a></li>
			<li><a href="#" id="Lyon">Lyon</a></li>
			<li><a href="#" id="Marseille">Marseille</a></li>
		</ul>
	</section>
	<section>
		<h2>Capacité</h2>
		<form>
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
			</select>
		</form>
	</section>
	<section>
		<h2>Prix</h2>
		<div id="slider"></div>
	</section>
	<section>
		<h2>Période</h2>
		<p>Date d'arrivée</p><br/>
		<input type="text" name="arrivee" id="arrivee" placeholder="00/00/0000 00:00"/>
		<p>Date de départ</p><br/>
		<input type="text" name="depart" id="depart" placeholder="00/00/0000 00:00"/>
	</section>
</aside>




<main>
	<div id="boutique-droite">
		<?php
			foreach($salles as $valeur) : ?>
			<!-- Debut vignette produit -->
			<div class="boutique-produit">
				<h3><?= $valeur["titre"]?></h3>
				<img src="photo/<?= $valeur["photo"]?>" style="width:400px;"/>
				<!--<p style="font-weight: bold; font-size: 20px";><?= $valeur["description"]?></p>-->
				<p style="height: 40px"><?= substr($valeur['description'], 0, 40) ?>...</p>
				<!--<a href="fiche-produit.php?id=<?= $valeur['id_produit']?>" style="padding: 5px 15px; background:red; color: white; text-align: center; border: 2px solid black; border-radius:3px">Voir la fiche du produit</a>-->
			</div>	
		<!-- Fin vignette produit -->
		<?php endforeach; ?>		
	</div>


</main>






<script>
	$(function(){
		$("#slider").slider();
	})
</script>







<?php
require_once("inc/footer.php");
?>
