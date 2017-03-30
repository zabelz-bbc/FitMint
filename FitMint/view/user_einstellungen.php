<h1>Einstellungen</h1>
<form class="form-signin-einstellungen" method="post"
	action="/user/changePassword">
	<h2 class="form-signin-heading">Passwort ändern</h2>
	<label for="inputPassword" class="sr-only">Password</label> <input
		type="password" id="inputPassword" class="form-control"
		placeholder="altes Passwort" required autofocus> <label
		for="inputPassword" class="sr-only">Password</label> <input
		type="password" id="inputPassword" class="form-control"
		placeholder="neues Passwort" required> <input type="password"
		id="inputPassword" class="form-control"
		placeholder="Passwort bestätigen" required>
	<div class="checkbox"></div>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Passwort
		ändern</button>
</form>




<div
	style="text-align: center; width: 404px; height: 340px; margin-top: 100px; margin-bottom: 24px; margin-left: auto; margin-right: auto">
	<p id="color01" style="margin: 2px"></p>
	<p style="margin: 2px">
		<a id="color02" href="http://www.seo-welten.de/" target="_blank"
			style="text-decoration: none; font-size: 80%; color: #654d1f"></a>
	</p>
	<script type="text/javascript"><!--
var fcborder = "ffffff";
var fcolorbg = "f1edda";

	<script type="text/javascript"
		src="http://www.seo-welten.de/tools/color/userinpalette.js"></script>
</div>




<form action="" method="post" id="form-change-comment">
	<?php
	require_once '../repository/KommentarRepository.php';
	$kommentarRepository = new KommentarRepository ();
	$kommentar = $kommentarRepository->selectComment ( $this->postId );
	?>
	<div>
		<p>Hier können sie ihre geschriebenen Kommtenare ändern.</p>
		<p>$kommentar</p>
		<textarea rows="5" cols="40" placeholder="changed Comment"></textarea>
		<button type="submit" class="btn btn-info">Kommentar speichern</button>

	</div>

</form>