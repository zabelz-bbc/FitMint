function confirmLogout() {
    var x;
    if (alert("Sie loggen sich aus") == true) {
    	header('Location: /home');
    } else {
    	logout();
    	header ( 'Location: /home' );
    }
    document.getElementById("demo").innerHTML = x;
}
