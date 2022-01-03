<?php
/**
 * Premier devoir sur les variables en php.
 * Apprendre à jongler entre le HTML et le PHP. 
 * @author I. Takkal
 * @version 0.1 
 * date: 25/10/2021
 * 
 *
 */
 
//Déclarations des variables, constantes et fonctions. 
	//1a/
	$prenom = "Ismael";
	$nom = "Takkal";
	$majeur = true;
	$dateNaissance = date('Y', mktime(0,0,0,6,15,1990));
	$age = date('Y') - $dateNaissance;
	
	//2a/
	define('MAJORITE', 18);
	
	$majorite = 0;
	
	if($age > 18){
		$majorite = "<p style='color:green'>je suis majeur !"; 
		
	} else {
		$majorite = "<p style='color:red'>je suis mineur !";
	}
	
	
//Traitement des données

	
	
?>
<!Doctype html>
<html lang="fr">
	<head>
		<meta charset='utf-8'>
		<title>exVariables</title>
		<style>

		</style>
	</head>
	<body>
		<h1>Exercices sur les variables</h1>
		<p><?= "Salut les terriens !"; ?></p>
		<h2>exercice 1b</h2>
		<p>Je m'appelle <strong><?=$prenom." ".$nom; ?></strong> et j'ai <?= $age?> ans.</p>
		<hr>
		<h2>exercice 1c</h2>
		<p>Le <?= date('d-m-Y', mktime(0,0,0,6,15,date('Y')+1)) ?>, j'aurais <?= $age+1 ?> ans. </p>
		<hr>
		<h2>exercice 1d</h2>
		<p><?= $majorite ?></p>
		<hr>
		<footer>
		<p>&copy; EPFC 2021 - 2022</p>
		</footer>
	</body>
</html>
