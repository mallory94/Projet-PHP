<?php 

function validationChoix(){
	var_dump($_POST);die();
	if (isset($_POST['listeTests'])){
		$test = $_POST['listeTests'];
	}
	else{
		echo "erreur";
	}

	if (isset($_POST['listeGroupes'])){
		$test = $_POST['listeGroupes'];
	}

	$login = $_SESSION['login'];

	//$test =  isset($_POST['listeTests'])?($_POST['listeTests']):'';
	//$groupe =  isset($_POST['listeGroupes'])?($_POST['listeGroupes']):'';
	require("./vue/utilisateur/choixThemeTest.tpl");
}

?>