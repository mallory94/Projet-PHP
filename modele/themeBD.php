<?php

function recupTheme(){
	require ("modele/connect.php") ; 

	$sql="SELECT titre_theme FROM theme";
	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$bool = $commande->execute();
		
		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			return $resultat;
		}
		else{
			return array();
		}

	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}

?>