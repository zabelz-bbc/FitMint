function loginFalure() {
    var x;
    if (alert("Es existiert kein Benutzer mit den angegebenen Daten. Bitte überprüfen sie ihre Eingaben, oder registrieren sie sich zuerst.") == true) {
    	header('Location: /login');
    } else {
    	logout();
    	header ( 'Location: /login' );
    }
    document.getElementById("demo").innerHTML = x;
}
