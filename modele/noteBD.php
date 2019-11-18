<?php

function notesBD($idtest){

	require ("modele/connect.php") ; 

    $sql = "SELECT note_test FROM bilan as b, etudiant as e WHERE b.id_etu = e.id_etu AND b.id_test =:test AND e.num_grpe =:groupe";
    
    $resultat= array();

	try{
		$commande = $pdo->prepare($sql);
        $commande->bindParam(':test', $idtest);
        $commande->bindParam(':groupe', $_SESSION['groupe']);
		$bool = $commande->execute();

		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($resultat);var_dump($_SESSION['idtest']);var_dump($_SESSION['groupe']);die();
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

function getMoyenneBD($idtest){

	require ("modele/connect.php") ; 

    $sql = "SELECT AVG(note_test) FROM bilan as b, etudiant as e WHERE b.id_etu = e.id_etu AND b.id_test =:test AND e.num_grpe =:groupe";
    
    $resultat= array();

	try{
		$commande = $pdo->prepare($sql);
        $commande->bindParam(':test', $idtest);
        $commande->bindParam(':groupe', $_SESSION['groupe']);
		$bool = $commande->execute();

		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($resultat);var_dump($_SESSION['idtest']);var_dump($_SESSION['groupe']);die();
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