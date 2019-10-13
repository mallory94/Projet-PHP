<?php

function recupQuestReponseBD(){

	require ("modele/connect.php") ; 

	$sql="SELECT q.texte, r.texte_rep FROM question as q, reponse as r, qcm as qc, test as t WHERE r.id_quest = q.id_quest AND q.id_quest = qc.id_quest AND t.id_test = qc.id_test AND t.id_test = :idtest";

	$resultat= array();

	try{
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idtest', $_SESSION['idTest']);
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