<?php require APPROOT . '/views/includes/head.php' ?>

<div class="navbar">
	<?php require APPROOT . '/views/includes/navigation.php' ?>
</div>

<div class="container-login">
	<div class="wrapper-login">
		<div id="thevideo">
			<iframe width="420" height="315" allow="autoplay; encrypted-media" src="https://www.youtube.com/embed/<?= $data[ 'yt_id' ] ?>"></iframe>
		</div>
		<div>
			<a href="#" onClick="controlVideo('playVideo');">Play Video</a>
		</div>
		<div>
			<a href="#" onClick="controlVideo('stopVideo');">Stop Video</a>
		</div>
		<div>
			<a href="#" onClick="controlVideo('pauseVideo');">Pause Video</a>
		</div>

	</div>
</div>


<script src="<?= URLROOT ?>/public/js/play.js"></script>
