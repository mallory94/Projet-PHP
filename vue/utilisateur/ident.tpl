<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>identification</title>
</head>

<body>

<h3> Formulaire d'authentification </h3> 
<form action="index.php?controle=utilisateur&action=ident" method="post">

    <input 	name="login" 	type="text" value= "<?php echo $login;
											?>"
					>      Login     <br/>
    <input  name="mdp"  type="text"  value= "<?php echo $mdp;
											?>"
					>  Mot de passe   <br/> 
					
    <input type= "submit"  value="soumettre">
	
</form>

<div> 
	<?php echo $msg;
	?>
</div> 

</body></html>