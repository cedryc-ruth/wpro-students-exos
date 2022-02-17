function procrastiner(){
   let cookie =  getCookie('email');
   let expiryDate = new Date(getCookie('expiry'));
   let newExpiryDate = new Date(expiryDate.setDate(expiryDate.getDate()+1));
   document.cookie="email=" + cookie + "; expires=" + newExpiryDate+";";
   document.cookie="expiry=" + newExpiryDate + ";";
}

function getCookie(cookieName) {	//si cookieName vaut 'statut'
    if(cookieName!='') {
        var allCookies = decodeURIComponent(document.cookie);
        var tab = allCookies.split(cookieName+'='); //['nom=Dutour; age=17; ']['admin; choix=3']
        if(tab.length>1) {
            var limite = tab[1].indexOf(';');
            if(limite!=-1) {
                return tab[1].substring(0,limite);		 //'admin'
            } else {
                return tab[1].substring(0);
            }
        }
    }
    return false;
}

