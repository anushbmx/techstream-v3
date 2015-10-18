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
			<div class="column small-10 medium-4 large-4 small-centered medium-uncentered">
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
			<div class="column small-12 medium-8 large-8 border br padd-4-top" >
				<section class="article push-4-bottom">
					<?=htmlspecialchars_decode($data['CONTENT'])?>
				</section>
				<?php 
					if ($data['TYPE']  == 0) {
				?>
				<div id="comments" class=" border bt push-4-top">
					<div class="clearfix">
						<div class="section-heading-container">
							<h3 class="section-heading left">Comments</h3>
						</div>
					</div>
					<?php 
						if ( isset($GLOBALS['extra']['comments']) ) {
							echo $GLOBALS['extra']['comments'];
						}
					?>
				</div>
				<?php } ?>
			</div>
			<div class="column small-12 medium-4 large-4" >
				<?php include 'includes/sidebar.html.php'; ?>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>