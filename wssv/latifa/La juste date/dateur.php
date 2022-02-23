<?php
$date = Date("d-m-Y");

//var_dump($today);

if(!empty($_GET['op']) && !empty($_GET['previous'])){
	$op = $_GET['op'];
	$previous = $_GET['previous'];
	$tab = explode('-', $previous);
	$day = $tab[0];
	$month = $tab[1];
	$year = $tab[2];

	//echo $op;
	//echo $previous;
	//var_dump($day, $month, $year);

	switch ($op) {
		case 'anneeprec':
			$year -= 1;
			break;
		case 'moisprec':
			$month -= 1;
			break;
		case 'jourprec':
			$day -= 1;
			break;
		case 'joursuiv':
			$day += 1;
			break;
		case 'moissuiv':
			$month += 1;
			break;			
		case 'anneesuiv':
			$year += 1;
			break;	
	}
	$newTimestamp = mktime(0, 0, 0, $month, $day, $year);
	$date = date('d-m-Y', $newTimestamp);
}

?>
<!doctype html>
<html lang = "fr">
<meta charset = "utf-8">
<title>La juste date</title>
<body>
	<a href = "dateur.php?op=anneeprec&previous=<?= $date ?>"><< Année</a> 
	<a href = "dateur.php?op=moisprec&previous=<?= $date ?>"><< Mois</a> 
	<a href = "dateur.php?op=jourprec&previous=<?= $date ?>"><< Jour</a> 
	<a href = "dateur.php?op=today"><?= $date ?></a>
	<a href = "dateur.php?op=joursuiv&previous=<?= $date ?>">Jour >></a>
	<a href = "dateur.php?op=moissuiv&previous=<?= $date ?>">Mois >></a>
	<a href = "dateur.php?op=anneesuiv&previous=<?= $date ?>">Année >></a>

</body>	
