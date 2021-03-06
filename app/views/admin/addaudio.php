<div class="container-login">
	<div class="wrapper-audio">
		<form action="<?= URLROOT ?>/admin/addaudio" method="post">
			<div id="image-container">
				<img src="" id="thumbnailImg" class="" alt="">
			</div>
			<input type="url" id="videoUrl" name="url" class="audio-input" placeholder="add url here">
			<span class="invalidFeedback" id="message">
				<?= $data[ 'urlError' ] ?>
			</span>
			<input type="text" id="videoTitle" name="title" value="" placeholder="video title">
			<span class="invalidFeedback" id="message">
				<?= $data[ 'titleError' ] ?>
			</span>
			<input type="text" id="videoAlbum" name="album" value="" placeholder="video album">
			<span class="invalidFeedback" id="message">
				<?= $data[ 'albumError' ] ?>
			</span>
			<br>
			<input type="hidden" id="thumbnail" name="thumbnail" value="">
			<button type="button" id="checkData" name="checkData" value="checkData">Check Data</button>
			<button type="submit" id="submit" name="submit" value="submit">Submit</button>
		</form>
	</div>
</div>

<script src="<?= URLROOT ?>/public/js/addaudio.js"></script>