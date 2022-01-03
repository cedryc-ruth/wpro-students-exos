<?php
/** Calcul de la superficie d'un triangle
 * 
 * @param float $base Base du triangle
 * @param float $hauteur Hauteur du triangle
 * @return float renvoie la superfice du triangle
 * 		sur base de la formule mathématique:
 *		St = base*hauteur/2
 */

 function superficie($base, $hauteur){
	return $base*$hauteur;
 }
 

 
echo "<p>Superficie: ".superficie(5,12)." cm&sup2;</p>";

?>
<hr />
<?php
/** Calcul du périmètre d'un triangle
 *
 * @param float $x cote d'un triangle
 * @param float $y cote d'un triangle
 * @param float $z cote d'un triangle
 * 
 * @return float renvoie le périmètre du triangle
 * 		sur base de la formule mathématique:
 * 		Pt = cote1 + cote2 + cote3
 */

	function perimetre($x,$y,$z){
		return $x+$y+$z;
	}
	
	
	echo "<p>P&eacute;rim&egrave;tre: ".perimetre(7,8,4)." cm</p>";

	
?>
<hr />
<?php
/** Calcul de l'hypoténuse d'un triangle rectangle
 *
 * @param 
 * 
 * @return float renvoie l'hypoténuse du triangle
 * 		sur base de la formule mathématique:
 * 		Hypo = racine(cote1²+cote2²)
 */
	function hypotenuse($a,$b){
		return sqrt(($a*$a)+($b*$b));
	}
	
	echo hypotenuse(5,10);

	//echo hypot(5, 10);
?>