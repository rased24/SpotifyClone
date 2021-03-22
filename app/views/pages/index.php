		<?php require APPROOT . '/views/includes/head.php'?>

		<div id="section-landing">
			<?php require APPROOT . '/views/includes/navigation.php'?>
			<div class="wrapper-landing">
				<form action="<?=URLROOT?>/pages/play" method="get" id="playAudio">
					<div class="song-container">
						<div class="new-songs">
							<button  type="button" class="btn btn-success" id="newSongsButton">New Songs</button>
							<ul id="newSongs" class="list-group list-group-flush hidden">
								<?php $audios = array_reverse( $data[ 'audios' ] )?>
								<?php for( $i = 0; $i < 10; $i++ ):?>

									<?php if ( isset( $audios[ $i ] ) ):?>
										<li class="list-group-item">
											<input type="radio" name="yt_id" value="<?= $audios[ $i ]->yt_id?>">
											<?= $audios[ $i ]->title?><br>
										</li>
									<?php endif;?>
								<?php endfor;?>
							</ul>
						</div>

						<div class="most-viewed-songs">
							<button  type="button" class="btn btn-success" id="mostViewedSongsButton">Most Viewed Songs</button>
							<ul id="mostViewedSongs" class="list-group list-group-flush hidden">
								<?php for( $i = 0; $i < 10; $i++ ):?>

									<?php if ( isset( $audios[ $i ] ) ):?>

										<li class="list-group-item">
											<input type="radio" name="yt_id" value="<?= $audios[ $i ]->yt_id?>">
											<?= $audios[ $i ]->title?><br>
										</li>
									<?php endif;?>
								<?php endfor;?>
							</ul>
						</div>

						<div class="random-songs">
							<button  type="button" class="btn btn-success" id="randomSongsButton">Random Songs</button>
							<ul id="randomSongs" class="list-group list-group-flush hidden">
								<?php shuffle( $audios  ) ?>
								<?php for( $i = 0; $i < 10; $i++ ):?>

									<?php if ( isset( $audios[ $i ] ) ):?>
										<li class="list-group-item">
											<input type="radio" name="yt_id" value="<?= $audios[ $i ]->yt_id?>">
											<?= $audios[ $i ]->title?><br>
										</li>
									<?php endif;?>
								<?php endfor;?>
							</ul>
						</div>

					</div>
				</form>
			</div>
		</div>

		<script src="<?=URLROOT?>/public/js/index.js"></script>

		<?php require  APPROOT . '/views/includes/foot.php'?>