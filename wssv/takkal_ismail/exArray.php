<?php
/**
 * Série d'exercices de manipulation de tableaux (Array)
 *
 * @author i. Takkal
 * @version 0.1, 03 Dec 2022
 */

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

<hr>
<h3>2. Affichez chaque poids du tableau $tabPoids sur un paragraphe différent.</h3>
    <?php for($i = 0; $i < sizeof($tabPoids); $i++) { ?>
        <p><?= $tabPoids[$i] ?></p>
    <?php } ?>
<hr>
<h3>3. Affichez les prénoms du tableau $tabPrenoms sous forme de liste non ordonnée (ul).</h3>
    <ul>
    <?php foreach($tabPrenoms as $prenom) { ?>
        <li><?= $prenom ?></li>
    <?php } ?>
    </ul>
<hr>
<h3>4. Affichez les prénoms du tableau $tabPrenoms sous forme de liste mais en ordre inverse.</h3>
    <?php foreach(array_reverse($tabPrenoms) as $prenom) { ?>
        <ul><?= "<li>".$prenom."</li>" ?></ul>
    <?php } ?>
<hr>
<h3>5. Affichez les poids supérieur à 50.($tabPoids)</h3>
    <?php foreach($tabPoids as $poid) { ?>
        <?php if($poid > 50) { ?>
            <p><?= $poid ?></p> 
        <?php } ?>
    <?php } ?>
<hr>
<h3>6. Affichez un prénom sur deux sous forme de tableau à une colonne.($tabPrenoms)</h3>
    <table style="border-collapse:collapse">
<?php for($i=0; $i < sizeof($tabPrenoms); $i++) { ?>
    <?php if($i%2 == 0){ ?>
        <tr style="border:1px solid black">
            <td><?= $tabPrenoms[$i] ?></td> 
        </tr>
    <?php } ?>
<?php } ?>
    </table>
<hr>
<h3>7.	Affichez chaque saison du tableau $saisons séparés par une virgule et un espace selon le format suivant:</h3>
                <?= implode(', ',$saisons) ?>
<hr>
<h3>8.	Affichez les données du tableau $infosDate sous la forme:</h3>
                <p>Nous sommes en <?= $infosDate['année'] ?>, le <?= $infosDate['joursem'] ?> <?= $infosDate['jour'] ?> <?= $infosDate['mois'] ?>.</p>
<hr>
<h3>9.	Sachant que vous disposez des tableaux $tabJours et $tabMois. Affichez les données du tableau $dateComplet sous la forme:</h3>
                <p>Nous sommes un <?= $tabJours[1] ?> de <?= $tabMois[10]?> et il est <?= $dateComplet['hours'] ?>:<?= $dateComplet['minutes'] ?>.</p>
<hr>
<h2>10.	En utilisant le tableau $infosPays,</h2>
<h3>a.	Affichez uniquement toutes les capitales.</h3>
        
        <?php foreach ($infosPays as $pays) { ?>
                    <p><?= $pays['capitale'] ?></p>
        <?php } ?>
<hr>
<h3>b.	Affichez en détails toutes les données de tous les pays (en indiquant le pays).</h3>
            <?php foreach ($infosPays as $Pays => $datas) { ?>
                <h4 style="text-decoration: underline;"><?= $Pays ?> :</h4>
                <p>capitale: <?= $datas['capitale'] ?></p>
                <p>monnaie: <?= $datas['monnaie'] ?></p>
                <p>superficie: <?= $datas['superficie'] ?> km²</p>
                <p>langues: <?= is_array($datas['langues']) ? implode(', ', $datas['langues']) : $datas['langues'] ?></p>
            <?php } ?>
<hr>
<h3>c.	Affichez la superficie du pays dont la capitale est Paris.</h3>
<p><?php foreach ($infosPays as $pays => $data) { ?>
<?php if ($pays == 'France') { ?>
    <p><?= $data['superficie'] ?> km²</p>
    <?php } ?>
<?php } ?></p>
<hr>
<h3>d.	Affichez tous les pays dont la superficie est supérieure à celle de la Suisse.</h3>
<?php foreach ($infosPays as $pays => $data) { ?>
    <?php if ($data['superficie'] > $infosPays['Suisse']['superficie']) { ?>
        <p><?= $pays ?></p>
    <?php } ?>
<?php } ?>           
<hr>
<h3>e.	Affichez toutes les langues officielles de Belgique.</h3>
<?= implode(', ', $infosPays['Belgique']['langues']) ?>
<hr>
<h3>f.	Affichez (en indiquant le pays) les langues officielles de tous les pays.</h3>
    <?php foreach ($infosPays as $pays => $langues) { ?>
        <p><?= $pays ?> : <?= is_array($langues['langues']) ? implode(', ', $langues['langues']) : $langues['langues'] ?> </p>
    <?php } ?>           
<hr>
<h3>g.	Affichez la monnaie des deux derniers pays.</h3>
       
       <?php
       //Technique avec les pointeurs de tableaux
        $countrysList = array_keys($infosPays);
        $lastCountry = end($countrysList);
        $prevCountry = prev($countrysList);
        ?>
         <p><?= $infosPays[$prevCountry]['monnaie'] ?></p>
         <p><?= $infosPays[$lastCountry]['monnaie'] ?></p>
       
         <!-- avec la methode forEach-->
        <?php
        $listePays = array_slice($infosPays, count($infosPays)-2, null, true );
         foreach ($listePays as $pays => $monnaie) { ?>
            <p><?= $pays.": ".$monnaie['monnaie'] ?></p>
        <?php } ?>

<hr>
<h2>Modifier les éléments d'un tableau</h2>
<h3>1.	En utilisant le tableau $tabPrenoms,</h3>
<h3>a.	Ajoutez à la fin les prénoms suivants: Mike, Tanaka, Ramón.</h3>
            <?php array_push($tabPrenoms, 'Mike', 'Tanaka', 'Ramón'); ?>
            <p><?= implode(', ', $tabPrenoms) ?></p>

<hr>
<h3>b.	Ajoutez au début les prénoms suivants: César, Pénélope.</h3>
<?php array_unshift($tabPrenoms, 'César','Pénélope') ?>
<?= var_dump($tabPrenoms) ?>
<hr>
<h3>c.	Supprimez le dernier prénom.</h3>
<?php array_pop($tabPrenoms);
    var_dump($tabPrenoms)
?>
<hr>
<h3>d.	Supprimez le premier prénom.</h3>
<?php array_shift($tabPrenoms);
    var_dump($tabPrenoms)
?>
<hr>
<h3>e.	Insérez le prénom Julie en deuxième position.</h3>
            <?php array_splice($tabPrenoms, 1, 0, 'julie');
            var_dump($tabPrenoms)
            ?>
<hr>
<h3>f.	Supprimez les prénoms du troisième au cinquième prénom.</h3>
            <?php
                array_splice($tabPrenoms, 2, 3);
                var_dump($tabPrenoms)
            ?>
<hr>
<h3>2.	En utilisant le tableau $tabPoids,</h3>
<h3>a.	Augmentez tous les poids de 5kg avec une boucle for.</h3>
<!--boucle for-->    
<?php for ($i=0; $i < count($tabPoids); $i++) { ?>
            <p><?= $tabPoids[$i]+5 ?> kg</p>
           <?php } ?> 
<hr>

<!--boucle forEach-->   
<?php foreach ($tabPoids as $poids) { ?>
    <p><?= $poids+5 ?> kg</p>
<?php } ?>

<hr>
<hr>
