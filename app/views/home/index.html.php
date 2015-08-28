<section id="content">
	<div class="featured-post border bb">
		<div class="row">
			<div class="column small-12 medium-7">
				<a href="<?=PUBLICPATH.$data['article'][0]['LINK']?>">
					<div class="responsive-image">
						<img src="<?=MEDIAPATH.$data['article'][0]['IMG']?>" alt="<?=$data['article'][0]['TITLE']?>" />
					</div>
				</a>
			</div>
			<div class="hide-for-small column small-4 medium-5 text-center">
				<a href="<?=PUBLICPATH.$data['article'][0]['LINK']?>"><h3 class=""><?=$data['article'][0]['TITLE']?></h3></a>
				<p><?=$data['article'][0]['DES']?></p>
			</div>
		</div>	
	</div>
	<div class="second-post">
		<div class="row" data-equalizer="second-post">
			<div class="column medium-8 small-12 border br" data-equalizer-watch="second-post">
				<h3>Articles</h3>
				<ul class="nostyle-list">
					<?php 
					for ( $i = 1; $i<3; $i++ ) {
					?>
					<li class="border bb">
						<div class="row">
							<div class="column small-12 medium-5 large-4">
								<a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>">
									<div class="responsive-image">
										<img src="<?=MEDIAPATH.$data['article'][$i]['IMG']?>" alt="<?=$data['article'][$i]['TITLE']?>" />
									</div>
								</a>
							</div>
							<div class="column small-12 medium-7 large-8">
								<a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>"><h4><?=$data['article'][$i]['TITLE']?></h4></a>
								<p><?=elliStr($data['article'][$i]['DES'],120)?></p>
								<ul class="inline-list">
									<li><a href="<?=PUBLICPATH . $data['article'][$i]['SECURL']?>"><?=$data['article'][$i]['SEC']?></a></li>
									<li><?=date('M dS',strtotime($data['article'][$i]['DATE']))?></li>
									<li>Comments</li>
								</ul>
							</div>
						</div>
					</li>
					<?php
					}
					?>
				<li>
					<a href="">More</a>
				</li>
				</ul>
			</div>
			<div class="column medium-4" data-equalizer-watch="second-post">
				<h3>Ads</h3>
				<h3>Bits</h3>
				<ul class="nostyle-list">
					<?php 
					for ( $i = 0; $i<4; $i++ ) {
					?>
					<li class="border bb">
						<a href="<?=PUBLICPATH.$data['bits'][$i]['LINK']?>">
							<?=$data['bits'][$i]['TITLE']?>
							<small><?=$data['bits'][$i]['SUBSEC']?></small>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="third-post">
		<div class="row border bt bb">
			<?php 
			for ( $i = 3; $i<7; $i++ ) {
			?>
			<div class="column small-12 medium-3">
				<a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>">
					<div class="responsive-image">
						<img src="<?=MEDIAPATH.$data['article'][$i]['IMG']?>" alt="<?=$data['article'][$i]['TITLE']?>" />
					</div>
				</a>
				<a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>"><h5><?=$data['article'][$i]['TITLE']?></h5></a>
				<p><?=elliStr($data['article'][$i]['DES'],90)?></p>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</section>