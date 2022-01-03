<?php

/** Compter le nombre d'occurences d'un caractère dans une chaine de caractère
 * @param string $char   caractère à rechercher dans la chaine de caractère.
 * @param string $str chaine de
 * @param bool $case true par défaut indique la sensibilité à la casse
 *
 */

function yaCombien($char, $str, $case = true) {
    //DECLARATION DES VARIABLES
    $strLength = strlen($str);
    $count = 0;
    //VALIDATION DES DONNEES UTILISATEUR
    //verifier que $char et $str sont des chaines de caractères, $case est un booleen, l'utilisateur n'entre qu'un caractère
    if (!is_string($str) || !is_string($char) || !is_bool($case) || strlen($char) != 1) {
        return false;
    }
    //si $case est false on transforme tout en minuscule(ou en majuscule si on préfère)
    if (!$case){
        $char = strtolower($char);
        $str =  strtolower($str);
    }

    for ($i = 0; $i < $strLength; $i++){
        if ($char == $str[$i]){
            $count++;
        }
    }
    return $count;
};

//TESTS UNITAIRES
//Cas corrects
var_dump(yaCombien("e", "Ma belle Ebony", true) === 2);
var_dump(yaCombien("e", "Ma belle Ebony", false) === 3);
var_dump(yaCombien("e", "Ma belle Ebony") === 2);
var_dump(yaCombien("aeiou", "Ma belle Ebony", true) === false);
var_dump(yaCombien("e", "Ma belle Ebony", "heuu") === false);
//Cas incorects
//$char ou $str ne sont pas des chaines de caractères
var_dump(yaCombien(true, "Ma belle Ebony") === false);
var_dump(yaCombien("e", true) === false);
//$case n'est pas un booleen
var_dump(yaCombien("e", true, "true") === false);
//l'utilisateur entre plusieurs caractères
var_dump(yaCombien("eea", "Ma belle Ebony") === false);