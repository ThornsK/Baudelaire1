<?php 

$pdo = new PDO("mysql:host=localhost;dbname=sallea", "root", "");

session_start();

$msg = "";

$page = "";

$contenu = "";

define("RACINE_SITE", "/sallea/");
define("RACINE_SERVEUR", $_SERVER["DOCUMENT_ROOT"]);

require_once("functions.php");

?>