<?php
//Ex. 1
 $tabPoids = [76,62.5,45];
 $tabPrenoms = ["Cyril", "Malaïka", "Abdel", "Fritz"];
 $saisons = ["hiver", "printemps", "été", "automne"];
 $infosDate = ["joursem" => "lundi", "jour" => 4, "mois" => "novembre", "année" => 2013];
 $tabJours = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
 $tabMois = ["janvier","février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
 $dateComplet = ["weekday" => "Monday","wday" => 1,"mday" => 4,"month" => "November","mon" => 11,"year" => 2013,"hours" => 15,"minutes" => 23,"seconds" => 58];

 $infosPays = 
 [
     ["Belgique" => ["capitale" => "Bruxelles", "monnaie" => "euro", "superficie" => 30528,"langues" => ["français", "néerlandais", "allemand"]]],
     ["France" => ["capitale" => "Paris", "monnaie" => "euro", "superficie" => 675417,"langues" => ["français"]]],
     ["Japon" => ["capitale" => "Tokyo", "monnaie" => "yen", "superficie" => 377915,"langues" => ["japonais"]]],
     ["Suisse" => ["capitale" => "Berne", "monnaie" => "franc suisse", "superficie" => 41285,"langues" => ["allemand", "français", "italien", "romanche"]]]
 ];
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title> Exercice 3 : Les tableaux </title>
    </head>

    <body>

    <!-- Ex.2 -->
    <?php
    for($i = 0; $i < count($tabPoids); $i++){ ?>
     <p> <?= $tabPoids[$i]; ?> </p>
    <?php } ?>
    
    <!-- Ex. 3 -->
    <ul>
    <?php 
    for($i = 0; $i < count($tabPrenoms); $i++){?>
    <li> <?= $tabPrenoms[$i]; ?> </li> 
    <?php } ?>
    </ul>

    <!-- Ex.4 -->
    <ul>
    <?php 
    for($i = 0; $i < count($tabPrenoms); $i++){ ?>
    <li> <?= $tabPrenoms[(count($tabPrenoms)-1)-$i]; ?> </li>
    <?php } ?>
    </ul>

    <!-- Ex.5 -->
    <?php 
    for($i = 0; $i < count($tabPoids); $i++){
    if($tabPoids[$i] > 50){?>
    <p> <?= $tabPoids[$i]; ?> </p>
    <?php }
    } ?>

    <!-- Ex.6 -->
    <table id="tab_border"> 
    <?php 
    $tabPrenomsPair = [[],[]]; 
    $e = 0;
    for($i = 0; $i < count($tabPrenoms); $i++){
    if($i % 2 == 0){
    $tabPrenomsPair[$e][0] = $tabPrenoms[$i] ;?>
        <tr> 
        <td><?= $tabPrenomsPair[$e][0]; ?></td>
        </tr>
           <?php 
           $e++;
           }}?> 
    </table>

    <!-- Ex.7 -->
    <p>
    <?php 
    for($i = 0; $i < count($saisons); $i++){ 
     if($i < (count($saisons)-1)){
         echo $saisons[$i].", "; 
    }else{
        echo $saisons[$i];
    }
    }
    ?>
    </p>

    <!-- Ex.8 -->
    <p>
    <?= 
    "Nous sommes en ". $infosDate["année"] . ", le " . $infosDate["joursem"] . " " . $infosDate["jour"] . " " . $infosDate["mois"].".";
    ?>
    </p>
    
    <!-- Ex.9 -->
    <p>
    <?=
    "Nous sommes un ". $tabJours[$dateComplet["wday"]] . " de " . $tabMois[($dateComplet["mon"]-1)] . " et il est " . $dateComplet["hours"] . ":" . $dateComplet["minutes"].".";
    ?> 
    </p>

    <!-- Ex.10.a -->
    <?php 
    
    for($i = 0; $i < count($infosPays); $i++){
        if($i == 0){
            echo $infosPays[$i]["Belgique"]["capitale"].", "; 
        } else if($i == 1){
            echo $infosPays[$i]["France"]["capitale"].", "; 
        }else if($i == 2){
            echo $infosPays[$i]["Japon"]["capitale"].", "; 
        }else{
            echo $infosPays[$i]["Suisse"]["capitale"]."."; 
        }
    }

    ?>

    <!-- Ex.10.b -->
    <ol>
    <?php
    for($i = 0; $i < count($infosPays); $i++){
        if($i == 0){ ?>
            <li> <?= $infosPays[$i]["Belgique"]["capitale"].", "  . $infosPays[$i]["Belgique"]["monnaie"].", ". $infosPays[$i]["Belgique"]["superficie"]."."; ?> <ul>
            <?php 
            for($e = 0; $e < count($infosPays[$i]["Belgique"]["langues"]); $e++){ ?>
              <li>  <?= $infosPays[$i]["Belgique"]["langues"][$e]."."; ?> </li>
        <?php    } ?> </ul></li>

        <?php } else if($i == 1){ ?>
          <li>  <?= $infosPays[$i]["France"]["capitale"].", " . $infosPays[$i]["France"]["monnaie"].", ". $infosPays[$i]["France"]["superficie"].". "; ?> <ul>
            <?php
            for($e = 0; $e < count($infosPays[$i]["France"]["langues"]); $e++){ ?>
            <li> <?= $infosPays[$i]["France"]["langues"][$e]."."; ?> </li>
            <?php    } ?> </ul></li>

      <?php  }else if($i == 2){ ?>
            <li> <?= $infosPays[$i]["Japon"]["capitale"].", " . $infosPays[$i]["Japon"]["monnaie"].", " . $infosPays[$i]["Japon"]["superficie"]."."; ?> <ul>

            <?php for($e = 0; $e < count($infosPays[$i]["Japon"]["langues"]); $e++){ ?>
                <li> <?= $infosPays[$i]["Japon"]["langues"][$e]."."; ?> </li>
           <?php    } ?> </ul></li>

       <?php }else{ ?>
           <li> <?= $infosPays[$i]["Suisse"]["capitale"].", ". $infosPays[$i]["Suisse"]["monnaie"].", ". $infosPays[$i]["Suisse"]["superficie"].". "; ?> <ul>

            <?php for($e = 0; $e < count($infosPays[$i]["Suisse"]["langues"]); $e++){ ?>
                <li> <?= $infosPays[$i]["Suisse"]["langues"][$e]."."; ?> </li>
                <?php    } ?> </ul></li>
    <?php   }
    } ?>
    </ol>

    <!-- 10.c -->
    <?php 
    for($i = 0; $i < count($infosPays); $i++){
    if($i == 0 && ($infosPays[$i]["Belgique"]["capitale"] == "Paris")){
        echo $infosPays[$i]["Belgique"]["superficie"];

    }else if($i == 1 && ($infosPays[$i]["France"]["capitale"] == "Paris")){
        echo $infosPays[$i]["France"]["superficie"];

    }else if($i == 2 && ($infosPays[$i]["Japon"]["capitale"] == "Paris")){
        echo $infosPays[$i]["Japon"]["superficie"];

    }else if($i == 3 && ($infosPays[$i]["Suisse"]["capitale"] == "Paris")){
        echo $infosPays[$i]["Suisse"]["superficie"];
    }
    }
    ?>

    <!-- 10.d -->
    <?php 
        for($i = 0; $i < count($infosPays); $i++){
        if($i == 0 && $infosPays[$i]["Belgique"]["superficie"] > $infosPays[count($infosPays)-1]["Suisse"]["superficie"]){ ?>
              <p> <?= "La Belgique a une plus grande superficie que la suisse : ".$infosPays[$i]["Belgique"]["superficie"]; ?> </p>
        
            <?php }if($i == 1 && $infosPays[$i]["France"]["superficie"] > $infosPays[count($infosPays)-1]["Suisse"]["superficie"]){ ?>
                <p> <?= "La France a une plus grande superficie que la suisse : ".$infosPays[$i]["France"]["superficie"]; ?> </p>
        
           <?php }if($i == 2 && $infosPays[$i]["Japon"]["superficie"] > $infosPays[count($infosPays)-1]["Suisse"]["superficie"]){ ?>
                <p> <?= "Le Japon a une plus grande superficie que la suisse : ".$infosPays[$i]["Japon"]["superficie"]; ?> </p>
    <?php }
       }
    ?>

    <!-- 10.e -->

    <?php
    for($i = 0; $i < count($infosPays[0]["Belgique"]["langues"]); $i++){ ?>
         <p> <?= $infosPays[0]["Belgique"]["langues"][$i]; ?> </p>
    <?php }
    ?>

    <!-- 10.f -->
    <ol>
    <?php
    for($i = 0; $i<count($infosPays); $i++){
        if($i == 0){ ?>
        <li><?= "Belgique"; ?>  <ul>   
            <?php for($e = 0; $e < count($infosPays[$i]["Belgique"]["langues"]); $e++){  ?>
         <li>  <?= $infosPays[$i]["Belgique"]["langues"][$e]; ?> </li>
       
           <?php }}?> </ul> 

         <?php  if($i == 1){ ?>
        <li><?= "France"; ?>  <ul>   
            <?php for($e = 0; $e < count($infosPays[$i]["France"]["langues"]); $e++){  ?>
         <li>  <?= $infosPays[$i]["France"]["langues"][$e]; ?> </li>
       
           <?php }}?> </ul> 

          <?php if($i == 2){ ?>
        <li><?= "Japon"; ?>  <ul>   
            <?php for($e = 0; $e < count($infosPays[$i]["Japon"]["langues"]); $e++){  ?>
         <li>  <?=$infosPays[$i]["Japon"]["langues"][$e]; ?> </li>
       
           <?php }}?> </ul> 

           <?php if($i == 3){ ?>
        <li><?= "Suisse"; ?>  <ul>   
            <?php for($e = 0; $e < count($infosPays[$i]["Suisse"]["langues"]); $e++){  ?>
         <li>  <?=$infosPays[$i]["Suisse"]["langues"][$e]; ?> </li>
       
           <?php }}?> </ul> 
        <?php } ?> 
    </ol>

    <!-- 10.g -->
    <?php 
    
    for($i = 0; $i < 2; $i++){
      
    if($i == 0 ){ ?>
     <p> <?= $infosPays[count($infosPays)-1]["Suisse"]["monnaie"]; ?> </p>
    <?php } if($i == 1){ ?>
     <p>   <?= $infosPays[count($infosPays)-(1+$i)]["Japon"]["monnaie"]; ?> </p>
  <?php  }
    } ?>

<!-- Modifier les éléments d'un tableau -->

<!-- 1.a -->
<?php array_push($tabPrenoms, "Mike", "Tanaka", "Ramón"); ?>

<!-- 1.b -->
<?php array_unshift($tabPrenoms,"César","Pénélope"); ?>

<!-- 1.c -->
<?php array_pop($tabPrenoms); ?>

<!-- 1.d -->
<?php array_shift($tabPrenoms); ?>

<!-- 1.e -->
<?php array_shift($tabPrenoms); 
      array_unshift($tabPrenoms, "Pénélope", "Julie"); ?>

<!-- 1.f -->
<?php array_splice($tabPrenoms, 2, -3); ?>

<!-- 2.a -->
<?php 
for($i = 0; $i < count($tabPoids); $i++){
    $tabPoids[$i] += 5;
}?>

<!-- 2.b -->
<?php 
foreach($tabPoids as $value){
    $value += 5;
}?>

<!-- 3.a -->
<?php
for($i=0; $i < count($infosPays); $i++){
if($i==0){
    array_unshift($infosPays[$i]["Belgique"]["langues"], "anglais");
} else if($i==1){
    array_unshift($infosPays[$i]["France"]["langues"], "anglais");
} else if($i==2){
    array_unshift($infosPays[$i]["Japon"]["langues"], "anglais");
} else if($i==3){
    array_unshift($infosPays[$i]["Suisse"]["langues"], "anglais");
}
}
?>

<!-- 3.b -->
<?php
array_push($infosPays[0]["Belgique"],"be");
array_push($infosPays[1]["France"],"fr");
array_push($infosPays[2]["Japon"],"jp");
array_push($infosPays[3]["Suisse"],"ch");
?>

<!-- Exercices supplémentaires -->

<!-- 1.a -->
<?php 
$superficieTotale = 0;
for($i = 0; $i < count($infosPays); $i++){
    if($i==0){
        $superficieTotale += $infosPays[$i]["Belgique"]["superficie"];
    } if($i==1){
        $superficieTotale += $infosPays[$i]["France"]["superficie"];
    } if($i==2){
        $superficieTotale += $infosPays[$i]["Japon"]["superficie"];
    } if($i==3){
        $superficieTotale += $infosPays[$i]["Suisse"]["superficie"];
    }
}
echo $superficieTotale/count($infosPays);
?>

<!-- 1.b -->
<?php 
$superficieTotale = 0;
$e = 0;
for($i = 0; $i < count($infosPays); $i++){
    if($i==0 && $infosPays[$i]["Belgique"]["monnaie"] == "euro"){
        $superficieTotale += $infosPays[$i]["Belgique"]["superficie"];
        $e +=1;
    } if($i==1 && $infosPays[$i]["France"]["monnaie"] == "euro"){
        $superficieTotale += $infosPays[$i]["France"]["superficie"];
        $e +=1;
    } if($i==2 && $infosPays[$i]["Japon"]["monnaie"] == "euro"){
        $superficieTotale += $infosPays[$i]["Japon"]["superficie"];
        $e +=1;
    } if($i==3 && $infosPays[$i]["Suisse"]["monnaie"] == "euro"){
        $superficieTotale += $infosPays[$i]["Suisse"]["superficie"];
        $e +=1;
    }
}
echo $superficieTotale/$e;
?>

<!-- 1.c -->
<?php 
$superficieMax = 0;

for($i = 0; $i < count($infosPays); $i++){
    if($i==0 && $infosPays[$i]["Belgique"]["superficie"] > $superficieMax){
        $superficieMax = $infosPays[$i]["Belgique"]["superficie"];

    } if($i==1 && $infosPays[$i]["France"]["superficie"] > $superficieMax){
        $superficieMax = $infosPays[$i]["France"]["superficie"];

    } if($i==2 && $infosPays[$i]["Japon"]["superficie"] > $superficieMax){
        $superficieMax = $infosPays[$i]["Japon"]["superficie"];

    } if($i==3 && $infosPays[$i]["Suisse"]["superficie"] > $superficieMax){
        $superficieMax = $infosPays[$i]["Suisse"]["superficie"];
    }
}
echo $superficieMax;
?>
<!-- 1.d -->

<?php 

$e = 0;
$paysPluslangues = "";
for($i = 0; $i < count($infosPays); $i++){
    if($i==0 && $infosPays[$i]["Belgique"]["monnaie"] != "euro" && count($infosPays[$i]["Belgique"]["langues"]) > $e ){
        $e = count($infosPays[$i]["Belgique"]["langues"]);
        $paysPluslangues = "Belgique";
    } if($i==1 && $infosPays[$i]["France"]["monnaie"] != "euro" && count($infosPays[$i]["France"]["langues"]) > $e ){
        $e = count($infosPays[$i]["France"]["langues"]);
        $paysPluslangues = "France";
    } if($i==2 && $infosPays[$i]["Japon"]["monnaie"] != "euro" && count($infosPays[$i]["Japon"]["langues"]) > $e ){
        $e = count($infosPays[$i]["Japon"]["langues"]);
        $paysPluslangues = "Japon";
    } if($i==3 && $infosPays[$i]["Suisse"]["monnaie"] != "euro" && count($infosPays[$i]["Suisse"]["langues"]) > $e ){
        $e = count($infosPays[$i]["Suisse"]["langues"]);
        $paysPluslangues = "Suisse";
    }
}
echo "Le pays avec le plus de langues en dehors de la zone eu est : ".$paysPluslangues." avec ".$e." langues.";

?>
<!-- 1.e -->
<?php
$paysAnglais = "";
for($i=0; $i < count($infosPays); $i++){
if($i==0){
    for($e = 0; $e < count($infosPays[$i]["Belgique"]["langues"]); $e++){
        if($infosPays[$i]["Belgique"]["langues"][$e] == "anglais"){
            $paysAnglais .= " Belgique ";
        }
    }
} else if($i==1){
    for($e = 0; $e < count($infosPays[$i]["France"]["langues"]); $e++){
        if($infosPays[$i]["France"]["langues"][$e] == "anglais"){
            $paysAnglais .= " France ";
        }
    }
    
} else if($i==2){
    for($e = 0; $e < count($infosPays[$i]["Japon"]["langues"]); $e++){
        if($infosPays[$i]["Japon"]["langues"][$e] == "anglais"){
            $paysAnglais .= " Japon ";
        }
    }
    
} else if($i==3){
    for($e = 0; $e < count($infosPays[$i]["Suisse"]["langues"]); $e++){
        if($infosPays[$i]["Suisse"]["langues"][$e] == "anglais"){
            $paysAnglais .= " Suisse ";
        }
    }
}
}
echo "Les pays ayant comme langue officiel l'anglais sont : ".$paysAnglais;
?>
<!-- 1.f -->
<?php
$paysAnglais = "";
for($i=0; $i < count($infosPays); $i++){
if($i==0){
    for($e = 0; $e < count($infosPays[$i]["Belgique"]["langues"]); $e++){
        if($infosPays[$i]["Belgique"]["langues"][$e] == "anglais" || $infosPays[$i]["Belgique"]["langues"][$e] == "français"){
            $paysAnglais .= " Belgique ";
        }
    }
} else if($i==1){
    for($e = 0; $e < count($infosPays[$i]["France"]["langues"]); $e++){
        if($infosPays[$i]["France"]["langues"][$e] == "anglais" || $infosPays[$i]["France"]["langues"][$e] == "français"){
            $paysAnglais .= " France ";
        }
    }
    
} else if($i==2){
    for($e = 0; $e < count($infosPays[$i]["Japon"]["langues"]); $e++){
        if($infosPays[$i]["Japon"]["langues"][$e] == "anglais" || $infosPays[$i]["Japon"]["langues"][$e] == "français"){
            $paysAnglais .= " Japon ";
        }
    }
    
} else if($i==3){
    for($e = 0; $e < count($infosPays[$i]["Suisse"]["langues"]); $e++){
        if($infosPays[$i]["Suisse"]["langues"][$e] == "anglais" || $infosPays[$i]["Suisse"]["langues"][$e] == "français"){
            $paysAnglais .= " Suisse ";
        }
    }
}
}
echo "Les pays ayant comme langue officiel l'anglais ou le français sont : ".$paysAnglais;
?>
<!-- 1.g -->
<?php
$paysAnglais = "";
$paysFrancais = 0;
$reponse = "";
for($i=0; $i < count($infosPays); $i++){
if($i==0){
    for($e = 0; $e < count($infosPays[$i]["Belgique"]["langues"]); $e++){
        if($infosPays[$i]["Belgique"]["langues"][$e] == "anglais"){
            $paysAnglais = 1;
        }
        if($infosPays[$i]["Belgique"]["langues"][$e] == "français"){
            $paysFrancais = 1;
        }
    }
    if($paysFrancais == 0 && $paysAnglais == 1){
        $reponse .= " Belgique ";
    }
    $paysAnglais = 0;
    $paysFrancais = 0;
} else if($i==1){
    for($e = 0; $e < count($infosPays[$i]["France"]["langues"]); $e++){
        if($infosPays[$i]["France"]["langues"][$e] == "anglais"){
            $paysAnglais = 1;
        }
        if($infosPays[$i]["France"]["langues"][$e] == "français"){
            $paysFrancais = 1;
        }
    }
    if($paysFrancais == 0 && $paysAnglais == 1){
        $reponse .= " France ";
    }
    $paysAnglais = 0;
    $paysFrancais = 0;
} else if($i==2){
    for($e = 0; $e < count($infosPays[$i]["Japon"]["langues"]); $e++){
        if($infosPays[$i]["Japon"]["langues"][$e] == "anglais"){
            $paysAnglais = 1;
        }
        if($infosPays[$i]["Japon"]["langues"][$e] == "français"){
            $paysFrancais = 1;
        }
    }
    if($paysFrancais == 0 && $paysAnglais == 1){
        $reponse .= " Japon ";
    }
    $paysAnglais = 0;
    $paysFrancais = 0;
} else if($i==3){
    for($e = 0; $e < count($infosPays[$i]["Suisse"]["langues"]); $e++){
        if($infosPays[$i]["Suisse"]["langues"][$e] == "anglais"){
            $paysAnglais = 1;
        }
        if($infosPays[$i]["Suisse"]["langues"][$e] == "français"){
            $paysFrancais = 1;
        }
    }
    if($paysFrancais == 0 && $paysAnglais == 1){
        $reponse .= " Suisse ";
    }
    $paysAnglais = 0;
    $paysFrancais = 0;
    }
}
echo "Les pays ayant comme langue officiel l'anglais mais pas le français sont : ".$reponse;
?>
<!-- 1.h -->
<?php 
$superficieTotale = 0;
$superficieInferieur = "";
for($i = 0; $i < count($infosPays); $i++){
    if($i==0){
        $superficieTotale += $infosPays[$i]["Belgique"]["superficie"];
    } if($i==1){
        $superficieTotale += $infosPays[$i]["France"]["superficie"];
    } if($i==2){
        $superficieTotale += $infosPays[$i]["Japon"]["superficie"];
    } if($i==3){
        $superficieTotale += $infosPays[$i]["Suisse"]["superficie"];
    }
}

for($i = 0; $i < count($infosPays); $i++){
    if($i==0 && ($superficieTotale/count($infosPays)) > $infosPays[$i]["Belgique"]["superficie"]){
        $superficieInferieur .= " Belgique ";
    } if($i==1 && ($superficieTotale/count($infosPays)) > $infosPays[$i]["France"]["superficie"]){
        $superficieInferieur .= " France ";
    } if($i==2 && ($superficieTotale/count($infosPays)) > $infosPays[$i]["Japon"]["superficie"]){
        $superficieInferieur .= " Japon ";
    } if($i==3 && ($superficieTotale/count($infosPays)) > $infosPays[$i]["Suisse"]["superficie"]){
        $superficieInferieur .= " Suisse ";
    }
}
echo $superficieInferieur;
?>

<!-- 1.i -->

    </body>
</html>