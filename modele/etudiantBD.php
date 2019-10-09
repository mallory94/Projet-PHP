<?php

function listeTestDispoBD(){

	require ("modele/connect.php") ; 

    $sql = "SELECT t.titre_test from test as t, etudiant as e 
    WHERE t.num_grpe = e.num_grpe
    AND e.login_etu=:login";
    
    $resultat= array();

	try{
		$commande = $pdo->prepare($sql);
        $commande->bindParam(':login', $_SESSION['login']);
		$bool = $commande->execute();
		
		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			return $resultat;
		}
		else{
            
            return  array("ahhh","non");
            
		}

	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}

?>