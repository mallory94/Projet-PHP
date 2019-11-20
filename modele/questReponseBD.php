<?php

function recupQuestReponseDansTestBD($idtest){

	require ("modele/connect.php") ; 

	$sql="SELECT q.texte, r.texte_rep FROM question as q, reponse as r, qcm as qc, test as t WHERE r.id_quest = q.id_quest AND q.id_quest = qc.id_quest AND t.id_test = qc.id_test AND t.id_test = :idtest AND qc.bAutorise = 1";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idtest', $idtest);
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

function recupQuestReponsePasDansTestBD($idtest){

	require ("modele/connect.php") ; 

	$sql="SELECT q.texte, r.texte_rep FROM question as q, reponse as r, qcm as qc, test as t WHERE r.id_quest = q.id_quest AND q.id_quest = qc.id_quest AND t.id_test = qc.id_test AND t.id_test = :idtest AND qc.bAutorise = 0";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idtest', $idtest);
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

function recupIdQuestionBD($texteQuest){

	require ("modele/connect.php") ; 

	$sql="SELECT id_quest FROM question WHERE texte =:nomQuest";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':nomQuest', $texteQuest);
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

function updateQuestionsDansTestBD($idquestion, $idtest){

	require ("modele/connect.php") ; 

	$sql="UPDATE qcm SET bAutorise = 0 WHERE id_quest =:quest AND id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':quest', $idquestion);
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

function questionBloquée($idtest){
	require ("modele/connect.php") ; 

	$sql="SELECT bBloque FROM qcm WHERE id_test =:test AND bAutorise = 1";

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

function bloquerQuestionsBD($idquestion,$idtest){
	require ("modele/connect.php") ; 

	$sql="UPDATE qcm SET bBloque = 1 WHERE id_quest =:quest AND id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':quest', $idquestion);
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

function debloquerQuestionsBD($idquestion,$idtest){
	require ("modele/connect.php") ; 

	$sql="UPDATE qcm SET bBloque = 0 WHERE id_quest =:quest AND id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':quest', $idquestion);
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

function updateQuestionsPasDansTestBD($idquestion, $idtest){

	require ("modele/connect.php") ; 

	$sql="UPDATE qcm SET bAutorise = 1 WHERE id_quest =:quest AND id_test =:test";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':quest', $idquestion);
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


function supprimerQuestionBD($idquestion){
	require ("modele/connect.php") ; 
	$sql="DELETE FROM question WHERE id_quest =:quest";
	$resultat= array();
	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':quest', $idquestion);
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
function supprimerReponsesBD($idquestion){
	require ("modele/connect.php") ; 
	$sql="DELETE FROM reponse WHERE id_quest =:quest";
	$resultat= array();
	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':quest', $idquestion);
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
function supprimerQcmBD($idquestion){
	require ("modele/connect.php") ; 
	$sql="DELETE FROM qcm WHERE id_quest =:quest";
	$resultat= array();
	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':quest', $idquestion);
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