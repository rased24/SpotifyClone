<div class="navbar" id="navbar">
	<nav class="top-nav">
		<ul>
			<li>
				<a href="<?= URLROOT ?>">Home</a>
			</li>
			<li>
				<a href="<?= URLROOT ?>/pages/about">About</a>
			</li>
			<?php if ( isset( $data[ 'user' ]->is_admin ) && $data[ 'user' ]->is_admin == '1' ): ?>
				<li>
					<a href="<?= URLROOT ?>/admin/addaudio">Add Music</a>
				</li>
			<?php elseif ( isset( $data[ 'user' ]->is_admin ) && $data[ 'user' ]->is_admin == '0' ): ?>
				<li>
					<a href="<?= URLROOT ?>/admin/playlist">Playlist</a>
				</li>
			<?php endif; ?>

			<li>
				<?php if ( isset( $data[ 'user' ]->ID ) ): ?>
					<a href="<?= URLROOT ?>/users/logout" class="btn-login">Log out</a>
				<?php else: ?>
					<a href="<?= URLROOT ?>/users/login" class="btn-login">Log in</a>
				<?php endif; ?>
			</li>
		</ul>
	</nav>
</div>