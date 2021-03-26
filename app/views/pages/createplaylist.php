<div class="container-login">
	<div class="wrapper-login">
		<h2>Create playlist</h2>
		<br>
		<form action="<?= URLROOT ?>/playlists/createplaylist" method="post">
			<input type="text" name="title" placeholder="Playlist name*">
			<span class="invalidFeedback" id="message">
				<?= isset( $data[ 'errorMessage' ] ) ? $data[ 'errorMessage' ] : '' ?>
			</span>
			<br>
			<button type="submit" id="submit" name="submit" value="submit">submit</button>
		</form>
	</div>
</div>

<script src="<?=URLROOT?>/public/js/createplaylist.js"></script>