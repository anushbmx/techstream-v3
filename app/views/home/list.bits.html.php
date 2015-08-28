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
						<h4><?=$data['items'][$i]['TITLE']?></h4>
						<p><?=$data['items'][$i]['SUBSEC']?></p>						
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