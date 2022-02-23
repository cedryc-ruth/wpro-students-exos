<?php
$texte ="";

if(!empty($_GET['texte'])){
	$texte = $_GET['texte'];
} else if($_GET['op']){
	$op = $_GET['op'];
}

?>
<!doctype html>
<html lang ="fr">
<meta charset ="utf-8">
<title>Question de style</title>
<link rel="stylesheet" href="style.css" type="text/css">
<head>
<body>
<script>
/**
 * Le script PHP styleur.php présente un texte précédé 
 * des liens gras, italique, souligné, rouge et noir. 
 * Adaptez le style du texte en fonction du lien cliqué 
 * par l'internaute. 
 * Attention, chaque style doit s'ajouter aux styles 
 * précédemment affectés sauf s'il a déjà été attribué, 
 * auquel cas il devra être retiré.
 * Texte	=> G => Texte	=> S => Texte => G => Texte => I =>
 * Texte => S => Texte => I => Texte
 *  G	GS	S	SI	I
 * 
 * @author L.Latifa
 * @version 1.0
 */
</script>
<main>
	<div id="col1">
		<p><a href ="styleur.php?texte=grasRouge"><span class="style1">Texte => G</a></p>
		<p><a href ="styleur.php?texte=grasSouligneRouge"><span class="style2">Texte => GS</a></p>
		<p><a href ="styleur.php?texte=souligneRouge"><span class="style3">Texte => S</a></p>
		<p><a href ="styleur.php?texte=souligneItaliqueRouge"><span class="style4">Texte => SI</a></p>
		<p><a href ="styleur.php?texte=italiqueRouge"><span class="style5">Texte => I</a></p>
	</div>	

	<div id="col2">
		<p><a href ="styleur.php?texte=grasNoir"><span class="style6">Texte => G</a></p>
		<p><a href ="styleur.php?texte=grasSouligneNoir"><span class="style7">Texte => GS</a></p>
		<p><a href ="styleur.php?texte=souligneNoir"><span class="style8">Texte => S</a></p>
		<p><a href ="styleur.php?texte=souligneItaliqueNoir"><span class="style9">Texte => SI</a></p>
		<p><a href ="styleur.php?texte=italiqueNoir"><span class="style10">Texte => I</a></p>
	</div>	

	<?php
	if($texte == ('grasNoir')){ ?>
		<p><span class="style6">Le texte sera affiche en gras noir</span></p>
	<?php } else if($texte == ('grasSouligneNoir')){ ?>
		<p><span class="style7">Le texte sera affiche en gras souligné noir </span></p>
	<?php } else if ($texte == ('souligneNoir')){ ?>
		<p><span class="style8">Le texte sera affiche en souligné noir</span></p>
	<?php } else if($texte == ('souligneItaliqueNoir')){ ?>
		<p><span class="style9">Le texte sera affiche en souligné italique noir</span></p>
	<?php } else if($texte == ('italiqueNoir')){ ?>
		<p><span class="style10">Le texte sera affiche en italique noir</span></p>
	<?php } else if($texte == ('grasRouge')){ ?>
		<p><span class="style1">Le texte sera affiche en gras rouge</span></p>
	<?php } else if($texte == ('grasSouligneRouge')){ ?>
		<p><span class="style2">Le texte sera affiche en gras souligné rouge </span></p>
	<?php } else if ($texte == ('souligneRouge')){ ?>
		<p><span class="style3">Le texte sera affiche en souligné rouge</span></p>
	<?php } else if($texte == ('souligneItaliqueRouge')){ ?>
		<p><span class="style4">Le texte sera affiche en souligné italique rouge</span></p>
	<?php } else if($texte == ('italiqueRouge')){ ?>
		<p><span class="style5">Le texte sera affiche en italique rouge</span></p>
	<?php } ?>

	<?php
	/*
	switch($op){
		case 'grasRouge':
			$grasRouge = ......
			break;	
		case 'grasSouligneRouge':
			$grasSouligneRouge = ......
			break;
		case 'souligneRouge':
			$souligneRouge = ......
			break;
		case 'souligneItaliqueRouge':
			$souligneItaliqueRouge = ......
			break;
		case 'italiqueRouge':
			$italiqueRouge = ......
			break;
		case 'grasNoir':
			$grasNoir = ......
			break;	
		case 'grasSouligneNoir':
			$grasSouligneNoir = ......
			break;
		case 'souligneNoir':
			$souligneNoir = ......
			break;
		case 'souligneItaliqueNoir':
			$souligneItaliqueNoir = ......
			break;
		case 'italiqueNoir':
			$italiqueNoir = ......
			break;			
	}
	*/
	?>

</main>	
</body>	
</head>
