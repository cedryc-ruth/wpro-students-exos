<?php
/**
 * DATE ET HEURE – EXERCICES
 * @author I. TAKKAL
 * @version 0.1, 12 FEV 2022
 */


$today = getdate();
$noel = mktime(0,0,0,12,25);

$fmtFrNoel = datefmt_create( 'fra',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Europe/Brussels',
    IntlDateFormatter::GREGORIAN,
    'eeee'
    );

$fmtFrToday = datefmt_create( 'fra',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Europe/Brussels',
    IntlDateFormatter::GREGORIAN,
    'eeee d MMMM y'
    );

$dateNextWeek = time() + 7*86400; 

switch (date('l', $dateMtn)) {
    case 'Monday':
        $daysLeft = 2;
        break;
    case 'Tuesday':
        $daysLeft = 1;
        break;
    case 'Wednesday':
        $daysLeft = 0;
        break;
    case 'Thursday':
        $daysLeft = -1;
        break;
    case 'Friday':
        $daysLeft = -2;
        break;
    case 'Saturday':
        $daysLeft = -4;
        break;
    case 'Sunday':
        $daysLeft = -4;
        break;
    default:
        echo "il doit y avoir une erreur...";
        break;
}

//var_dump($daysLeft);

$dateFuture = $dateNextWeek+$daysLeft*86400;

//var_dump(date('dmy',$dateFuture));

$joursSem = [
    'Dimanche',
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
];

$moisAnnee = [
    'janvier',
    'février',
    'mars',
    'avril',
    'mai',
    'juin',
    'juillet',
    'août',
    'septembre',
    'octobre',
    'novembre',
    'décembre',
];

$dayChoice = mktime(0,0,0,03,23,2010);
$DaysAdd = 15;
$futureDay = $dayChoice + $DaysAdd * 86400;

$auj = time();

$nextYear = mktime(0,0,0,date('m'), date('d'), (date('Y')+1));

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>DATES ET HEURES - EXERCICES</h1>
    <h3>1.	Ecrivez un script qui affiche toutes les données de la variable tableau $today suite à l’exécution de cette instruction :</h3>
    <ul>
    <?php foreach ($today as $key => $value) { ?>
        <li><?= "<strong>$key</strong>"." => "."<em>$value</em>"; ?></li>
    <?php } ?>
    </ul>
    <hr>
    <h3>2.	Quel jour de la semaine serons-nous cette année à noël?</h3>
    <p>Noël tombera un <em><?= datefmt_format($fmtFrNoel, $noel)?></em> cette année.</p>
    <hr>
    <h3>3.	Quelle date serons-nous mercredi de la semaine prochaine?</h3>
    <p>Si aujourd'hui, nous sommes le <?= date('d/m/Y')?>.</p>
    <p>Alors, mercredi prochain nous serons le <?= date('d/m/Y', $dateFuture) ?>.</p>
    <hr>
    <h3>4.	Ecrire un script PHP qui affiche la date du jour</h3>
    <h4>a. en français (avec et sans les informations de localisation),</h4>
    <h5>Sans localisation avec dans le format suivant : "Ce vendredi, nous sommes le 17 février 2006."</h5>
    <p>Ce <?= $joursSem[date('w', $today['weekday'])]?>, nous sommes le <?= date('d')?> <?= $moisAnnee[date('n', $today['mon']-1)] ?> <?= date('Y')?>.</p>
    <h5>Avec localisation dans le format suivant : "Ce vendredi, nous sommes le 17 février 2006."</h5>
    <?php $dateMtn = time(); ?>
    <p>Ce <?= datefmt_format($fmtFrToday, $dateMtn) //Le formateur ne parait pas adapté pour y introduire une chaine de caractère à moins de créer un formateur pour chaque partie de date ex: fmt_create => jour, fmt_create => mois,etc.... ?>.</p>
    <hr>
    <h3>5.	Si nous sommes le 23 mars 2010, quelle date serons-nous dans 15 jours?</h3>
    <p>Si aujourd'hui nous sommes le <?= date('d-m-Y', $dayChoice)?>.</p>
    <p>Dans <?= $DaysAdd ?> jours nous seront le <?= date('d-m-Y', $futureDay)?>.</p>
    <hr>
    <h3>6.	Affichez tous les mois de 30 jours, puis ceux de 31 jours et le nombre de jours du mois de février de cette année.</h3>
    <hr>
    <h3>7.	Combien de jours y a-t-il en tout cette année? Et l'année prochaine?</h3>
    <?php
    if(date('L', $auj) == 0){
        echo "<p>Il y a 365 jours cette année.</p>";
    } else {
        echo "<p>Il y a 366 jours cette année.</p>";
    }
    ?>
    <h3>Et l'année prochaine?</h3>
    <?php
    if(date('L', $nextYear) == 0){
        echo "<p>Il y a 365 jours l'année prochaine.</p>";
    } else {
        echo "<p>Il y a 366 jours l'année prochaine.</p>";
    }
    ?>
    <h3>8.	La date limite d'inscription est le 24 avril 2022. Combien de jours me reste-t-il pour m'inscrire?</h3>
    <?php 
    $instantT = time();
    var_dump(date('d-m-y', $instantT));
    $InscriptionFin = mktime(0,0,0,4,24);
    $timeLefts = $InscriptionFin - $instantT;
    echo "<p>Il reste donc ".round($timeLefts/86400)." jours avant la date limite.</p>";
    ?>
</body>
</html>
