<?php

$tabPoids = [76, 62.5, 42];
$tabPrenoms = ['Cyril', 'Malaïka', 'Abdel', 'Fritz'];
$tabJours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
$saisons = [1 => 'hiver', 'printemps', 5 => 'été', 'automne'];
$infosDate = ['joursem' => 'lundi', 'jour' => 4, 'mois' => 'novembre', 'année' => 2013];
$tabMois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
$dateComplet = ['weekday' => 'Monday', 'wday' => 1, 'mday' => 4, 'month' => 'november', 'mon' => 11, 'year' => 2013, 'hours' => 15, 'minutes' => 23, 'seconds' => 58];

$infosPays =['Belgique' =>
                ['capitale' => 'Bruxelles',
                    'monnaie' => 'euro',
                    'superficie' => 30528,
                    'langues' => ['français', 'néerlandais', 'allemand']
                ],
            'France' =>
                ['capitale' => 'Paris',
                    'monnaie' => 'euro',
                    'superficie' => 675416,
                    'langues' => 'français'
                ],
            'Japon' =>
                ['capitale' => 'Tokyo',
                    'monnaie'=> 'yen',
                    'superficie' => 377915,
                    'langues' => 'japonais'
                ],
            'Suisse' =>
                ['capitale' => 'Berne',
                    'monnaie' => 'franc suisse',
                    'superficie' => 41285,
                    'langues' => ['allemand', 'français', 'italien', 'romanche']
                ]
            ];

//Exercice 2
echo '<h3>Exercice 2</h3>';

foreach ($tabPoids as $poids){
    echo '<p>'.$poids.'</p>';
}

//Exercice 3
echo'<h3>Exercice 3</h3>';
echo '<ul>';

foreach ($tabPrenoms as $prenom){
    echo '<li>'.$prenom.'</li>';
}

echo '</ul>';

//Exercice 4
echo'<h3>Exercice 4</h3>';
echo '<ul>';

for ($i = sizeof($tabPrenoms); $i > 0; $i--){
    echo '<li>'.$tabPrenoms[$i-1].'</li>';
}

echo '</ul>';

//Exercice 5
echo '<h3>Exercice 5</h3>';

foreach ($tabPoids as $poids){
    if($poids > 50) {
        echo '<p>' . $poids . '</p>';
    }
}

//Exercice 6
echo '<h3>Exercice 6</h3>';
echo '<table style="border-collapse: collapse">';

for ($j = 0; $j < sizeof($tabPrenoms); $j++){
    if($j%2 == 0){
        echo '<tr style="border: 1px solid black;"><td>'.$tabPrenoms[$j].'</td></tr>';
    }
}

echo '</table>';

//Exercice 7
echo '<h3>Exercice 7</h3>';

$str = '';

foreach ($saisons as $saison) {
    $str .= $saison . ', ';
}

echo substr($str,0,-2);   //Afficher une seule fois après la boucle en enlevant les 2 derniers caractères ', '

//Exercice 8
echo '<h3>Exercice 8</h3>';
echo 'Nous sommes en ' . $infosDate['année'] . ', le ' .
    $infosDate['joursem'] . ' ' .
    $infosDate['jour'] . ' ' .
    $infosDate['mois']. '.';

//Exercice 9
echo '<h3>Exercice 9</h3>';
echo 'Nous sommes un ' . $tabJours[$dateComplet['wday']] .' de ' .
    $tabMois[$dateComplet['mon']] . ' et il est ' .
    $dateComplet['hours'] .':' .
    $dateComplet['minutes'] . '.';

//Exercice 10
echo '<h3>Exercice 10</h3>';
echo '<h4>Exercice 10.A</h4>';

foreach ($infosPays as $pays){
    echo '<p>'.$pays['capitale'].'</p>';
}

echo '<h4>Exercice 10.B</h4>';
echo'<pre>'; print_r($infosPays); echo '</pre>';

echo '<h4>Exercice 10.C</h4>';

foreach ($infosPays as $pays){
    if($pays['capitale'] === 'Paris'){
        echo $pays['superficie'];
    }
}

echo '<h4>Exercice 10.D</h4>';

foreach ($infosPays as $pays) {
    if($pays['superficie'] > $infosPays['Suisse']['superficie']){
        echo '<p>'.$pays['superficie'].'</p>';
    }
}

echo '<h4>Exercice 10.E</h4>';

for($k = 0; $k < sizeof($infosPays['Belgique']['langues']); $k++){
    echo '<p>'.$infosPays['Belgique']['langues'][$k].'</p>';
}

echo '<h4>Exercice 10.F</h4>';

echo '<p>Belgique => ';
print_r($infosPays['Belgique']['langues']);
echo '<p>France => ';
print_r($infosPays['France']['langues']);
echo '<p>Japon => ';
print_r($infosPays['Japon']['langues']);
echo '<p>Suisse => ';
print_r($infosPays['Suisse']['langues']);


echo '<h4>Exercice 10.G</h4>';

for ($n = 0; $n < 2; $n++){
    echo $infosPays[$n]['monnaie'];
}


?>
