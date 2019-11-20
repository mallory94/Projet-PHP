<!doctype html>
<html lang="fr">

	<head>
	  <meta charset="utf-8">
	  <title>Bilan</title>
	  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="./vue/styleCSS/bilanProf.css">
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
		<div class="contentPage">
			<div class="form-group">
				<div id="infoSelected">
					<h1 id="test"><?php echo $test ?> </h1>
					<h1 id="groupe"><?php echo $groupe ?> </h1>
					<h1 id="groupe">Bilan du groupe</h1>
				</div>
				<br>
				<p>Nombre d'étudiants connectés : <?php echo $etuConnecte ?> / <?php echo($etuTotal . "<br>Nombre d'étudiants ayant terminé le test : ". $nbEtuTestFini . "/" . $etuTotal)  ?>
				<br><br>
				<div id="tab">
					<table>
					  <tr>
					    <td id="question">NOM ETUDIANT</td>
					    <td id="question">NOTE</td>
					  </tr>
				      <?php
				      	for($i = 0; $i < count($noms); $i++){
				      		$nomAffiche = $noms[$i]['nom'];

				      		$noteAffiche = $notes[$i]['note_test'];

				      		echo ('<tr>');
				    		echo ('<td id="reponse">' .$nomAffiche. '</td>');
				    		echo ('<td id="reponse">' .$noteAffiche. '/100 autrement dit '. ($noteAffiche/100)*20 .'/20</td>');
				    		echo('</tr>');
				     	}
				      ?>
					</table>
				</div>
				<br>
				<p>La moyenne du groupe est : <?php echo($moyenne.'/100')  ?></p>
				<form method="post" action="./controle/finTest.php">
					<input id="validation" type="submit" value="Arreter le test">
				</form>
			</div>
		</div>

		<div class="contentPage">	
			<div class="returnButtonContainer">
				<form method="post" action="index.php?controle=questReponse&action=retour">
					<input id="validation" type="submit" value="retour">
				</form>
			</div>
		</div>
	</body>
</html>