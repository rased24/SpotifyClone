<div class="container-login">
	<div class="wrapper-login">
		<div id="thevideo">
			<iframe width="420" height="315" allow="autoplay; encrypted-media" src="https://www.youtube.com/embed/<?= $data[ 'yt_id' ] ?>?autoplay=1&enablejsapi=1"></iframe>
		</div>
		<div class="song-container">
			<div>
				<button type="button" class="btn btn-login" onclick="controlVideo('playVideo');">Play Video</button>
			</div>
			<div>
				<button type="button" class="btn btn-login" onclick="controlVideo('stopVideo');">Stop Video</button>
			</div>
			<div>
				<button type="button" class="btn btn-login" onclick="controlVideo('pauseVideo');">Pause Video</button>
			</div>
			<div>
				<button type="button" class="btn btn-login" onclick="controlVideo( 'mute' );">Mute</button>
			</div>
			<div>
				<button type="button" class="btn btn-login" onclick="controlVideo( 'unMute' );">Unmute</button>
			</div>
		</div>

	</div>
</div>

<script src="<?= URLROOT ?>/public/js/play.js"></script>
