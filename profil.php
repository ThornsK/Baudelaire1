<?php 

require_once("inc/init.inc.php");

require_once("inc/head.php");
?>

<h1>Ceci est le profil de <?php if(isset($_SESSION["membre"])){ echo $_SESSION["membre"]["pseudo"];} ?></h1>

