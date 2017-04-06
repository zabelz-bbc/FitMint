
<div class="container">

	<h1>Anmelden</h1>
	<form class="form-signin" method="post" action="/user/loginToAccount">
		<h2 class="form-signin-heading">Login</h2>
		<label for="inputEmail" class="sr-only">Email address</label> <input
			type="email" id="inputEmail" name="email" class="form-control"
			placeholder="Email Addresse" required autofocus> <label
			for="inputPassword" class="sr-only">Password</label> <input
			type="password" id="inputPassword" name="password"
			class="form-control" placeholder="Passwort" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Einloggen</button>
		<?php
		
if (isset ( $_GET ['error'] )) {
			echo $_GET ['error'];
		}
		?>
	</form>


	<form class="form-signin1" action="/user/doCreateUser" method="post">
		<h2 class="form-signin-heading">Registrieren</h2>
		<label for="inputEmail" class="sr-only">Email address</label> <input
			name="email" type="email" id="inputEmail" class="form-control"
			placeholder="Email Addresse" required autofocus> <label
			for="inputPassword" class="sr-only">Password</label> <input
			name="password" type="password" id="inputPassword"
			class="form-control" placeholder="Passwort" required> <label
			for="inputPassword" class="sr-only">Password</label> <input
			name="repeatpassword" type="password" id="inputPassword"
			class="form-control" placeholder="Passwort bestätigen" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Registeren</button>
		
		
		<?php
		
if (isset ( $_GET ['errorRegister'] )) {
			echo $_GET ['errorRegister'];
		}
		?>
	</form>

</div>
