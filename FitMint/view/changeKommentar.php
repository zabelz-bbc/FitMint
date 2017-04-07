<h1>Kommentar ändern</h1>
<?php
echo htmlspecialchars ( $kommentarInhalt );
?>
<div class=KommentareÄndern>
	<form action="/kommentar/doUpdateKommentar" method="post">
		<textarea placeholder="Kommentar ändern"
			class="form-control Kommentar" rows="5" name="inhalt" required
			autofocus></textarea>
		<input type="hidden" name=id value=<?= $id ?>>
		<button type="submit" class="btn btn-info">Kommentar speichern</button>
	</form>

	<form action="/" id="changeKommentar-inline">
		<button type="submit" class="btn btn-info">abbrechen</button>
	</form>
</div>