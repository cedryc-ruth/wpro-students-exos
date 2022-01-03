<meta charset="utf-8" />
<?php
/** Calcul du périmètre d'un triangle
*
* @param string $lettre le caractère dont on veux trouvé l'occurence
* @param string $chaine la chaine de caractère dans le quel on va vérifié le nombre d'occurence de la lettre
* @param boolean $casse un boolean qui définit si la casse doit etre respecter ou non
* @return integer return le nombre d'occurence de la lettre ou false si mauvais paramètre
*/
function yaCombien($lettre,$chaine,$casse=true) { 
	//Validation des données
	if(!is_string($lettre) || strlen($lettre)!=1 || !is_string($chaine) || !is_bool($casse) ) {
		return false;
	}
	
	//Traitement des données
	if($casse) {
		return substr_count($chaine,$lettre);
	} else {
		return substr_count(strtoupper($chaine),strtoupper($lettre));
	}
}

echo "<p>".yaCombien("e"," Ma belle Ebony ",true)."</p>";
echo "<p>".yaCombien("e"," Ma belle Ebony ",false)."</p>";
echo "<p>".yaCombien("e"," Ma belle Ebony ",true)."</p>";
echo "<p>".yaCombien("eaiou"," Ma belle Ebony ",true)."</p>";
echo "<p>".yaCombien("e"," Ma belle Ebony ","heuuu")."</p>";
?>
