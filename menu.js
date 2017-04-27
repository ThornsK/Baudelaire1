

/*
FONCTION JQUERY POUR LA SIDEBAR
*/

$(document).ready(function(){

	$(".toggle_menu").click(function(){
		$(".sidebar_menu").removeClass("hide_menu");
		$(".toggle_menu").addClass("opacity_one");

	}); // fin evenement click toggle


	$(".fa-times").click(function(){
		$(".sidebar_menu").addClass("hide_menu");
		$(".toggle_menu").removeClass("opacity_one");

	}); // fin evenement click f-times



}); // fin du document ready