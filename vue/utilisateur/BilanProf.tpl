<!doctype html>
<html lang="fr">

	<head>
	  <meta charset="utf-8">
	  <title>Bilan</title>
	  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="./vue/styleCSS/accueilProf.css">
	</head>

	<header>
			<div id="logo">
				<img src="./vue/images/logo-white.jpg">
			</div>
			<div id="titre">
				<h2>Bilan du test : <?php echo $_SESSION['test']?> </h2>
			</div>
			<div id="userInfo">
			<h2> Utilisateur : <?php printf('M. %s',$login); ?></h2>
			</div>
	</header>

	<body>
		<br><br><br><br><br>
		<table>
		  <tr>
		    <td>NOM ETUDIANT</td>
		    <td>NOTE</td>
		  </tr>
	      <?php

	      	for($i = 0; $i < count($noms); $i++){
	      		$nomAffiche = ($noms[$i])['nom'];

	      		$noteAffiche = ($notes[$i])['note_test'];

	      		echo ('<tr>');
	    		echo ('<td>' .$nomAffiche. '</td>');
	    		echo ('<td>' .$noteAffiche. '</td>');
	    		echo('</tr>');
	     	}
	      ?>
		</table>
		<br>
		<p>La moyenne du groupe est : <?php echo $moyenne ?></p>
	</body>
</html>