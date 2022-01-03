<?php

// 1a debut
$nom = "Echamlali";
$prenom = "Hamza";
$age = 26;
$jour_naissance = 21;
$mois_naissance = 02;
$annee_naissance = 1995;
$majeur = estMajeur($age);
// 1a fin

// 2 début
const AGE_MAJEUR = 18;
// 2 fin

// 1d début
function estMajeur($age)
{
    if ($age >= 18) {
        return true;
    } else {
        return false;
    }
}
// 1d fin

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title> WSSV : Exercice 1 et 2 </title>
</head>

<body>
    <!-- 1b début -->
    <p><?= "Je m'appelle " . "<strong>" . $prenom . " " . $nom . "</strong>" . " et j'ai " . $age . " ans."; ?></p>
    <!-- 1b fin -->

    <!-- 1c début -->
    <p><?= "Le " . $jour_naissance . "/0" . $mois_naissance . "/" . (date("Y") + 1) . ", j'aurais " . ($age + 1) . " ans!"; ?></p>
    <!-- 1c fin -->

    <!-- 1d début -->
    <?php
    if ($majeur) { ?>
        <p class="majeur"> Je suis majeure! </p>
    <?php } else { ?>
        <p class="mineur">Je suis mineure! </p>
    <?php } ?>
    <!-- 1d fin -->
</body>

</html>