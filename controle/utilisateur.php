<?php 
/*controleur c1.php :
  fonctions-action de gestion (c1)
*/

function ident() {
	$login=  isset($_POST['login'])?($_POST['login']):'';
	$mdp =  isset($_POST['mdp'])?($_POST['mdp']):'';
	$msg='';
	

	if  (count($_POST)==0)
              require ("./vue/utilisateur/ident.tpl") ;
    else {
	    if  (!verif_ident($login,$mdp)) {
			$_SESSION['login']=array();
			$_SESSION['mdp']="";
	        $msg ="Erreur : Login / Mot de passe incorrect";
	        require ("./vue/utilisateur/ident.tpl") ;
		}
	    else { 
			$_SESSION['login'] = $login;
			$_SESSION['mdp'] = $mdp;
			$url = "index.php?controle=utilisateur&action=accueil";
			header ("Location:" .$url) ;
			
			//$url = "accueil.php?no=$nom";
			//header ("Location:" .$url) ;	//echo ("ok, bienvenue"); 
		}
    }	
}

function verif_ident($login,$mdp) {
	require ('./modele/utilisateurBD.php');
	return verif_ident_BD($login,$mdp); //true ou false en base;
}


function accueil() {
	$login = $_SESSION['login'];
	$mdp = $_SESSION['mdp'];
	if($_SESSION['roleCourant'] == "professeur"){
		require ("./vue/utilisateur/accueilProf.tpl");
	} else if($_SESSION['roleCourant'] == "etudiant"){
		require ("./vue/utilisateur/accueilEtu.tpl");
	}
}

function liste_u() {
		require ('./modele/utilisateurBD.php');
		//.....;
}

?>