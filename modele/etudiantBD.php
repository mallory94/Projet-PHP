<?php

function listeTestDispoBD(){

	require ("modele/connect.php") ; 

    $sql = "SELECT t.titre_test from test as t, etudiant as e 
    WHERE t.num_grpe = e.num_grpe
	AND t.bActif = 1
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
			return array();
		}

	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}

function questionCouranteBD($indiceQuestion){
	require ("../modele/connect.php");
	$sql = "SELECT  * FROM qcm, question as q, test
		WHERE qcm.id_test =:idTest
		AND test.id_test =:idTest
		AND qcm.bAutorise = 1
		AND qcm.bBloque = 0
		AND qcm.bAnnule = 0
		AND q.id_quest = qcm.id_quest";
	return $question;
}

function listeQuestionsBD($indiceTest){
	require ("../modele/connect.php");
	$sql = "SELECT DISTINCT q.* FROM qcm, question as q, test
	WHERE qcm.id_test =:idTest
	AND qcm.bAutorise = 1
	AND qcm.bBloque = 0		
	AND qcm.bAnnule = 0
	AND q.id_quest = qcm.id_quest";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idTest', $indiceTEst);
		$bool = $commande->execute();
		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($resultat);
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

function listeReponsesBD($id_question){
	require ("../modele/connect.php");
	$sql = "SELECT * FROM reponse WHERE id_quest=:id_question";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id_question', $id_question);
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


	return ;
}


?>