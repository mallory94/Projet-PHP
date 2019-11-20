<?php

function recupTestBD($login){

	require ("modele/connect.php") ; 

	$sql="SELECT t.titre_test, p.login_prof, t.id_test FROM test as t, professeur as p WHERE t.id_prof=p.id_prof AND p.login_prof=:login";
	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':login', $login);
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

function idTestBD($titre){

	require ("modele/connect.php") ; 

	$sql="SELECT id_test FROM test  WHERE titre_test =:titre";
	

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':titre', $titre);
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

function supprimerTestBD($idtest){

	require ("modele/connect.php") ; 

	$sql="DELETE FROM test WHERE id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':test', $idtest);
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

function supprimerResultatBD($idtest){

	require ("modele/connect.php") ; 

	$sql="DELETE FROM resultat WHERE id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':test', $idtest);
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

function supprimerQcmTestBD($idtest){

	require ("modele/connect.php") ; 

	$sql="DELETE FROM qcm WHERE id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':test', $idtest);
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

function supprimerBilanBD($idtest){

	require ("modele/connect.php") ; 

	$sql="DELETE FROM bilan WHERE id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':test', $idtest);
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

// function getMoyenneBD($id_test){
// 	require ("modele/connect.php");
// 	$sql="SELECT AVG() FROM test  WHERE titre_test =:titre";
	

// 	try{
// 		$commande = $pdo->prepare($sql);
// 		$commande->bindParam(':titre', $titre);
// 		$bool = $commande->execute();
		
// 		if($bool){
// 			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
// 			return $resultat;
// 		}
// 		else{
// 			return array();
// 		}

// 	}
// 	catch (PDOException $e) {
// 		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
// 		die(); 
// 	} 
// }

