
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Log in to Spotify Clone</title>



		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<!-- Custom styles for this template -->
		<link href="app/views/css/login.css" rel="stylesheet">
	</head>

	<body class="text-center">
		<form class="form-signin" action="" method="post">
			<h1 class="h3 mb-3 font-weight-normal">Log in </h1>
			<label for="inputUsername" class="sr-only">Username or Email address</label>
			<input type="text" id="inputUsername" name="username" class="form-control" placeholder="username or email" required>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword"  name="password" class="form-control" placeholder="password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
			<br>
			Don't have an account? <a href="app/views/signup.php">Sign up</a>
		</form>
	</body>
</html>