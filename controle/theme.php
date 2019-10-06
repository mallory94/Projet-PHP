<?php
	
function testTheme(){
	require('./modele/themeBD.php');
	$test = recupTheme();
	$test2 = array();
	var_dump($test2);
	die();


}

?>