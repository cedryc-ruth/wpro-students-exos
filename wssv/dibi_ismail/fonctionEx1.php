<meta charset="utf-8" />
<?php
//EXEMPLE ===================================
/** Calcul du carré d'un nombre
* 
* @param float $x Nombre dont on veut connaître le carré
* @return float renvoie le carré du nombre $x
* sur base de la formule mathématique:
* Cx = x*x
*/
function carre($x){
return $x*$x;
}
//Usage correct :)
$nb = 5;
$resultat = carre($nb);
echo "<p>Le carré de $nb vaut $resultat</p>";
echo "<p>Le carré de 7 vaut ".carre(7)."</p>";
//Usage incorrect :(
echo "<p>Le carré de $nb vaut carre($nb)</p>";
echo '<p>Le carré de $nb vaut carre($nb)</p>';
//FIN EXEMPLE ====================================
?>
<hr />
<?php
/** Calcul de la superficie d'un triangle
* 
* @param float $base Base du triangle
* @param float $hauteur Hauteur du triangle
* @return float renvoie la superfice du triangle
* sur base de la formule mathématique:
* St = base*hauteur/2
*/
function superficie($base,$hauteur){
 return ($base*$hauteur)/2 ;
}
//Calculer la superficie d'un triangle de base 5 et de hauteur 12
$reponse = superficie(5,12) ;
echo "<p>Superficie: $reponse cm2;</p>";
?>
<hr />
<?php
/** Calcul du périmètre d'un triangle
*
* @param float $cote1 un des cotés du triangle
* @param float $cote2 un des cotés du triangle
* @param float $cote3 un des cotés du triangle
* @return float renvoie le périmètre du triangle
* sur base de la formule mathématique:
* Pt = cote1 + cote2 + cote3
*/
function perimetre($cote1,$cote2,$cote3){
return $cote1+$cote2+$cote3;
}
//Calculer le périmètre d'un triangle de côtés 7, 8 et 4
echo "<p>Perimètre du triangle: ".perimetre(7,8,4)."cm</p>";
?>
<hr />
<?php
/** Calcul de l'hypoténuse d'un triangle rectangle
*
* @param float $x le nombre dont on veut le carré 
* @param float $cote1 base triangle rectangle 
* @param float $cote2 l'autre coté du triangle rectangle
* @return renvoie l'hypoténuse du triangle
* sur base de la formule mathématique:
* Hypo = racine(cote1²+cote2²)
*/
//Solution 1:
function hypotenuse($cote1,$cote2) {
return sqrt(carre($cote1)+carre($cote2)) ;
}
echo hypotenuse(5,10);
?>
<hr />
<?php
//Solution 2: Utiliser la fonction prédéfinie hypot
echo hypot(5,10);
?>
