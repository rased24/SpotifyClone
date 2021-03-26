<div class="container-login">
	<div class="wrapper-login">
		<div class="list-group">
			<input type="text" id="root" value="<?= URLROOT ?>/playlists/remove?playlist_id=<?=$data[ 'playlist_id' ]?>" hidden>
			<button type="button" class="list-group-item list-group-item-action active">Your Musics in <?= $data[ 'playlist_name' ] ?></button>
			<span class="invalidFeedback center" id="message">
					<?php if ( isset( $data[ 'message' ] ) ): ?>
						<?= ! empty( $data[ 'message' ] ) ? $data[ 'message' ] : '' ?><?php endif; ?>
				</span>
			<div id="list-tab">

				<?php foreach ( $data[ 'playlist' ] as $audio ): ?>
					<div>
						<?php if ( isset( Store::user()->is_admin ) ): ?>
							<a id="removeFromPlaylist" class="btn btn-danger" name="<?= $audio->yt_id ?>" href="">Remove</a>
						<?php endif; ?>
						<a class="list-group-item list-group-item-action" href="<?= URLROOT ?>/pages/play?yt_id=<?= $audio->yt_id ?>"><?= $audio->title ?></a>
					</div>
				<?php endforeach; ?>

			</div>

		</div>
	</div>
</div>

<script src="<?= URLROOT ?>/public/js/playlist.js"></script>