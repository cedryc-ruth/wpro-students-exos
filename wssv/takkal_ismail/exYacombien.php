/**
 * @author i. Takkal
 * 
 * @version 0.1
 *
 * @ date 03 Dec 2022
 */
 
<?php
    function yaCombien($char, $string, $casse = true){

       if(!$casse ){
            return substr_count(strtolower($string), $char);
       }

       if(!is_bool($casse)){
           return false;
       }

       if(strlen($char) != 1 ){
            return false;
       }
       if(!is_string($string)){
           return false;
       }


       return substr_count($string, $char);

    }
?>
    <!-- Cas normaux -->
    <p><?php var_dump(yaCombien("e","Ma belle Ebony",true) === 2);?></p>
    <p><?php var_dump(yaCombien("e","Ma belle Ebony",false) === 3);?></p>
    <p><?php var_dump(yaCombien("e","Ma belle Ebony") === 2);?></p>      
   
    <!-- cas d'erreurs -->
    <p><?php var_dump(yaCombien("e","Ma belle Ebony",'heeeuuu') === false);?></p>
    <p><?php var_dump(yaCombien("aeiou","Ma belle Ebony",true) === false);?></p>
    <p><?php var_dump(yaCombien(17,"Ma belle Ebony",true) === false);?></p>    
    <p><?php var_dump(yaCombien("e",586, true) === false);?></p>        
  <!-- 
    var_dump(yaCombien("e","Ma belle Ebony",true) === 2);
    var_dump(yaCombien("e","Ma belle Ebony",true) === 2);
    
