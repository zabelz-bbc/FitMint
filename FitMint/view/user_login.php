
<div class="container">

	<h1>Anmelden</h1>
	<form class="form-signin" method="post" action="/user/loginToAccount">
		<h2 class="form-signin-heading">Login</h2>
		<label for="inputEmail" class="sr-only">Email address</label> <input
			type="email" id="inputEmail" name="email" class="form-control"
			placeholder="Email address" required autofocus> <label
			for="inputPassword" class="sr-only">Password</label> <input
			type="password" id="inputPassword" name="password"
			class="form-control" placeholder="Password" required>

		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>


	<form class="form-signin1" action="/user/doCreateUser" method="post">
		<h2 class="form-signin-heading">Registrieren</h2>
		<label for="inputEmail" class="sr-only">Email address</label> <input
			name="email" type="email" id="inputEmail" class="form-control"
			placeholder="Email address" required autofocus> <label
			for="inputPassword" class="sr-only">Password</label> <input
			name="password" type="password" id="inputPassword"
			class="form-control" placeholder="Password" required> <label
			for="inputPassword" class="sr-only">Password</label> <input
			name="password" type="password" id="inputPassword"
			class="form-control" placeholder="Password bestätigen" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
	</form>

</div>
