<section id="content">
	<div class="article-head">
		<div class="row">
			<div class="column small-12 medium-8 large-8">
				<h1><?=$data['TITLE']?></h1>
				<p class="border bt">All articles in <?=$data['TITLE']?></p>
			</div>
			<div class="column small-6 medium-4 large-4 small-centered medium-uncentered">
				<h4>Ads</h4>
			</div>
		</div>
	</div>

	<div class="article-content">
		<div class="row">
			<div class="column small-12 medium-8 large-8 border br">
				<ul class="nostyle-list">
					<?php 
					for ( $i = 0; $i<sizeof($data['items']); $i++ ) {
					?>
					<li class="border bb">
						<div class="row">
							<div class="column small-12 medium-5 large-4">
								<img src="<?=MEDIAPATH.$data['items'][$i]['IMG']?>" alt="<?=$data['items'][$i]['TITLE']?>" />
							</div>
							<div class="column small-12 medium-7 large-8">
								<h4><?=$data['items'][$i]['TITLE']?></h4>
								<p><?=elliStr($data['items'][$i]['DES'],120)?></p>
								<ul class="inline-list">
									<li><a href="<?=PUBLICPATH . $data['items'][$i]['SECURL']?>"><?=$data['items'][$i]['SEC']?></a></li>
									<li><?=date('M dS Y',strtotime($data['items'][$i]['DATE']))?></li>
									<li>Comments</li>
								</ul>
							</div>
						</div>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
			<div class="column small-12 medium-4 large-4">
				<h5>Sidebar</h5>
			</div>
		</div>
	</div>
</section>