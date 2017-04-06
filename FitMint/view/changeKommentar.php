
<h1>Kommentar ändern</h1>
<?php 

echo $kommentarInhalt;
?>

<form action="/kommentar/doUpdateKommentar" method="post">
	<textarea placeholder="Kommentar ändern" class="form-control Kommentar"
		rows="5" name="Kommentar" required autofocus></textarea>
	<input type="hidden" name=commentId>
	<button type="submit" class="btn btn-info">Kommentar speichern</button>
</form>


