<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Exercice 4 : Les dates </title>
    </head>

    <body>
    <!-- Ex.1 -->
        <?php
        $today = getdate();
        foreach($today as $key => $value){ ?>
        <p> <?= $key." = ".$value; ?> </p>
        <?php } ?>

    <!-- Ex.2 -->    
<?php
    $noelTime = getdate(mktime(0,0,0, 12,25,2022));

    $jours = ["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi"];
?>
<p> Cette année le jour de noel tombera un <?= $jours[$noelTime["wday"]]; ?></p>

    <!-- Ex.3 -->

    <?php 
    $today = getdate();
    $jourMercrediProchain = "";
    $timeMercrediProchain = "";
    $dateMercrediProchain = "";
 
   
    switch($today["wday"]){
        case 0 :
            $jourMercrediProchain = $today["mday"]+3;
            break;
        
        case 1 :
            $jourMercrediProchain = $today["mday"]+2;
            break;
                
        case 2 :
            $jourMercrediProchain = $today["mday"]+1;
            break;
            
        case 3 :
            $jourMercrediProchain = $today["mday"]+7;
            break;
            
        case 4 :
            $jourMercrediProchain = $today["mday"]+6;
            break;
                            
        case 5 :
            $jourMercrediProchain = $today["mday"]+5;
            break;
                                
        case 6 :
            $jourMercrediProchain = $today["mday"]+4;
            break;    

        default : 
        break;
    } 
    
    $timeMercrediProchain = mktime(0,0,0, $today["mon"],$jourMercrediProchain,$today["year"]);
    $dateMercrediProchain = date("d/m/Y", $timeMercrediProchain);

    ?>
    <p> Mercredi prochain, nous seront le  <?= $dateMercrediProchain; ?> </p>

    <!-- Ex.4 -->
  
