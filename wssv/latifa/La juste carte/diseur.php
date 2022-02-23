<?php
$carte = [
'asdecoeur.jpeg',
'huitdetrefle.jpeg',
'troisdecarreau.jpeg',
'roisdepique.jpeg',
];

$carte1 = rand(0,count($carte)-1);
$carte2 = rand(0,count($carte)-1);
$carte3 = rand(0,count($carte)-1);

echo $carte1;
echo $carte2;
echo $carte3;
var_dump($carte1);
var_dump($carte2);
var_dump($carte3);
var_dump($carte);

if(!empty($_GET['carte'])){
	$carte = $_GET['carte'];
} 

$asdecoeur = $tab[0];
$huitdetrefle = $tab[1];
$troisdecarreau = $tab[2];
$roisdepique = $tab[3];

switch ($carte1 && $carte2 && $carte3){
	case 'asdecoeur':
		$asdecoeur += 1;
		break;
	case 'huitdetrefle':
		$huitdetrefle += 8; 
		break;
	case 'troisdecarreau':
		$troisdecarreau += 3; 
		break;
	case 'roisdepique':
		$roisdepique += 13;
		break;
}

echo $asdecoeur;
echo $huitdetrefle;
echo $troisdecarreau;
echo $roisdepique;
var_dump($asdecoeur);
var_dump($huitdetrefle);
var_dump($troisdecarreau);
var_dump($roisdepique);

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
 * @version 1.0
 */ 
 </script>	
 <main>
	<p><a href ="diseur.php?carte=carte1"><img src="./images/<?= $carte1 ?>.jpeg" alt="<?= $carte1 ?>" height="150"></a></p>
	<p><a href ="diseur.php?carte=carte2"><img src="./images/<?= $carte2 ?>.jpeg" alt="<?= $carte2 ?>" height="150"></a></p>
	<p><a href ="diseur.php?carte=carte3"><img src="./images/<?= $carte3 ?>.jpeg" alt="<?= $carte3 ?>" height="150"></a></p>
</main>
</body>	
</html>

