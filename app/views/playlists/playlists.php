<div class="container-login">
	<div class="wrapper-login">
		<div class="list-group">
			<input type="text" id="root" value="<?= URLROOT ?>" hidden>
			<span class="invalidFeedback" id="message">
				<?= isset( $data[ 'message' ] ) ? $data[ 'message' ] : '' ?>
			</span>
			<button type="button" class="list-group-item list-group-item-action active">Your Playlists</button>
			<div id="list-tab">
				<?php foreach ( Store::playlists() as $audio ): ?>
					<div>
						<a id="editPlaylist" class="btn btn-warning" name="<?= $audio->playlist_id ?>" href="">Edit</a>
						<a id="removePlaylist" class="btn btn-danger" name="<?= $audio->playlist_id ?>" href="">Remove</a>
						<a id="myPlaylist" class="list-group-item list-group-item-action" name="<?= $audio->playlist_id ?>" href=""><?= $audio->title ?></a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<script src="<?= URLROOT ?>/public/js/playlists.js"></script>