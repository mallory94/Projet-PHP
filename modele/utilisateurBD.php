<?php 
/*Fonctions-modèle réalisant la gestion d'une table de la base,
** ou par extension gérant un ensemble de tables. 
** Les appels à ces fcts se fp,t dans c1.
*/

//require ("modele/connect.php") ; //connexion MYSQL et sélection de la base, $link défini

function verif_ident_BD($login,$mdp){ 
	require ("modele/connect.php") ; 
	//global $pdo;
	$sql="SELECT * FROM `professeur` where login_prof=:login";
	$resultat= array(); 
	
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':login', $login);
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
			//var_dump($resultat);
			//die();
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	
	if (count($resultat)== 0) 
		return false; 
	
	if ($resultat[0]['pass_prof'] == $mdp){
		return true;
	}
	else 
		return false;
	//faire une  requête SQL 
}

function liste_u_BD() {
		require ("modele/connect.php") ; 
}

?>