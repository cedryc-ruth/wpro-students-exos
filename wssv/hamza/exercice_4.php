<?php

//4.a début 
$htva = 1200;
$TTC = prixTTC($htva);
$prixRemise = remise($TTC);

const TVA = 0.21;

function prixTTC($htva)
{
    return ($htva * 0.21) + $htva;
}
//4.a fin

//4.b début
function remise($TTC)
{
    if ($TTC > 1500) {
        return $TTC - ($TTC * 0.05);
    } else {
        return $TTC;
    }
}
//4.b fin

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utd-8">
    <title> WSSV : Exercice 4</title>
</head>

<body>
    <!-- 4.a suite -->
    <p><?= "[ " . $htva . " € au taux de " . (TVA * 100) . "% donne " . round($TTC, 0) . " € à payer ] "; ?></p>
    <!-- 4.a fin -->

    <!-- 4.b suite et 4.c début -->
    <p><?= "[ " . $htva . " € au taux de " . (TVA * 100) . "% donne " . round($prixRemise, 0) . " € à payer ] "; ?></p>
    <!-- 4.b fin et 4.c fin -->
</body>

</html>