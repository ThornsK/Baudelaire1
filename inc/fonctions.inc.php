<?php

// Fonction debug pour faire les print_r()

function debug($arg){
	echo '<div style="color:white; padding:20px; font-weight:bold; background:#' . rand(111111, 999999) . '">';
	$trace = debug_backtrace(); // debug_backtrace() me retourne les infos sur l'emplacement où a été exécutée la fonction (Array multidimentionnel)
	echo 'Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' à la ligne : ' . $trace[0]['line'] . '<hr/>';

	echo '<pre>';
	print_r($arg);
	echo '</pre>';


	echo '</div>';
}


