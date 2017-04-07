<h1 align="center">FitMint</h1>

<?php require_once 'carousel.php' ;?>

<div class="container marketing">
	<hr class="featurette-divider">
	
	<?php if (empty($postArray)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine Post gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($postArray as $post): ?>

	<div class="row featurette">
<!-- 		<div class="col-xs-7"> -->
		<div class="postect">
			<div class="postLeft">
				<img class="featurette-image img-responsive center-block"
					src=<?php echo htmlspecialchars($post->getBildpfad()); ?>
					alt="Bild konnte nicht geladen werden">
			</div>
						
			<div class="beschreibungRight">
				<h2 class="featurette-heading"><?php echo $post->getTitel(); ?></h2>
				<p class="lead"><?php echo $post->getBeschreibung(); ?></p>
				<h3>Kommentare:</h3>
				
				<?php if(isset ($_SESSION['loggedin'])): ?>
					<form class="form-signin" method="post" action="/user/like">
						<button type="submit" class="btn btn-success" value="like">
							<span class="glyphicon glyphicon-thumbs-up"></span>
						</button>
						<input type="hidden" name="postId" value="<?php echo htmlspecialchars($post->getPostId()); ?>">
					</form>
					<form class="form-signin" method="post" action="/user/dislike">
						<button type="submit" class="btn btn-danger" value="dislike">
							<span class="glyphicon glyphicon-thumbs-down"></span>
						</button>
						<input type="hidden" name="postId" value="<?php echo htmlspecialchars($post->getPostId()); ?>">
					</form>
					<form action="/kommentar/doCreateComment" method="post">
						<textarea placeholder="Kommentar" class="form-control Kommentar"
							rows="5" name="Kommentar" required autofocus></textarea>
						<input type="hidden" name=postId value="<?php echo htmlspecialchars($post->getPostId()); ?>">
						<button type="submit" class="btn btn-info">Senden</button>
					</form>		
				<?php endif;?>
				
				<div>
				<?php if (empty($post->getKommentare())): ?>
					<div class="dhd"><h2 class="item title"></h2></div>
				<?php else: ?>
					<?php foreach ($post->getKommentare() as $kommentar): ?>
						<br>
						<?php 
							echo htmlspecialchars($kommentar->getEmail()) . " " . htmlspecialchars($kommentar->getInhalt()); 
							if (isset($_SESSION['loggedInUserId']) && $kommentar->getBenutzer_id () == $_SESSION ['loggedInUserId']) {
								echo '<a href="/kommentar/doDeleteKommentar?kommentarId=' . $kommentar->getId () . '&benutzerId=' . $kommentar->getBenutzer_id () . '"<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>            			   ';
								echo '<a href="/kommentar/doShowKommentar?kommentarId=' . $kommentar->getId () . '&benutzerId=' . $kommentar->getBenutzer_id () . '"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>   ';
							}
						?> 
						<br>
					<?php endforeach ?>
				<?php endif ?>
				</div>
			</div>
			<img id="seperating-line" src="images/ornament.png" alt="Bild konnte nicht geladen werden.">
		</div>
	</div>
	<?php endforeach ?>
	<?php endif; ?>
	
	
	<!-- Page up Button -->
	<span class="back-to-top"> <a style=”display: inline;” href="home">
		<button type="button" class="btn btn-info">
		<span class="glyphicon glyphicon-menu-up"></span>
		</button></a>
	</span>

</div>
