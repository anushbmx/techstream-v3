<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="article-head">
		<div class="row padd-2-bottom">
			<div class="column small-12 medium-8 large-8 padd-4-top small-centered medium-uncentered">
				<h1 class="pages-heading "><?=$data['TITLE']?></h1>
				<ul class="inline-list post-meta ">
					<li><a href="<?=PUBLICPATH . $data['SECURL']?>"><?=removeHyphen($data['SECURL'])?></a></li>
					<li class="divide"></li>
					<li><?=date('M dS Y',strtotime($data['DATE']))?></li>
					<li class="divide"></li>
					<li>Comments</li>
				</ul>
				<p class="push-2-top border bt padd-2-top"><?=$data['DES']?></p>
			</div>
			<div class="column small-6 medium-4 large-4 small-centered medium-uncentered">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">Advert</h3>
					</div>
				</div>
				<div class="ads">
					<?php 
						if ( isset($GLOBALS['extra']['ad_sidebar']) ) {
							echo $GLOBALS['extra']['ad_sidebar'];
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="article-content border bt">
		<div class="row" data-equalizer="page-content">
			<div class="column small-12 medium-8 large-8 border br padd-4-top push-4-bottom" data-equalizer-watch="page-content">
				<section class="article push-4-bottom">
					<?=$data['CONTENT']?>
				</section>
			</div>
			<div class="column small-12 medium-4 large-4" data-equalizer-watch="page-content">
				<?php include 'includes/sidebar.html.php'; ?>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>