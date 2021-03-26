<div class="container-login">
	<div class="wrapper-login">
		<span class="invalidFeedback center" id="message">
			<?php if ( isset( $data[ 'errorMessage' ] ) ): ?>
				<?= empty( $data[ 'errorMessage' ] ) ? $data[ 'successMessage' ] : $data[ 'errorMessage' ]?>
			<?php endif;?>
		</span>
		<input type="hidden" id="root" value="<?= URLROOT ?>/playlists/add">
		<div class="container-login">
			<div class="wrapper-login">
				<?php if ( isset( Store::user()->is_admin ) ):?>
					<label for="playlist_id"></label>
					<select id="playlist_id" name="playlist_id" class="form-select">
						<?php foreach ( Store::playlists() as $playlist ): ?>
							<option value="<?= $playlist->playlist_id ?>"><?= $playlist->title ?></option>
						<?php endforeach; ?>
					</select>
				<?php endif;?>
				<br>
				<div class="list-group" id="list-tab">
					<?php foreach ( Store::audios() as $audio ): ?>
						<div>
							<?php if ( isset( Store::user()->is_admin ) ):?>
								<a id="addToPlaylist" class="btn btn-primary" name="<?= $audio->yt_id ?>" href="">Add</a>
							<?php endif;?>
							<a class="list-group-item list-group-item-action" href="<?= URLROOT ?>/pages/play?yt_id=<?= $audio->yt_id ?>"><?= $audio->title ?></a>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
	</div>
</div>

<script src="<?= URLROOT ?>/public/js/allaudios.js"></script>