<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="list-head">
		<div class="row padd-2-bottom">
			<div class="column small-12 medium-8 large-8 padd-4-top small-centered medium-uncentered">
				<h1 class="pages-heading "><?=$data['TITLE']?></h1>
			</div>
			<div class="column small-12 medium-4 large-4">
				<ul class="inline-list padd-4-top">
					<li><a class="button" href="<?=ADMINPATH?>">Dashboard</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="list-content border bt" data-equalizer="list-content">
		<div class="row ">
			<div class="column small-12 medium-8 large-8 border br" data-equalizer-watch="list-content">
				<ul class="nostyle-list padd--top">
					<?php 
					for ( $i = 0; $i<sizeof($data['items']); $i++ ) {
					?>
						<li class="border bb padd-1-top padd-1-bottom">
							<a href="<?=ADMINPATH . 'post/' . $data['items'][$i]['SL_NO'] ?>"><h4 class="alert "><?=$data['items'][$i]['TITLE']?></h4></a>
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
				<?php // include 'includes/sidebar.html.php'; ?>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>