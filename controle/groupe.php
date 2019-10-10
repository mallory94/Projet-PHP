<?php

function recupGroupe(){
	require("./modele/groupeBD.php");
	$groupes = recupGroupeBD();
	return $groupes;
}

?>