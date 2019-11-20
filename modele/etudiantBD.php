<?php

function listeTestDispoBD(){
	require_once ("modele/connect.php") ; 

    $sql = "SELECT t.titre_test, t.id_test from test as t, etudiant as e 
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


function getTitreTestBD($id_test){
	require ("../modele/connect.php"); 

    $sql = "SELECT t.titre_test from test as t WHERE t.id_test=:idTest";
    
    $resultat= array();

	try{
		$commande = $pdo->prepare($sql);
        $commande->bindParam(':idTest', $id_test);
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

function listeQuestionsBD($idTest){
	require ("../modele/connect.php");
	$sql = "SELECT DISTINCT q.* FROM qcm, question as q, test
	WHERE qcm.id_test =:idTest
	AND qcm.bAutorise = 1
	AND qcm.bBloque = 0		
	AND qcm.bAnnule = 0
	AND q.id_quest = qcm.id_quest
	AND test.id_test =:idTest";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idTest', $idTest);
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

function creerResultatBD($id_test, $id_etu, $id_quest, $id_rep){
	require ("../modele/connect.php");
	$sql = 'INSERT INTO resultat (id_test, id_etu, id_quest, date_res, id_rep) VALUES
	( ? , ? , ? , CURDATE(), ? )';
	try {
		$commande = $pdo->prepare($sql);
		$bool = $commande->execute(array($id_test, $id_etu , $id_quest, $id_rep));
		var_dump($bool);
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die();
	}
	return ;

}


function verifRepBD($id_rep){
	require ("../modele/connect.php");
	$sql = 'SELECT COUNT(*) FROM reponse WHERE id_rep=:idRep AND bvalide = 1';
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idRep', $id_rep);
		$bool = $commande->execute();
		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($resultat[0]['COUNT(*)']);
			if (strcmp($resultat[0]['COUNT(*)'],"1") == 0) {
				return(true);
			}
			else
				return(false);
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}

//renvoit le nombre de réponses à selectionner pour avoir tout bon à une question
function nbRepValidesBD($id_quest){
	require ("../modele/connect.php");
	$sql = 'SELECT COUNT(*) FROM reponse WHERE id_quest=:idQuest AND bvalide = 1';
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idQuest', $id_quest);
		$bool = $commande->execute();
		if($bool){
			$resultat = $commande->fetchALL(PDO::FETCH_ASSOC);
			//var_dump($resultat[0]['COUNT(*)']);
			return($resultat[0]['COUNT(*)']);
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}


function enregistrerBilanBD($id_test, $id_etu, $note) {
	require ("../modele/connect.php");
	$sql = "INSERT INTO bilan ( id_test, id_etu, note_test, date_bilan)
	VALUES (? , ? , ? , CURDATE())";
	try {
		$commande = $pdo->prepare($sql);
		$commande->execute(array($id_test, $id_etu , $note));
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	};
}

function aDejaFaitLeTestBD($id_etu, $id_test){
	require ("../modele/connect.php");
	$sql = 'SELECT COUNT(*) FROM bilan WHERE id_etu=:idEtu AND id_test=:idTest';
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idEtu', $id_etu);
		$commande->bindParam(':idTest', $id_test);
		$bool = $commande->execute();
		if($bool){
			$resultat = $commande->fetchALL(PDO::FETCH_ASSOC);
			//var_dump($resultat[0]['COUNT(*)']);
			if ($resultat[0]['COUNT(*)'] == 0) {
				return false;
			}
			else
				return(true);
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}

function nomsBD($idtest){
	require ("./modele/connect.php");

	$sql = "SELECT e.nom FROM bilan as b, etudiant as e WHERE b.id_etu = e.id_etu AND b.id_test =:test AND e.num_grpe =:groupe";

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':test', $idtest);
        $commande->bindParam(':groupe', $_SESSION['groupe']);
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


function setBConnectBD($login, $boolean){
	require ("../modele/connect.php");
	$sql = "UPDATE etudiant SET bConnect =:val
	WHERE etudiant.login_etu=:loginEtu";

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':val', $boolean);
        $commande->bindParam(':loginEtu', $login);
		$bool = $commande->execute();	
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die();
	}
}

function etudiantConnecteBD(){
	require ("./modele/connect.php");

	$sql = "SELECT nom FROM etudiant, test WHERE etudiant.num_grpe =:groupe AND test.num_grpe=etudiant.num_grpe AND bConnect = 1 AND test.id_test=:idTest";

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':groupe', $_SESSION['groupe']);
		$commande->bindParam(':idTest', $_SESSION['idtest'][0]['id_test']);
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

function listeEtudiantBD(){
	require ("./modele/connect.php");

	$sql = "SELECT nom FROM etudiant , test WHERE etudiant.num_grpe =:groupe AND test.num_grpe=etudiant.num_grpe AND test.id_test=:idTest";

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':groupe', $_SESSION['groupe']);
		$commande->bindParam(':idTest', $_SESSION['idtest'][0]['id_test']);
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


//nombre d'étudiant ayant fini le test pour un groupe donné
function nbEtudiantTestFiniBD(){
	require ("./modele/connect.php");

	$sql = "SELECT COUNT(bilan.id_bilan) as somme
			FROM bilan, etudiant
			WHERE etudiant.num_grpe =:groupe AND bilan.id_test=:idTest 
			AND bilan.id_etu=etudiant.id_etu
			";

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':groupe', $_SESSION['groupe']);
		//var_dump($_SESSION['groupe']);
		$commande->bindParam(':idTest', $_SESSION['idtest'][0]['id_test']);
		$bool = $commande->execute();

		if($bool){
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
			return $resultat[0]['somme'];
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