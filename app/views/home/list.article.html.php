<section id="content">
	<div class="list-head">
		<div class="row padd-2-bottom center-element-container">
			<div class="column small-12 medium-8 large-8 padd-4-top small-centered medium-uncentered">
				<h1 class="pages-heading "><?=$data['TITLE']?></h1>
				<p class="push-2-top border bt padd-2-top">All articles in <?=$data['TITLE']?>, showing <?=$data['limit']?> out of <?=$data['TOTAL']?> items.</p>
			</div>
			<div class="column small-6 medium-4 large-4 small-centered medium-uncentered">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">Advert</h3>
					</div>
				</div>
				<div class="ads"></div>
			</div>
		</div>
	</div>

	<div class="list-content border bt">
		<div class="row" data-equalizer="list-content">
			<div class="column small-12 medium-8 large-8 border br" data-equalizer-watch="list-content">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">Articles</h3>
					</div>
				</div>
				<ul class="nostyle-list">
					<?php 
					for ( $i = 0; $i<sizeof($data['items']); $i++ ) {
					?>
					<li class="border bb padd-4-top padd-4-bottom center-element-container">
						<div class="row">
							<div class="center-element hide show-for-large column small-12 medium-9 medium-centered large-uncentered large-5">
								<a class="" href="<?=PUBLICPATH.$data['items'][$i]['LINK']?>">
									<div class="responsive-image">
										<img src="<?=MEDIAPATH.$data['items'][$i]['IMG']?>" alt="<?=$data['items'][$i]['TITLE']?>" />
									</div>
								</a>
							</div>
							<div class="hide-for-large column small-12 medium-9 medium-centered large-uncentered large-5">
								<a class="" href="<?=PUBLICPATH.$data['items'][$i]['LINK']?>">
									<div class="responsive-image">
										<img src="<?=MEDIAPATH.$data['items'][$i]['IMG']?>" alt="<?=$data['items'][$i]['TITLE']?>" />
									</div>
								</a>
							</div>
							<div class="column small-12 medium-12 medium-only-text-center large-7">
								<a href="<?=PUBLICPATH.$data['items'][$i]['LINK']?>"><h3 class="post-title-3 push-2-bottom push-2-top"><?=$data['items'][$i]['TITLE']?></h3></a>
								<p><?=elliStr($data['items'][$i]['DES'],200)?></p>
								<ul class="inline-list post-meta">
									<li><a href="<?=PUBLICPATH . $data['items'][$i]['SECURL']?>"><?=$data['items'][$i]['SEC']?></a></li>
									<li class="divide"></li>
									<li><?=date('M dS',strtotime($data['items'][$i]['DATE']))?></li>
									<li class="divide"></li>
									<li><a href="<?=PUBLICPATH.$data['items'][$i]['LINK']?>#comments">Comments</a></li>
								</ul>
							</div>
						</div>
					</li>
					<?php
					}
					?>
				</ul>
				<div class="pagination push-3-top">
					<?php pagination($data['totalArticle'],$data['limit'] ,$data['start'], $data['sectionUrl']);?>
				</div>
			</div>
			<div class="column small-12 medium-4 large-4" data-equalizer-watch="list-content">
				<?php include 'includes/sidebar.html.php'; ?>
			</div>
		</div>
	</div>
</section>