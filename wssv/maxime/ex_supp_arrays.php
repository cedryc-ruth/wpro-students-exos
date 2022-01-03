<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices supplémentaires</title>
</head>
<body>

<?php

$infosPays = array(
    "Belgique" => array(
        "capitale" => "Bruxelles",
        "monnaie" => "euro",
        "superficie" => 30528,
        "langues" => array(
            0 => "français",
            1 => "néerlandais",
            2 => "allemand",
            3 => "anglais"
        ),
        "extension" => "be"
    ),
    "France" => array(
        "capitale" => "Paris",
        "monnaie" => "euro",
        "superficie" => 675417,
        "langues" => array(
            0 => "français",
            1 => "anglais"
        ),
        "extension" => "fr"
    ),
    "Japon" => array(
        "capitale" => "Tokyo",
        "monnaie" => "yen",
        "superficie" => 377915,
        "langues" => array(
            0 => "japonais",
            1 => "anglais"
        ),
        "extension" => "jp"
    ),
    "Suisse" => array(
        "capitale" => "Berne",
        "monnaie" => "franc suisse",
        "superficie" => 41285,
        "langues" => array(
            0 => "allemand",
            1 => "français",
            2 => "italien",
            3 => "romanche"
        ),
        "extension" => "ch"
    )
);

$superficie = 0;
foreach ($infosPays as $pays){
    $superficie = $superficie + $pays["superficie"];
}
$superficieMoyenne = $superficie/sizeof($infosPays);

?>
<p>(A) La superficie moyenne des pays est de : <?= $superficieMoyenne?></p>

<?php
$superficie = 0;
$nbPaysZoneEuro = 0;
foreach ($infosPays as $pays){
    $nbPaysZoneEuro = $pays["monnaie"] == "euro" ? $nbPaysZoneEuro + 1 : $nbPaysZoneEuro;
    $superficie = $pays["monnaie"] == "euro" ? $superficie + $pays["superficie"] : $superficie;
}

$superficie = $superficie / $nbPaysZoneEuro;
?>

<p>(B) La superficie moyenne des pays de la zone euro est de : <?= $superficie ?></p>

<?php
$superficie = 0;
foreach ($infosPays as $pays => $paysData){
    if ($superficie < $paysData["superficie"]) {
        $superficie = $paysData["superficie"];
        $plusGrdPays = $pays;
    }
}
?>

<p>(C) Le pays avec la plus grande superficie est : <?= $plusGrdPays ?></p>

<?php
$nbLangue = 0;
foreach ($infosPays as $pays => $paysData){
    if ($paysData["monnaie"] != "euro") {
        for($i = 0; $i < sizeOf($paysData); $i++){
            $paysPlusDeLangue = $pays;
        }
    }
}
?>

<p>(D) Le pays en dehors la zone euro avec le plus de langue est : <?= $paysPlusDeLangue ?></p>

<?php
$paysEngAsLangue = array();
foreach ($infosPays as $pays => $paysData){
    for($i = 0; $i < sizeOf($paysData["langues"]); $i++){
        if($paysData["langues"][$i] == "anglais"){
            array_push($paysEngAsLangue, $pays);
        }
    }
}
?>
<p>(E) Les pays dans lesquels on parle l\'anglais sont : </p>
<ul>
    <?php
    if(sizeof($paysEngAsLangue) == 0){
    ?>
    <li>Pas de pays parlant l'anglais</li>
    <?php
    }else{
        for($i = 0; $i < sizeof($paysEngAsLangue); $i++){
        ?>
    <li> <?= $paysEngAsLangue[$i] ?></li>
    <?php
        }
    }
    ?>
</ul>

<?php
$paysEngFrAsLangue = array();
foreach ($infosPays as $pays => $paysData){
    for($i = 0; $i < sizeOf($paysData["langues"]); $i++){
        if($paysData["langues"][$i] == "anglais" || $paysData["langues"][$i] == "français"){
            array_push($paysEngFrAsLangue, $pays);
        }
    }
}
?>
<p>(F) Les pays dans lesquels on parle l'anglais ou le français sont : </p>
<ul>
    <?php for($i = 0; $i < sizeof($paysEngFrAsLangue); $i++){ ?>
    <li><?= $paysEngFrAsLangue[$i] ?></li>
    <?php } ?>
</ul>

<?php
$paysEngButNotFrAsLanguage = array();
if (sizeof($paysEngAsLangue) != 0){
    foreach ($infosPays as $pays => $paysData){
        $containsFr = false;
        $containsEng = false;
        for($i = 0; $i < sizeOf($paysData["langues"]); $i++){
            if($paysData["langues"][$i] == "français"){
                $containsFr = true;
            }
            if($paysData["langues"][$i] == "anglais"){
                $containsEng = true;
            }
        }
        if(!$containsFr && $containsEng){
            array_push($paysEngButNotFrAsLanguage, $pays);
        }
    }
}
?>

<p>(G) Les pays dans lesquels on parle l'anglais mais pas le français sont : </p>
<ul>
    <?php
    if(sizeof($paysEngButNotFrAsLanguage) == 0){
    ?>
    <li>Pas de pays parlant l'anglais mais pas le français</li>
    <?php
    }else{
        for($i = 0; $i < sizeof($paysEngButNotFrAsLanguage); $i++){
    ?>
    <li><?= $paysEngButNotFrAsLanguage[$i] ?></li>
    <?php
        }
    }
    ?>
</ul>

<p>(H) Voici une données au hasard pour chaque pays :</p>
<ul>
    <?php
    foreach ($infosPays as $pays => $paysData){

    echo '<li>' . $pays . ' - ';

        $randomCat = rand(0,sizeof($paysData)-1);

        switch ($randomCat){
            case 0 :
                $randomCat = 'capitale';
                break;
            case 1 :
                $randomCat = 'monnaie';
                break;
            case 2 :
                $randomCat = 'superficie';
                break;
            case 3 :
                $randomCat = 'langues';
                break;
            case 4 :
                $randomCat = 'extension';
                break;
        }

        echo $randomCat . ' :';

        if(is_array($paysData[$randomCat])){ // languages
            foreach ($paysData[$randomCat] as $langue){
                echo ' ' . $langue;
            }
        }else { // other
            echo ' ' . $paysData[$randomCat];
        }

        echo '</li>';
    }

    ?>
</ul>
<?php
$paysAreaLessThanAverage = array();
foreach ($infosPays as $pays => $paysData){
    $paysData["superficie"] < $superficieMoyenne ? array_push($paysAreaLessThanAverage, $pays) : null;
}
?>
<p>(I) Les pays ayant une superficie inférieure à la moyenne ( <?= $superficieMoyenne ?> ) sont :</p>
<ul>

    <?php
    if(sizeof($paysAreaLessThanAverage) == 0){
    ?>
    <li>Pas de pays ayant une superficie plus petite que la superficie moyenne</li>
    <?php
    }else{
        for($i = 0; $i < sizeof($paysAreaLessThanAverage); $i++){
    ?>
    <li><?= $paysAreaLessThanAverage[$i] ?></li>
    <?php
        }
    }
    ?>

</ul>
</body>
</html>
