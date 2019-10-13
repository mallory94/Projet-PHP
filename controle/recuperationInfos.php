<?php 

function validationChoix(){
	
	if (isset($_POST['listeTests'])){
		$test = $_POST['listeTests'];
	}

	if (isset($_POST['listeGroupes'])){
		$groupe = $_POST['listeGroupes'];
	}

	$login = $_SESSION['login'];


	require("./vue/utilisateur/questReponseProf.tpl");
}

?>