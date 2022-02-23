<?php
$nb = 10;
$nbCarre = carre($nb);
echo "<p> Le carré de ".$nb." vaut ".$nbCarre.".</p>";

/** Calcul du carré d'un nombre
 * 
 * @param float $nb Nombre dont on veut connaître le carré
 * @return float renvoie le carré du nombre $nb
 *   sur base de la formule mathématique:
 *  Cx = x*x
 */
 function carre($nb){
     return pow($nb, 2);
 }
 ?>

<?php
$baseTriangle = 10;
$hauteurTriangle = 5;
$superficieTriangle = superficie($hauteurTriangle, $baseTriangle);
echo "La superficie d'un triangle de base ".$baseTriangle." et de hauteur ".$hauteurTriangle." vaut ".$superficieTriangle.".</p>"; 

/** Calcul de la superficie d'un triangle
 * 
 * @param float $baseTriangle Base du triangle
 * @param float $hauteurTriangle Hauteur du triangle
 * @return float renvoie la superfice du triangle
 *   sur base de la formule mathématique:
 *  St = base*hauteur/2
 */
 function superficie($baseTriangle,$hauteurTriangle){
     return ($baseTriangle*$hauteurTriangle)/2;
 }
?>

<?php
$cote1 = 5;
$cote2 = 7;
$cote3 = 10;
$trianglePerimetre = perimetre($cote1,$cote2,$cote3);
echo "Le périmètre d'un triangle ayant pour cote les valeurs ".$cote1.",  ".$cote2." et ".$cote3." vaut ".$trianglePerimetre.".</p>";
 
/** Calcul du périmètre d'un triangle
 *
 * @param float $cote1 Premier côté du triangle
 * @param float $cote2 Deuxième côté du triangle
 * @param float $cote3 Troisième côté du triangle
 * 
 * @return float renvoie le périmètre du triangle
 *   sur base de la formule mathématique:
 *   Pt = cote1 + cote2 + cote3
 */
 function perimetre($cote1,$cote2,$cote3){
     return $cote1+$cote2+$cote3;
 }
 ?>

<?php 
$cote1 = 10;
$cote2 = 15;
$triangleHypotenuse = hypotenuse($cote1, $cote2);
echo " L'hypoténuse d'un triangle rectangle ayant pour cote les valeurs ".$cote1." et  ".$cote2." vaut ".$triangleHypotenuse.".</p>";

/** Calcul de l'hypoténuse d'un triangle rectangle
 *
 * @param float $cote1 Premier côté adjacent à l'angle droit du triangle rectangle
 * @param float $cote2 Deuxième côté adjacent à l'angle droit du triangle rectangle
 * 
 * @return float renvoie l'hypoténuse du triangle
 *   sur base de la formule mathématique:
 *   Hypo = racine(cote1²+cote2²)
 */
function hypotenuse($cote1, $cote2){
    return sqrt(pow($cote1, 2) + pow($cote2, 2));
}
 ?>

 <?php

$mot = "TAratatA";
$charactere = "a";
$sensibleCase = true; 
$occurence = yaCombien($mot,$charactere,$sensibleCase);
echo "Y a combien de \"".$charactere."\" dans  \"".$mot."\" ? ".$occurence.".</p>";

/** Compte le nombre d'occurrences d'un caractère dans une chaîne
 * @param string Le caractère a compter
 * @param string Le mot a vérifier
 * @param boolean Indique si la fonction doit être sensible à la casse ou non (par défaut oui)
 * @return string/int renvoie un entier ou false si les paramètres ne sont pas valides
 */
function yaCombien($mot, $charactere, $sensibleCase){
    $compteur = 0;
for($i = 0; $i < strlen($mot); $i++){
    if($sensibleCase == 1){
        if(strlen($charactere) > 1){
            return false;
    }
        else if($mot[$i] == $charactere){
        $compteur++;
    }
    } else if($sensibleCase != 1 && $sensibleCase != 0){
        return false;
    }else{
        if(strlen($charactere) > 1){
            return false;
        } else if(strtolower($mot[$i]) == $charactere){
            $compteur++;
    }
}   
}
return $compteur;
}
?>