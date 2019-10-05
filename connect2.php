<?php
//Connexion à la base de donnée
require('config.php');

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['mdp'])) {
  extract($_POST);
  // on recupère le mot de passe de la table qui correspond au login du visiteur
  $reponse = $pdo->query('SELECT pass_prof FROM professeur WHERE login_prof= '.$login);
  $donnee = $reponse->fetchAll();
  
  echo $donnee['pass_prof'];
  
  //$sql = "select pass_prof from professeur where login_prof='".$login."'";
  //$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

  //lit la premiere ligne du select
 // $data = mysql_fetch_assoc($req);

  /*if($data['pass_prof'] != $mdp) {
    echo '<p>Mauvais login / password. Veuillez recommencer</p>';
    include('index.php'); // On inclut le formulaire d'identification
    exit;
  }
  else {
    session_start();
    $_SESSION['login'] = $login;
    
    echo 'Vous etes bien logué';
  }   
}
else {
  echo '<p>Vous avez oublié de remplir un champ.</p>';
   include('index.php'); // On inclut le formulaire d'identification
   exit;
*/
}
?>