<div class="container-login">
	<div class="wrapper-login">
		<h2>Sign in</h2>
		<form action="<?= URLROOT ?>/users/login" method="post">
			<input type="text" name="username" placeholder="Username*">
			<span class="invalidFeedback">
				<?= $data[ 'usernameError' ] ?>
			</span>
			<input type="password" name="password" placeholder="Password*">
			<span class="invalidFeedback">
				<?= $data[ 'passwordError' ] ?>
			</span>
			<br>
			<button type="submit" id="submit" name="submit" value="submit">submit</button>
			<p class="options">Not registered yet?
				<a href="<?= URLROOT ?>/users/register">Create an account!</a>
			</p>
		</form>
	</div>
</div>