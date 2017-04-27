<?php 

require_once("inc/init.inc.php");
$note = "";
$division = 0;
$salles = $pdo -> query("SELECT * FROM salle");			
$salles = $salles -> fetchAll(PDO::FETCH_ASSOC);

$produits = $pdo -> query("SELECT * FROM produit");
$produits = $produits -> fetchAll(PDO::FETCH_ASSOC);

$avis = $pdo -> query("SELECT * FROM avis");			
$avis = $avis -> fetchAll(PDO::FETCH_ASSOC);

require_once("inc/head.php");

?>

<?php foreach ($salles as $key => $value) : ?>

<div>
	<?= $value["id_salle"] ?>
	<img src="photo/<?= $value["photo"] ?>" style="width: 400px;">
	<?php for ($i=0; $i < count($produits); $i++) {
			if($produits[$i]["id_salle"] == $value["id_salle"]){
				echo $produits[$i]["prix"];
			}
		} ?>

	<?php 
	for ($i=0; $i < count($avis); $i++) {
		if($avis[$i]["id_salle"] == $value["id_salle"]){
			$note += $avis[$i]["note"];
			$division += 1;
		}
	}
	if($division > 0) {
		$note = $note / $division; 
	}
	echo $note;
	$note = "";
	$division = 0; 
	?>
</div>

<?php endforeach; ?>