<div id="section-landing">
	<div class="wrapper-landing">
			<div class="song-container">
				<div class="new-songs">
					<button type="button" class="btn btn-success" id="newSongsButton">New Songs</button>
					<ul id="newSongs" class="list-group list-group-flush hidden">
						<?php $audios = array_reverse( Store::audios() ) ?>
						<?php for ( $i = 0; $i < 10; $i++ ): ?><?php if ( isset( $audios[ $i ] ) ): ?>
							<a class="list-group-item list-group-item-action" href="<?=URLROOT?>/pages/play?yt_id=<?=$audios[ $i ]->yt_id?>">
								<?= $audios[ $i ]->title ?>
							</a>
						<?php endif; ?><?php endfor; ?>
					</ul>
				</div>
				<div class="most-viewed-songs">
					<button type="button" class="btn btn-success" id="mostViewedSongsButton">Most Viewed Songs</button>
					<ul id="mostViewedSongs" class="list-group list-group-flush hidden">
						<?php for ( $i = 0; $i < 10; $i++ ): ?><?php if ( isset( $audios[ $i ] ) ): ?>
							<a id="list-audio" class="list-group-item list-group-item-action" href="<?=URLROOT?>/pages/play?yt_id=<?=$audios[ $i ]->yt_id?>">
								<?= $audios[ $i ]->title ?>
							</a>
						<?php endif; ?><?php endfor; ?>
					</ul>
				</div>
				<div class="random-songs">
					<button type="button" class="btn btn-success" id="randomSongsButton">Random Songs</button>
					<ul id="randomSongs" class="list-group list-group-flush hidden">
						<?php shuffle( $audios ) ?>
						<?php for ( $i = 0; $i < 10; $i++ ): ?><?php if ( isset( $audios[ $i ] ) ): ?>
							<a id="list-audio" class="list-group-item list-group-item-action" href="<?=URLROOT?>/pages/play?yt_id=<?=$audios[ $i ]->yt_id?>">
								<?= $audios[ $i ]->title ?>
							</a>
						<?php endif; ?><?php endfor; ?>
					</ul>
				</div>
			</div>
	</div>
</div>

<script src="<?= URLROOT ?>/public/js/index.js"></script>

<?php require APPROOT . '/views/includes/foot.php' ?>