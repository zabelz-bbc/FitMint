<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $title ?> | FitMint</title>

<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
	crossorigin="anonymous">

<link href="/css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora"
	rel="stylesheet">

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/logout-popup.js"></script>
<script src="../js/pleaseLogin.js"></script>

</head>
<body>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
		</div>
			
			
			<?php if(isset ($_SESSION['loggedin'])): /* Nach dem if wird die Navigation gezeigt, bei endif hört es auf.*/?>
				<div class="navbar-wrapper">
			<div class="container">

				<nav class="navbar navbar-inverse navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed"
								data-toggle="collapse" data-target="#navbar"
								aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span> <span
									class="icon-bar"></span> <span class="icon-bar"></span> <span
									class="icon-bar"></span>
							</button>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="/home"
									<?php
				
				if (strcmp ( 'home', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?>>Home</a></li>

								<li><a href="/user/logout" onclick="confirmLogout()"> <?php
				
				if (strcmp ( 'logout', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?> Logout</a></li>

								<li><a href="/home/ueberUns"
									<?php
				
				if (strcmp ( 'ueberUns', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?>>Über Uns</a></li>

								<li><a href="/user/einstellungen"
									<?php
				
				if (strcmp ( 'einstellungen', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?>><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
				
				
			<?php else:?>
				<div class="navbar-wrapper">
			<div class="container">

				<nav class="navbar navbar-inverse navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed"
								data-toggle="collapse" data-target="#navbar"
								aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span> <span
									class="icon-bar"></span> <span class="icon-bar"></span> <span
									class="icon-bar"></span>
							</button>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="/home"
									<?php
				
				if (strcmp ( 'home', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?>>Home</a></li>

								<li><a href="/user/login"
									<?php
				
				if (strcmp ( 'login', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?>>Login</a></li>

								<li><a href="/home/ueberUns"
									<?php
				
				if (strcmp ( 'ueberUns', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?>>Über Uns</a></li>

								<li><a href="/user/einstellungen"
									<?php
				
				if (strcmp ( 'einstellungen', $active ) == 0) {
					echo 'class = \'active-page\'';
				}
				?>><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
			<?php endif;?>
			</div>
	<div class="container"></div>