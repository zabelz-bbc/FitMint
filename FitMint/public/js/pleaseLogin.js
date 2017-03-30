function remindToLogin() {
    var x;
    if (alert("Bitte melden sie sich zuerst an.") == true) {
    	header('Location: /home');
    } else {
    	header ( 'Location: /home' );
    }
    document.getElementById("demo").innerHTML = x;
}
