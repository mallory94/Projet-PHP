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

function arreterTestBD($id_test){
	require ("../modele/connect.php") ; 
	$sql="UPDATE test SET bActif = 0 WHERE id_test =:idTest";
	$resultat= array();
	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idTest', $id_test);
		$bool = $commande->execute();
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}


function exportBilanBD(){
	require ("../modele/connect.php") ; 
	$sql="SELECT *
	FROM bilan, etudiant 
	WHERE bilan.id_test=:idTest AND etudiant.num_grpe=:numGroupe"
	;
	$resultat= array();
	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idTest', $_SESSION['idtest'][0]['id_test']);
		$commande->bindParam(':numGroupe',$_SESSION['groupe']);
		$bool = $commande->execute();
		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
		}
		$excel = "";
		$excel .=  "nom\tprenom\tnote reçue au test\n";
		foreach ($resultat as $bilan) {
			$excel .= "$bilan[nom]\t$bilan[prenom]\t$bilan[note_test]\n";
		}
		header("Content-type: application/vnd.ms-excel");
		header("Content-disposition: attachment; filename=bilan-test.xls");
		print $excel;
		exit;		
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}
?>