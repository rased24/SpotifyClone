
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Sign up to Spotify Clone</title>



		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<!-- Custom styles for this template -->
		<link href="css/login.css" rel="stylesheet">
	</head>

	<body class="text-center">
		<form class="form-signin" action="" method="post">
			<h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
			<label for="inputUsername" class="sr-only">Username</label>
			<input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" pattern="[A-Za-z0-9\-_\.]{6,20}" required>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword"  name="password" class="form-control" placeholder="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}$" required>
			<label for="inputPassword2" class="sr-only">Rewrite Password</label>
			<input type="password" id="inputPassword2"  name="confirm-password" class="form-control" placeholder="Confirm Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
			<br>
			Already have an account?<a href="..\..\	index.php">Sign in</a>
		</form>
	</body>
</html>