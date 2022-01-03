
<?php
//date_default_timezone_set("Europe/Brussels");

$nom = "Pirottin";
$prenom = "Amandine";
$age = 30;
$birthday = mktime(0,0,0,3,5,1991);

echo date("d/m/Y",$birthday);

echo 	"<p>Je m'appelle <strong>".htmlentities($prenom)." 
		".htmlentities($nom)."</strong> et j'ai $age ans.</p>";

echo "<p>Le ".date("d/m/",$birthday)
		.(date("Y")+1).", j'aurais <strong>"
		.($age+1)." ans</strong>!</p>";

if($age<18) {
	echo '<p style="color:red">Je suis mineure!</p>';
} else {
	echo "<p style=\"color:green\">Je suis majeure!</p>";
}
?>