<?php  
    $today = getdate();
    $jours = ["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi"];
    $mois = ["","janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];

    ?>
       <p> Ce  <?= $jours[$today["wday"]]; ?>, nous sommes le <?= $today["mday"] . " " .$mois[$today["mon"]]." ". $today["year"]; ?>. </p>

    <!-- Ex.5 -->
    <?php 
    $jourPlus = 15;
    $timeTodayPlus = mktime(0,0,0, 3,(23+$jourPlus),2010);
    $dateTodayPlus = date("d/m/Y", $timeTodayPlus);
    ?>
    <p> Si nous sommes le 23 mars 2010, dans 15 jours nous seront le <?= date("d/m/Y", $timeTodayPlus) ?> </p>

    <!-- Ex.6 -->
    <?php 
    $mois30 = [];
    $mois31 = [];

    for($i = 1; $i <= 12; $i++){
        if(date("t", mktime(0,0,0, $i,1,2022)) == 31){
            array_push($mois31, getdate(mktime(0,0,0, $i,1,2022))["month"]);
        } else if(date("t", mktime(0,0,0, $i,1,2022)) == 30){
            array_push($mois30, getdate(mktime(0,0,0, $i,1,2022))["month"]);
        } else {

        }
    }
    ?>
    <ol>
    <li> Mois de 30 jours     <ul>
        <?php 
        for($i = 0; $i < count($mois30); $i++){ ?>
        <li> <?= $mois30[$i]; ?></li>
       <?php } ?>
    </ul> 
    </li>

    <li> Mois de 31 jours    <ul>
        <?php 
        for($i = 0; $i < count($mois31); $i++){ ?>
        <li> <?= $mois31[$i]; ?></li>
       <?php } ?>
    </ul> 
    </li>
    <li> Cette année le mois de février aura <?= date("t", mktime(0,0,0, 2,1,2022)); ?> jours </li>
    </ol>

    <!-- Ex.7 -->    
    <?php 
    $nbJours = 0;
    $nbJoursProchaine = 0;
    for($i = 1; $i <= 12; $i++){
        $nbJours += intval(date("t", mktime(0,0,0, $i,1,2022)));
        $nbJoursProchaine += intval(date("t", mktime(0,0,0, $i,1,2023)));
    }
    ?>
    <p> Cette année, il y aura <?= $nbJours; ?> jours.</p>
    <p> L'année prochaine, il y aura <?= $nbJoursProchaine ?> jours.</p>

    <!-- Ex.8 -->
    <?php 
    $today = getdate();
    $dateComparer = mktime(0,0,0, 4,24,2022);
    $diffMois = getdate($dateComparer)["mon"]-$today["mon"];
    $joursMoisRestant = intval(date("t",)) - $today["mday"];
    $compteur = 0;
    $ecart = 0;
    if($diffMois > 1){
        for($i=1; $i <=($diffMois-1); $i++){
           $compteur += intval(date("t",mktime(0,0,0, $today["mon"]+$i,1,2022)));
        }
    }
    $ecart = $joursMoisRestant+$compteur+intval(date("d",$dateComparer));

    ?> 
    <p>Le nombre de jours qu'il reste avant la date du <?= date("d/m/Y",$dateComparer) ?>  est de <?= $ecart ?> jours.</p>

    <!-- Ex.9 -->
    <?php 
    $dateInitial = mktime(0,0,0, 2,21,2022);
    $dateFinal = mktime(0,0,0, 2,26,2022);
    $datedifference = getdate($dateFinal)["mday"]-getdate($dateInitial)["mday"];
    ?>
    <p> Il y a <?= $datedifference ?> jours entre le <?= date("d/m/Y", $dateInitial); ?> et le <?= date("d/m/Y", $dateFinal); ?>. </p>

    <!-- Ex.10 -->
    <?php
    $timeNewyork = time() - (60*60*6);
    $heureNewyork = date("H:i:s",$timeNewyork);
    
    ?>
    <p> Il est à <?= $heureNewyork; ?> New York. </p>

    <!-- Ex.11 -->
    <?php
    $Today = getdate(time());
    $saisons = "";

    if($Today["mon"] >= 3 && $Today["mon"] < 6){
        $saisons = "printemps";
    } else if($Today["mon"] >= 6 && $Today["mon"] < 9){
        $saisons = "été";
    } else if($Today["mon"] >= 9 && $Today["mon"] < 12){
        $saisons = "automne";
    } else if($Today["mon"] == 12 || $Today["mon"] < 3){
        $saisons = "hiver";
    }
    ?>
    <p> La saison actuelle : <?= $saisons ?>.</p> 

    <!-- Ex.12 -->
    <?php 
    $nbJours = 0;
    $annee = 2022;
    $bisextile = 0;

    for($e = 0; $e < 1000; $e++){

        for($i = 1; $i <= 12; $i++){
            $nbJours += intval(date("t", mktime(0,0,0, $i,1,$annee-$e)));
         }
    
    $i = 0;

    if($nbJours == 366){
        $bisextile++;
    }

    $nbJours = 0;
    }

    ?>  
    <p> En 1000 ans, il y a eu <?= $bisextile; ?> années bissextiles.</p>

<!-- Ex.13 -->
<?php 
$jours = ["dimanche","lundi","mardi","mercredi","jeudi","samedi","dimanche"];
?>
<p> Cette année la St-Nicolas tombera un <?= $jours[getdate(mktime(0,0,0, 12,6,2022))["wday"]]; ?>.</p>

<!-- Ex.14 -->
<?php
$compteur = 0;
$tab = [];
for($i = 1; $i <= 12; $i++){
    if(getdate(mktime(0,0,0,$i,13,2022))["wday"] == 5){
        array_push($tab, date("d/m/Y", mktime(0,0,0,$i,13,2022)));
        $compteur++;
    }
}
?>

<p>Cette année le nombre de vendredi 13 est de : <?= $compteur ?> </p>
<ul>
<?php for($i = 0; $i < count($tab); $i++){ ?>
<li> Le <?= $tab[$i]; ?> </li>
<?php } ?>
</ul>

<!-- Ex.15 -->
<?php
$compteur = 0;
for($i = 1; $i <= intval(date("t", mktime(0,0,0, 1,1,2022))); $i++){
    if(getdate(mktime(0,0,0, 1,$i,2022))["wday"] == 1){
        $compteur++;
    } 
}
?>
<p> Il y a <?= $compteur; ?> lundi en janvier cette année.<p>

<!-- Ex.16 -->
<?php 
$tab = [];
for($i=1; $i <= 12; $i++){
    if(getdate(mktime(0,0,0, $i,1,2022))["wday"]==1){
        array_push($tab,getdate(mktime(0,0,0, $i,1,2022))["month"]);
    }
}
?>
<p> cette année les mois qui commencent un lundi sont : </p>
<ul>
    <?php
for($i = 0; $i < count($tab); $i++){ ?>
    <li> <?= $tab[$i] ?> </li>
<?php } ?>
</ul>

<!-- Ex.17 -->
<?php
$datePaul = mktime(12,0,0, 2,22,1976);
$dateKeiko = mktime(9,38,0, 5,12,1979);
$differenceAge = (1970-intval(date("Y",$datePaul-$dateKeiko)));
?>
<p> La différence d'âge entre Paul et Keiko est de <?= $differenceAge; ?> ans.  </p>

<!-- Ex.18 -->
<?php 
$arriver = date("H:i:s", mktime(9+3+10+8,5+36+50+10,0));

?>
<p> Vous arriverez à destination à <?= $arriver; ?>.</p>
    </body>
</html>






