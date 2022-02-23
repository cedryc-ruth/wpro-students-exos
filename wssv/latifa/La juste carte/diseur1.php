<?php

$carte = "";

$cartes = [
	'carte1',
	'carte2',
	'carte3',
];

if(!empty($_GET['carte'])){
	$carte = $_GET['carte'];
}

if(!empty($carte)){
	$carte1 = rand(0,count($carte)-1);
	$carte2 = rand(0,count($carte)-1);
	$carte3 = rand(0,count($carte)-1);
}

echo $carte1;
echo $carte2;
echo $carte3;
var_dump($carte1);
var_dump($carte2);
var_dump($carte3);
var_dump($carte);

?>
<!doctype html>
<html lang = "fr">
<head>
<meta charset = "utf-8">
<title>La juste carte</title>
</head>
<body>
<script>
/**
 * Le script PHP diseur.php affiche trois images de carte à 
 * jouer au hasard. Lorsque l'internaute clique sur une des 
 * cartes, le script doit afficher la valeur de la carte
 * choisie.
 * 
 * @author L.Latifa
 * @version 1.1
 */ 
 </script>	
 <main>
	<p><a href ="diseur.php?carte=carte1"><img src="./images/<?= $carte ?>.jpeg" alt="<?= $carte ?>" height="150"></a></p>
	<p><a href ="diseur.php?carte=carte2"><img src="./images/<?= $carte ?>.jpeg" alt="<?= $carte ?>" height="150"></a></p>
	<p><a href ="diseur.php?carte=carte3"><img src="./images/<?= $carte ?>.jpeg" alt="<?= $carte ?>" height="150"></a></p>
</main>
</body>	
</html>

