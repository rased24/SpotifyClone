<?php require APPROOT . '/views/includes/head.php'?>

<div class="navbar">
	<?php require APPROOT . '/views/includes/navigation.php'?>
</div>

<div class="container-login">
	<div class="wrapper-login">
		<h2>Sign in</h2>
		<form action="<?= URLROOT?>/users/register" method="post">
			<input type="text" name="username" placeholder="Username*">
			<span class="invalidFeedback">
				<?= $data[ 'usernameError' ]?>
			</span>
			<input type="email" name="email" placeholder="Email*">
			<span class="invalidFeedback">
				<?= $data[ 'emailError' ]?>
			</span>
			<input type="password" name="password" placeholder="Password*">
			<span class="invalidFeedback">
				<?= $data[ 'passwordError' ]?>
			</span>
			<input type="password" name="confirmPassword" placeholder="Confirm Password*">
			<span class="invalidFeedback">
				<?= $data[ 'confirmPasswordError' ]?>
			</span>
			<br>
			<button type="submit" id="submit" name="submit" value="submit">submit</button>
			<p class="options">Already have an account?
				<a href="<?=URLROOT?>/users/login">Sign in!</a></p>
		</form>
	</div>
</div>