<script>
function confirmLogout() {
    var x;
    if (confirm("Wollen sie sich wirklich ausloggen?") == true) {
    	logout();
    } else {
    	header ( 'Location: /home' );
    }
    document.getElementById("demo").innerHTML = x;
}

</script>