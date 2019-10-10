<?php 
/*Fonctions-modèle réalisant la gestion d'une table de la base,
** ou par extension gérant un ensemble de tables. 
** Les appels à ces fcts se fp,t dans c1.
*/

//require ("modele/connect.php") ; //connexion MYSQL et sélection de la base, $link défini

function verif_ident_BD($login,$mdp){
	session_start();
	require ("modele/connect.php") ; 
	//global $pdo;
	$_SESSION['roleCourant'] ="";
	$sql="SELECT * FROM professeur where login_prof=:login";
	$resultat= array();
	$_SESSION['login'] = "" ; 
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':login', $login);
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
			if (count($resultat)== 0) {
				$sql="SELECT * FROM etudiant where login_etu=:login"; //requête qui cherche etudiant
				$commande = $pdo->prepare($sql); //prépare la requete pour recup l'etudiant
				$commande->bindParam(':login', $login);
				$bool = $commande->execute();
				if($bool) {
					$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
					if (count($resultat)== 0) {
						return false;
					}
					else if ($resultat[0]['pass_etu'] == $mdp) {
						$_SESSION['roleCourant'] = "etudiant";
						$_SESSION['login'] = $login;
						return true;
					}
				}
			}
			else if ($resultat[0]['pass_prof'] == $mdp){
				$_SESSION['login'] = $login;
				$_SESSION['roleCourant'] = "professeur";
				return true; 
			}
			
			var_dump($resultat);
			die();
		}

	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
		

	return false;
	//faire une  requête SQL 
}

function liste_u_BD() {
		require ("modele/connect.php") ; 
}

?>