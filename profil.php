<?php 

require_once("inc/init.inc.php");

if(!userConnecte()){
	header("location:home.php");
}

if (isset($_SESSION["membre"])){
	$resultat = $pdo -> query("SELECT s.titre, p.date_arrivee, p.date_depart, p.prix, p.etat, s.photo
	FROM produit p, commande c, salle s, membre m
	WHERE c.id_produit = p.id_produit
	AND p.id_salle = s.id_salle
	AND c.id_membre = m.id_membre
	AND m.id_membre =". $_SESSION['membre']['id_membre'].";
	");
}
// Fin du if   . $_SESSION['membre']['id_membre'].


require_once("inc/head.php");
?>

<!-- <div class="page_content"> -->


<h1>Bonjour, <?= $_SESSION['membre']['prenom'] ?> !</h1>



		<div class="contenu_profil">



	
			
			<img src="img/user.png" alt="image de profil">


			<div class="user_infos">
				<h2>Vos informations</h2>
				<p>Pseudo : <?= $_SESSION['membre']['pseudo'] ?></p>

				<p>Mail : <?= $_SESSION['membre']['email'] ?></p>
				<p>Prénom : <?= $_SESSION['membre']['prenom'] ?></p>
				<p>Nom : <?= $_SESSION['membre']['nom'] ?></p>
			</div>

		



		<div id="historique">

			<h2>Historique de vos commandes</h2>

			<?php 
			if (isset($_SESSION["membre"])){
				$commande = "<table class='tableau_style'>";
				$commande .= "<tr>";

				for($i = 0; $i < $resultat -> columnCount(); $i++){
					$meta = $resultat -> getColumnMeta($i);
					$commande .= "<th>" . $meta['name'] . "</th>";

				}

				$commande .= "</tr>"; 

				while ($infos = $resultat -> fetch(PDO::FETCH_ASSOC)) {
					$commande .= "<tr>";
					foreach ($infos as $key => $value) {

						if ($key == 'photo') {
							$commande .= '<td><img src="img/' . $value . '"height="80" /></td>';
						}
						else {
							$commande .= "<td>" . $value . "</td>";
						}



					}
					$commande .= "</tr>";
				}

				$commande .= "</table>";

				echo $commande;
			} // Fin du if

			?>
		</div>

	</div>














<?php
require_once("inc/footer.php");
?>
