<?php
// Déclaration des variables
$choix = '';
$abonnement =['light','medium','speed'];

// Récupération des données
if(!empty($_GET['light'])){
	$choix = $_GET['light'];
} else if(!empty($_GET['medium'])){
	$choix = $_GET['medium'];
} else if(!empty($_GET['speed'])){
	$choix = $_GET['speed'];
}

?>
<!doctype html5>
<html lang ="fr">
<head>
<meta charset ="utf_8">
<title>Le juste prix</title>	
</head>
<body>
	<header>
		<h1>Voici les détails de l'abonnement choisi :</h1>
	</header>
	<main>
		<?php if(!empty($choix)) { ?>
			<p>l'abonnement choisi est : <?= $choix; ?></p>
		<?php } 
		foreach($abonnement[$choix] as $value) {
			<li><a href="offres_abo.php?<?= substr($abonnement,0,-1).'='.$value ?>"><?= $value ?></a></li>
		<?php } else { ?>
			<p>Veuillez choisir un abonnement</p>
		<?php } ?>
	</main>
	

</body>
</html>