<?php

//FONCTIONS POUR AFFICHER
function showTab($tab) {
    echo ("<pre>".var_dump($tab)."</pre>");
}


function showP($txt) {
    echo "<p>".$txt."</p>";
}


//1.Declarer des tableaux

echo "<h2>DECLARER DES TABLEAUX.</h2>";

echo "<h3>tabPoids.</h3>";
$tabPoids = [76, 62.5, 45];
showTab($tabPoids);

echo "<h3>tabPrénoms.</h3>";
$tabPrenoms = ['Cyril', 'Malaika', 'Abdel', 'Fritz'];
showTab($tabPrenoms);

echo "<h3>saisons.</h3>";
$saisons = [1 => 'hiver', 2 => 'printemps', 5 => 'été', 6 => 'automne'];
showTab($saisons);

echo "<h3>infoDates.</h3>";
$infosDate = ['joursem' => 'lundi', 'jour' => 4, 'mois' => 'novembre', 'année' => 2013];
showTab($infosDate);

echo "<h3>tabJours.</h3>";
$tabJours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
showTab($tabJours);

echo "<h3>tabMois.</h3>";
$tabMois  = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre'];
showTab($tabMois);

echo "<h3>dateComplet.</h3>";
$dateComplet = ['weekday' => 'Monday', 'wday' => 1, 'mday' => 4, 'month' => 'novembre', 'mon' => 11, 'year' => 2013, 'hours' => 15, 'minutes' => 23, 'seconds' => 58];
showTab($dateComplet);

echo "<h3>infoPays.</h3>";
$infosPays = [
    'Belgique' => ['capitale' => 'Bruxelles', 'monnaie' => 'euro', 'superficie' => 30528, 'langues' => ['français', 'neerlandais', 'allemand']],
    'France' => ['capitale' => 'Paris', 'monnaie' => 'euro', 'superficie' => 675417, 'langues' => 'français'],
    'Japon' => ['capitale' => 'Tokio', 'monnaie' => 'yen', 'superficie' => 377915, 'langues' => 'japonais'],
    'Suisse' => ['capitale' => 'Berne', 'monnaie' => 'franc Suisse', 'superficie' => 41285, 'langues' => ['allemand', 'français', 'italien', 'romanche']],
];
showTab($infosPays);


//2.Afficher des tableaux

echo "<h2>AFFICHER DES TABLEAUX.</h2>";

echo "<p>2. Affichez chaque poids du tableau tabPoids sur un paragraphe différent.</p>";

foreach ($tabPoids as $poid) {
    echo "<p>$poid</p>";
}

echo "<p>3. Affichez les prénoms du tableau tabPrenoms sous forme de liste non ordonnée (ul).</p>";

echo "<ul>";
foreach ($tabPrenoms as $prenom) {
    echo "<li>$prenom</li>";
}
echo "</ul>";

echo "<p>4. Affichez les prénoms du tableau tabPrenoms sous forme de liste mais en ordre inverse.</p>";

$lastNameIndex = count($tabPrenoms) - 1;
echo "<ul>";
for ($i = $lastNameIndex; $i >= 0; $i--){
    echo "<li>$tabPrenoms[$i]</li>";
}
echo "</ul>";

echo "<p>5. Affichez les poids supérieur à 50.</p>";

$minCharge = 50;
foreach ($tabPoids as $poid) {
    if ($poid > $minCharge) {
        echo "<p>$poid</p>";
    }
}

echo "<p>6. Affichez un prénom sur deux sous forme de tableau à une colonne.</p>";

echo "<table><tr><th>Un prénom sur deux</th></tr>";
for ($i=1; $i<=$lastNameIndex; $i++){
    if (is_int($lastNameIndex/$i)){
        echo "<tr><td>$tabPrenoms[$i]</td></tr>";
    }
}
echo "</table>";

echo "<p>7. Affichez chaque saison du tableau saisons séparés par une virgule et un espace</p>";

$returnString = "";
$format = ", ";
foreach ($saisons as $saison){
    $returnString .= $saison;
    $returnString .= $format;
}

echo "<p>$returnString</p>";

echo "<p>8. Affichez les données du tableau infosDate</p>";

echo "<p>Nous sommes en ".$infosDate['année'].", le ".$infosDate['joursem']." ".$infosDate['jour']." ".$infosDate['mois'].".";

echo "<p>9. Sachant que vous disposez des tableaux tabJours et tabMois. Affichez les données du tableau dateComplet</p>";

$dateComplet['weekday'] = $tabJours[0];
$dateComplet['month'] = $tabMois[10];

echo "<p>Nous sommes un ".$dateComplet['weekday']." de ".$dateComplet['month']." et il est ".$dateComplet['hours'].":".$dateComplet['minutes'].".";

echo "<p>10.a. Affichez uniquement toutes les capitales</p>";

foreach ($infosPays as $pays){
    echo "<p>".$pays['capitale']."</p>";
    /*MARCHE PAS ???????
    foreach ($pays as $label){
        if ($label === 'capitale'){
            echo "<p>".$pays[$label]."</p>";
        }
    }*/
}

echo "<p>10.b. Affichez en détails toutes les données de tous les pays (en indiquant le pays).</p>";

$amCountry = count($infosPays);
$countryNames = [];
foreach ($infosPays as $pays => $value){
    $countryNames[] = $pays;
}
//var_dump($countryNames);

