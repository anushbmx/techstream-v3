<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="list-head">
		<div class="row padd-2-bottom">
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

	<div class="list-content border bt" data-equalizer="list-content">
		<div class="row ">
			<div class="column small-12 medium-8 large-8 border br" data-equalizer-watch="list-content">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">Bits</h3>
					</div>
				</div>
				<ul class="nostyle-list padd--top">
					<?php 
					for ( $i = 0; $i<sizeof($data['items']); $i++ ) {
					?>
					<li class="border bb padd-1-top padd-1-bottom">
						<h4><?=$data['items'][$i]['TITLE']?></h4>
						<p class="nospace"><?=$data['items'][$i]['SUBSEC']?> &nbsp;</p>						
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
<?php include 'includes/footer.html.php'; ?>