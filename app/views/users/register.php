<div class="container-login">
	<div class="wrapper-login">
		<h2>Sign in</h2>
		<form action="<?= URLROOT ?>/users/register" method="post">
			<input type="text" name="username" placeholder="Username*">
			<span class="invalidFeedback" id="message">
				<?= $data[ 'usernameError' ] ?>
			</span>
			<input type="email" name="email" placeholder="Email*">
			<span class="invalidFeedback" id="message">
				<?= $data[ 'emailError' ] ?>
			</span>
			<input type="password" name="password" placeholder="Password*">
			<span class="invalidFeedback" id="message">
				<?= $data[ 'passwordError' ] ?>
			</span>
			<input type="password" name="confirmPassword" placeholder="Confirm Password*">
			<span class="invalidFeedback" id="message">
				<?= $data[ 'confirmPasswordError' ] ?>
			</span>
			<br>
			<button type="submit" id="submit" name="submit" value="submit">submit</button>
			<p class="options">Already have an account?
				<a href="<?= URLROOT ?>/users/login">Sign in!</a>
			</p>
		</form>
	</div>
</div>

<script src="<?=URLROOT?>/public/js/createplaylist.js"></script>