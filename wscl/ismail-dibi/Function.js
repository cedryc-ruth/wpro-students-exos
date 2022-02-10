/**
 * @function diffAge
 * Calcule la différence entre deux ages 
 *
 * @return {Number} renvoie la différence
 */
function diffAge(age1,age2){
	let difference;
	if(age1>age2){
		difference = age1-age2 ;
		
		
	}else {
		difference =age2-age1;
	}
	return difference;
}
/**
 * @function nomLong
 * Vérifie si le nom contient au moins 3 caractères
 *
 * @return {Boolean} renvoie si le nom est long ou non
 */
function nomLong(nom){
	return nom.length>=3;
}
/**
 * @function motDePass
 * Vérifie si le mot de pass contient au moins 6 caractères , 1 chiffre et 2 Majuscules 
 *
 * throw Error si le mot de pass ne contient pas au moins 6 caractères , 1 chiffre et 2 Majuscules 
 */
 function motDePass(mdp){
	 let compteChiffre = 0 ;
	 let compteMajuscule = 0 ;
	 if(mdp.length>=6){
		 for (i=0;i<mdp.length-1;i++){
			if(!isNaN(mdp.charAt(i))){
				compteChiffre+= ;
			}
			if(mdp.charAt(i)==toUpperCase(mdp.charAt(i)){
				compteMajuscule+= ;
			}	
		 }
	 }else{
		 throw ' mot de passe pas assez long' ;
	 }
	 if (compteChiffre < 1){
		 throw ' le mot de passe ne contient pas de chiffre';
	 }
	 if (compteMajuscule < 2){
		 throw ' le mode de passe contient moins de 2 Majuscules';
	 }
 }
 /**
 * @function motDePass
 * Fonction qui vérifie si un identifiant est valide
 *
 * throw Error si  plus ou moins que 2 chiffres
 */

 function identifiant (id) {
	 
	let compteChiffre = 0;
	
	for (i=0;i<id.length-1;i++){
		if(!isNaN(id.charAt(i))){
				compteChiffre+= ;
			}
	}
	if(compteChiffre>2){
		
		throw ' votre identifiant contient plus de 2 chiffres';
		
	}
	if(compteChiffre>2){
		
		throw ' votre identifiant contient moins de 2 chiffres';
			
	}		
 }
 
 /**
 * @function roundUp
 * Fonction qui arrondit le premier paramètre au premier multiple entier commun avec le deuxième paramètre.
 * @return NaN si un ou les deux paramètres entrer ne son pas des nombres
 * throw Error si le 2e paramètre n'est pas un entier
 * @return multiple commun si aucune erreur 
 */
 
 function roundUp(réel,entier){
	 
	 let multiple = entier ;
	 
	 if(isNaN(réel) || isNaN(entier) ){
		 return NaN ;
	 }if(entier%1 != 0){
		 throw Error ;
	 }
	 
	 while(multiple%parseInt(réel)!=0){
		 
		multiple = multiple + entier ; 
		 
	 }
	 
	 
	 
	 return multiple ;
 }
 
 try {
	roundUp('bob',25);
	console.log(false);
 }catch(e){
	console.log(true);
 }
 try {
	roundUp(2.5,5);
	console.log(true);
} catch(e) {
	console.log(false);
}

try {
	roundUp(10,4.5);
	console.log(false);
} catch(e) {
	console.log(true);
}