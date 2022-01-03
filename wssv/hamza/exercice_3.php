<?php

// 3.a début
$salaire = [1500, 1400, 1700, 1900, 1600];
$totale = salaireTotale($salaire);
$moyen = salaireMoyen($salaire, $totale);

function salaireTotale($salaire)
{
    $total = 0;
    for ($i = 0; $i < 5; $i++) {
        $total = $total + $salaire[$i];
    }
    return $total;
}

function salaireMoyen($salaire, $totale)
{
    return $totale / count($salaire);
}
// 3.a fin

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utd-8">
    <title> WSSV : Exercice 3</title>
</head>

<body>
    <!-- 3.a suite -->
    <p><?= "Le salaire total que doit verser l'employeur est de " . $totale . " €"; ?></p>
    <p><?= "Le salaire moyen des employés est de " . $moyen . " €"; ?></p>
    <!-- 3.a fin -->

    <!-- 3.b début -->
    <ul>
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo "<li>" . $salaire[$i] . " €" . "</li>";
        } ?>
    </ul>
    <!-- 3.b fin -->




    </ul>
</body>

</html>