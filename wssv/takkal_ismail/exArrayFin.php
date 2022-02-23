<?php

$tabPoids = [76,62.5,45];

$tabPrenoms = ['Cyril', 'Malaïka','Abdel','Fritz'];

$saisons = [
    1 => 'hiver',
    2 => 'printemps',
    5 => 'été',
    6 => 'automne',
];

$infosDate = [
    'joursem' => 'lundi',
	'jour' => 4,
    'mois' => 'novembre',
    'année'	=> 2013,
];

$tabJours = [
    'dimanche',
    'lundi',
    'mardi',	
    'mercredi',	
    'jeudi',	
    'vendredi',	
    'samedi',
];

$tabMois = [
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

$dateComplet = [
    'weekday' => 'Monday',
    'wday' => 1,
    'mday'=> 4,
    'month'=> 'November',
    'mon'=> 11,
    'year'=> 2013,
    'hours'=> 15,
    'minutes'=> 23,
    'seconds'=> 58,
];

$infosPays = [
    'Belgique' => [
        'capitale' => 'Bruxelles',
        'monnaie' => 'euro',
        'superficie' => 30528,
        'langues' => [
            'français','néerlandais','allemand',
        ],
    ],
    'France' => [
        'capitale' => 'Paris',
        'monnaie' => 'euro',
        'superficie' => 675417,
        'langues' => 'français',
    ],
    'Japon' => [
        'capitale' => 'Tokyo',
        'monnaie' => 'yen',
        'superficie' => 377915,
        'langues' => 'japonais',
    ],
    'Suisse' => [
        'capitale' => 'Berne',
        'monnaie' => 'franc suisse',
        'superficie' => 41285,
        'langues' => [
            'allemand','français','italien','romanche',
        ],
    ],
];

?>
<pre>
<?php var_dump($infosPays);?>
</pre>

<h3>3.	En utilisant le tableau $infosPays.</h3>
<h3>a.	Ajoutez l'anglais comme langue supplémentaire pour tous les pays.</h3>
<?php
    foreach ($infosPays as $pays => $data) {
        if (is_array($data['langues'])) {
            array_push($data['langues'], 'anglais');
        } else {
            $data['langues'] = explode(', ',$data['langues']);
            array_push($data['langues'], 'anglais');
        }
    }
?>
<pre>
<?php var_dump($infosPays);?>
</pre>
<hr>
<h3>b.	Ajoutez comme information supplémentaire l'extension de domaine correspondante à chaque pays (be, fr, jp, ch).</h3>
<?php
    $extensions = [
        'Belgique' => 'be',
        'France' => 'fr',
        'Japon' => 'jp',
        'Suisse' => 'ch',
    ];
foreach ($infosPays as $pays => $data) {
    $data['extension'] = $extensions[$pays];
}
?>

<hr>
<h2>Exercices supplémentaires</h2>
<h3>1.	En utilisant le tableau $infosPays,</h3>
<h3>a.	Calculez et affichez la superficie moyenne de tous les pays.</h3>
<?php foreach ($infosPays as $pays => $data ) { ?>
    <?php $sup[] = $data['superficie'];?>
    <?php } ?>
<p><?= array_sum($sup); ?> km² au total</p>    

<hr>
<h3>b.	Calculez et affichez la superficie moyenne des pays de la zone euro.</h3>
<?php foreach ($infosPays as $pays => $data) {
    if ($data['monnaie'] == 'euro') {
        $sup2[] = $data['superficie'];
    }
}
?>
<p><?= array_sum($sup2); ?> km² au total</p>
<hr>

<h3>c.	Affichez quel pays a la plus grande superficie.</h3>
<?php foreach ($infosPays as $pays => $data) {
   $sup[] = $data['superficie'];
   $max = max($sup); 
   if ($max == $data['superficie']) {
       echo $pays;
   } 
}
?>
<hr>
<h3>d.	Affichez quel pays en dehors de la zone euro a le plus de langues.</h3>
<?php 
//n'y parvient pas...
?>
<hr>
<hr>
<hr>
<hr>
<hr>