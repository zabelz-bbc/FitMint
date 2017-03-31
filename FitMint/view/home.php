<!-- Carousel
    ================================================== -->

<h1 align="center">FitMint</h1>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img class="first-slide" src="/images/FarbverlaufBlau.PNG"
				alt="First slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Wilkommen auf unserer Seite</h1>
					<p>Die neusten Trends im Bereich Sport alle auf einem Blick</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="second-slide" src="/images/MixFarbe.PNG"
				alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Der Frühling steht vor der Tür</h1>
					<p>Die Neusten und trendigsten Kleider für einen fantastischen
						Start in den Frühling.</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="third-slide" src="/images/FarbVerlaufRot.PNG"
				alt="Third slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Viele weitere Funktionen Freischalten</h1>
					<p>Werden Sie Mitglied und schalten Sie neue Funktionen Frei</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="third-slide" src="/images/MixFarbeRot.PNG" alt=Fourth
				slide>
			<div class="container">
				<div class="carousel-caption">
					<h1>Über Uns</h1>
					<p>Eine kurze Geschichte über uns finden sie Hier!</p>
					<p>
						<a class="btn btn-lg btn-primary" href="/home/ueberUns"
							role="button">Über Uns</a>
					</p>
				</div>
			</div>
		</div>

	</div>
	<a class="left carousel-control" href="#myCarousel" role="button"
		data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
		aria-hidden="true"></span> <span class="sr-only">Previous</span>
	</a> <a class="right carousel-control" href="#myCarousel" role="button"
		data-slide="next"> <span class="glyphicon glyphicon-chevron-right"
		aria-hidden="true"></span> <span class="sr-only">Next</span>
	</a>
</div>


<!-- /.carousel -->
<!-- Marketing messaging and featurettes
    ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->



<div class="container marketing">
	<hr class="featurette-divider">

<?php
for($i = 0; $i < count ( $postArray ); $i += 2) :
	$data1 = $postArray [$i]; // Bilder der Home-Seite, welche auf der linken Seite gezeigt werden.
	$data2 = $postArray [$i + 1]; // Bilder der Home-Seite, welche auf der rechten Seite gezeigt werden.
	
	if (($data1 == null) || ($data2 == null)) {
		break;
	}
?>
<?php
for($j = 0; $j < count ( $kommentarArray ); $j += 2) :
	$data3 = $kommentarArray [$j];
	$data4 = $kommentarArray [$j + 1];
	?>
       <!-- START THE FEATURETTES -->
	<!-- <hr class="featurette-divider">-->

	<div class="row featurette">
		<div class="col-xs-7">
			<h2 class="featurette-heading">
    <?php echo $data1->getTitel(); ?> 
                    </h2>
			<p class="lead"><?php echo $data1->getBeschreibung(); ?></p>
			<form class="form-signin" method="post" action="/user/like">
				<button type="submit" class="btn btn-success" value="like">
					<span class="glyphicon glyphicon-thumbs-up"></span>
				</button>
				<input type="hidden" name="postId"
					value="<?php echo $data1->getPostId(); ?>">
			</form>
			<form class="form-signin" method="post" action="/user/dislike">
				<button type="submit" class="btn btn-danger" value="dislike">
					<span class="glyphicon glyphicon-thumbs-down"></span>
				</button>
				<input type="hidden" name="postId"
					value="<?php echo $data1->getPostId(); ?>">
			</form>
			<form action="/kommentar/doCreateComment" method="post">

				<textarea placeholder="Kommentar" class="form-control Kommentar"
					rows="3" name="Kommentar"></textarea>
				<input type="hidden" name=$data1
					value="<?php echo $data1->getPostId(); ?>">
				<button type="submit" class="btn btn-info">Senden</button>
			</form>
			<div>
			<?php for($k = 0; $k < count ( $data3); $k += 1) { 
			        echo $data3[$k]-> getEmail();
			        echo $data3[$k]-> getInhalt();
                  }
             ?>
             </div>
		</div>
		<div class="col-xs-5">
			<img class="featurette-image img-responsive center-block"
				src=<?php echo $data1->getBildpfad(); ?>
				alt="Bild konnte nicht geladen werden">
		</div>
	</div>
	<hr class="featurette-divider">
	<div class="row featurette">
		<div class="col-xs-7 col-xs-push-5">
			<h2 class="featurette-heading">
    <?php echo $data2->getTitel(); ?> 
                    </h2>
			<p class="lead"><?php echo $data2->getBeschreibung();?></p>
			<form class="form-signin" method="post" action="/user/like">
				<button type="submit" class="btn btn-success" value="like">
					<span class="glyphicon glyphicon-thumbs-up"></span>

				</button>
				<input type="hidden" name="postId"
					value="<?php echo $data2->getPostId(); ?>">
			</form>
			<form class="form-signin" method="post" action="/user/dislike">
				<button type="submit" class="btn btn-danger" value="dislike">
					<span class="glyphicon glyphicon-thumbs-down"></span>
				</button>
				<input type="hidden" name="postId"
					value="<?php echo $data2->getPostId(); ?>">
			</form>
			<form action="/kommentar/doCreateComment" method="post">

				<textarea placeholder="Kommentar" class="form-control Kommentar"
					rows="3" name="Kommentar"></textarea>
				<input type="hidden" name="postId"
					value="<?php echo $data2->getPostId(); ?>">
				<button type="submit" class="btn btn-info">Senden</button>
			</form>
			<div>
			<?php for($l = 0; $l < count ( $data4); $l += 1) { 
			        echo $data4[$l]-> getEmail();
			        echo $data4[$l]-> getInhalt();
                  }
             ?>
             </div>
		</div>
		<div class="col-xs-5 col-xs-pull-7">
			<img class="featurette-image img-responsive center-block"
				src=<?php echo $data2->getBildpfad(); ?>
				alt="Bild konnte nicht geladen werden">
		</div>
	</div>
	<hr class="featurette-divider">
<?php endfor; endfor; ?>

       </div>


<!-- Page Up Button
    ================================================== -->

<span class="back-to-top"> <a style=”display: inline;” href="home">
		<button type="button" class="btn btn-info">
			<span class="glyphicon glyphicon-menu-up"></span>
		</button>
</a>
</span>
