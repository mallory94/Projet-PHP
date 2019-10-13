<?php

function recupQuestReponse(){
	require('./modele/questReponseBD.php');
	$resultat = recupQuestReponseBD();
	return $resultat;
}

?>