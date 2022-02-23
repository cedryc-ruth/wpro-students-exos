<?php
// EX.1-2
define("MAJEUR",18);
$nom = "Echamlali";
$prenom = "Hamza";
$tempsNaissance = mktime(0,0,0,2,21,1995);
$dateNaissance = date("d/m/Y", $tempsNaissance);    
$age = date("Y", (strtotime("now") - $tempsNaissance)) - 1970;
$ageMajeur = estMajeur($age, MAJEUR);
$dateMajeur = MajeurDate($age, MAJEUR, $tempsNaissance);
$couleurMajeur = majeurCouleur($ageMajeur);

/** Verifie si l'utilisateur est majeur
 * 
 * @param int $age Nombre qui détermine l'âge de l'utilisateur
 * @param int $MAJEUR Constante qui précise l'âge de la majorité 
 * @return string renvoie la chaine de caractère "majeur" ou "mineur"
 */

 

function estMajeur($age,$MAJEUR){
    if($age >= $MAJEUR){
        return "majeur";
    }else{
        return "mineur";
    }
}

/** Applique une couleur différente si l'utilisateur est majeur 
 * 
 * @param string $ageMajeur Chaine de caractère initialisé à "majeur" ou "mineur"
 * @return string renvoie la chaine de caractère "green" ou "red"
 */
function majeurCouleur($ageMajeur){
    if($ageMajeur == "majeur"){
        return "green";
    }else{
        return "red";
    }
}

/** Calcul quand l'utilisateur sera ou a été majeur 
 * 
 * @param int $age Nombre qui détermine l'âge de l'utilisateur
 * @param int $MAJEUR Constante qui précise l'âge de la majorité 
 * @param int $tempsNaissance Nombre qui détermine le timestamp de la date de naissance
 * @return string renvoie la date à laquelle l'utilisateur a été ou sera majeur
 */
function MajeurDate($age, $MAJEUR, $tempsNaissance){
if ($age > $MAJEUR){
    $i = $age;
    $compteur = 0;
    while($i != $MAJEUR){
        $i--;
        $compteur++;
    }
    return date("d/m",$tempsNaissance). "/".date("Y", strtotime("now -$compteur year")).", j'ai eu ";
} else if($age < $MAJEUR) {
    $i = $age;
    $compteur = 0;
    while ($i != $MAJEUR){
        $i++;
        $compteur++;
    }
    return date("d/m",$tempsNaissance). "/".date("Y", strtotime("now +$compteur year")).", j'aurai ";
} else{
    return date("d/m",$tempsNaissance). "/".date("Y", strtotime("now")). ", j'ai eu ";
}
}
?>     

<?php
// EX.3
$salaires = [1725,2030,1460,1950,2100];
$totaleSalaires = salairesTotale($salaires);
$moyenneSalaires = salairesMoyenne($totaleSalaires, $salaires);

/** Calcule le total des salaires
 * 
 * @param int $salaires Tableau qui regroupe les salaires 
 * @return int $totale renvoie le total des salaires
 */
function salairesTotale($salaires) {
$totale = 0;
    for( $i = 0; $i < count($salaires); $i++){ 
    $totale += $salaires[$i];
}
return $totale;
}


/** Calcule la moyenne des salaires
 * 
 * @param int $salaires Tableau qui regroupe les salaires 
 * @param int $totalSalaire Nombre qui représente le total des salaires
 * @return int renvoie la moyenne des salaire
 */
function salairesMoyenne($totaleSalaires, $salaires){
  return $totaleSalaires/count($salaires);
}
?>

<?php
// EX.4
DEFINE("TVA",0.21);
DEFINE("REMISE",0.05);
$HTVA = 1200;
$TTC = calcul_TTC($HTVA, TVA, REMISE);

/** Calcul le prix TTC avec ou sans remise
 * 
 * @param int $HTVA Nombre qui détermine le prix HTVA
 * @param int $TVA Constante qui détermine le montant de la TVA
 * @param int $REMISE Constante qui détermine le montant de la remise
 * @return int renvoie la valeur du montant TTC avec ou sans remise
 */
function calcul_TTC($HTVA, $TVA, $REMISE){
    if($HTVA > 1500){
       return round((($HTVA - ($HTVA*$REMISE)) * $TVA) + ($HTVA - ($HTVA*$REMISE)));
    }else{
        return round(($HTVA*$TVA) + $HTVA);
    }
}
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title> Exercice 1 : Les variables </title>
    </head>

    <body>
<!-- EX.1-2 -->
        <p>Je m'appelle <span class="p_gras"> <?= "$nom $prenom"; ?> </span> et j'ai <?= $age; ?> ans.</p>
        <p> Le <?= $dateMajeur; ?> <span class="p_gras"> <?= MAJEUR; ?> ans</span>!</p>
        <p id=<?= $couleurMajeur; ?>> je suis <?= $ageMajeur; ?>!</p>

<!-- EX.3 -->
        <ul>
        <?php 
        for($i = 0; $i < count($salaires); $i++){ ?> 
            <li> <?= $salaires[$i]; ?> €</li>
        <?php }; ?>
        </ul>
        <p> Le salaire total est de <?= $totaleSalaires; ?> € </p>
        <p> Le salaire moyen est de <?= $moyenneSalaires; ?> € </p>
        
<!-- EX.4 -->
        <p> [ <?= $HTVA; ?> € au taux de <?= TVA*100; ?>% donne <?= $TTC; ?> € à payer ] </p>
    <body>
</html>