for ($p = 0; $p < $amCountry; $p++){
    echo "<p>".$countryNames[$p]."</p>";
    showTab($infosPays[$countryNames[$p]]);
}


echo "<p>10.c. Affichez la superficie du pays dont la capitale est Paris.</p>";

foreach ($infosPays as $pays){
    if ($pays['capitale'] == 'Paris'){
        showP("La superficie  est de ".$pays['superficie']);
    }
}


echo "<p>10.d. Affichez tous les pays dont la superficie est supérieure à celle de la Suisse</p>";

$limit = $infosPays['Suisse']['superficie'];
$paysString = "";

foreach ($infosPays as $pays => $value){
    if($infosPays[$pays]['superficie'] > $limit){
        $paysString .= $pays;
        $paysString .= $format;
    }
}

showP("Les pays dont la superficie est supérieure à celle de la Suisse qui est de ".$limit." sont: ".$paysString);


echo "<p>10.e. Affichez toutes les langues officielles de Belgique.</p>";

$prefLan = "le ";
$languString = "les langues officielles de Belgique sont : ";

foreach ($infosPays['Belgique']['langues'] as $langue) {
    $languString .= $prefLan;
    $languString .= $langue;
    $languString .= $format;
}
showP($languString);

echo "<p>10.f. Affichez (en indiquant le pays) les langues officielles de tous les pays.</p>";

foreach ($infosPays as $pays => $value) {
    $stringPays = "Les langues officielles du pays ".$pays." sont : ";
    foreach ($infosPays[$pays]['langues'] as $langue) {
        if (is_string($langue)){
            $stringPays .= $prefLan;
            $stringPays .= $langue;
            $stringPays .= $format;
        }

    }
    $stringPays .= $prefLan;
    $stringPays .= $infosPays[$pays]['langues'];
    $stringPays .= $format;
    showP($stringPays);
}

echo "<p>10.g. Affichez la monnaie des deux derniers pays.</p>";
$revCountryNames = [];
$revInfo = array_reverse($infosPays);
foreach ($revInfo as $pays => $value) {
    $revCountryNames[] = $pays;
}
$infoCountryRevAndIndexed = array_values($revInfo);
$amountCountry = 2;
//showTab($infoCountryRevAndIndexed);
for ($i = 0; $i < $amountCountry; $i++) {
    $moneyStringLast = "La monnaie officielle du pays " . $revCountryNames[$i] . " est : ";
    $moneyStringLast .= $infoCountryRevAndIndexed[$i]['monnaie'];
    showP($moneyStringLast);
}


//3. MODIFIER DES TABLEAUX

echo "<h2>MODIFIER DES TABLEAUX.</h2>";
echo "<h3>1. En utilisant le tableau tabPrenoms.</h3>";
echo "<p>1.a. Ajoutez à la fin les prénoms suivants: Mike, Tanaka, Ramón.</p>";

$tabPrenoms[] = 'Mike';
$tabPrenoms[] = 'Tanaka';
$tabPrenoms[] = 'Ramon';
showTab($tabPrenoms);

echo "<p>1.b. Ajoutez au début les prénoms suivants: César, Pénélope.</p>";

array_unshift($tabPrenoms, 'César', 'Pénélope');
showTab($tabPrenoms);

echo "<p>1.c. Supprimez le dernier prénom.</p>";

array_pop($tabPrenoms);
showTab($tabPrenoms);

echo "<p>1.d. Supprimez le premier prénom.</p>";

array_shift($tabPrenoms);
showTab($tabPrenoms);

echo "<p>1.e. Insérez le prénom Julie en deuxième position.</p>";

array_splice($tabPrenoms, 1, 0, 'Julie');
showTab($tabPrenoms);

echo "<p>1.f. Supprimez les prénoms du troisième au cinquième prénom.</p>";
$start = 2;
$end = 4;

for ($i = $start; $i <= $end; $i++) {
    unset($tabPrenoms[$i]);
}

showTab($tabPrenoms);


echo "<h3>2. En utilisant le tableau tabPoids.</h3>";
echo "<p>2.a. Augmentez tous les poids de 5kg avec une boucle for</p>";

$ammountWeights =  count($tabPoids);

for($i = 0; $i < $ammountWeights; $i++) {
    $tabPoids[$i] += 5;
}
showTab($tabPoids);

echo "<p>2.b Augmentez tous les poids de 5kg avec une boucle foreach.</p>";
showP("Ici c'est sensé rajouter encore 5 mais ne le fait pas????");
foreach($tabPoids as $poid) {
    $poid += 5;
}
showTab($tabPoids);


echo "<h3>3. En utilisant le tableau infoPays.</h3>";
/*
echo "<p>3.a. Ajoutez l'anglais comme langue supplémentaire pour tous les pays.</p>";
showTab($infosPays);
foreach ($infosPays as $pays){
    showTab($pays);
    array_push($pays['langues'], 'anglais');
}
showTab($infosPays);
*/
echo "<p>3.b. Ajoutez comme information supplémentaire l'extension de domaine correspondante à chaque pays (be, fr, jp, ch).</p>";

$domains = ['be', 'fr', 'jp', 'ch'];
$d = 0;

foreach ($infosPays as $pays) {
    $pays['domaine'] = $domains[$d];
    showTab($pays);
    $d++;
}