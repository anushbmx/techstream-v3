<section id="content">
	<div class="article-head">
		<div class="row">
			<div class="column small-12 medium-8 large-8">
				<h1 class="pages-heading push-2-top"><?=$data['TITLE']?></h1>
				<ul class="inline-list post-meta padd-4-bottom">
					<li><a href="<?=PUBLICPATH . $data['SECURL']?>"><?=$data['SEC']?></a></li>
					<li class="divide"></li>
					<li><?=date('M dS Y',strtotime($data['DATE']))?></li>
					<li class="divide"></li>
					<li>Comments</li>
				</ul>
			</div>
			<div class="column small-6 medium-4 large-4 small-centered medium-uncentered">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading">Advert</h3>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="article-content">
		<div class="row border bt">
			<div class="column small-12 medium-8 large-8 border br padd-4-top">
				<section class="article">
					<?=$data['FULLTEXT']?>
				</section>
				<div id="comments" class=" border bt push-4-top">
					<div class="clearfix">
						<div class="section-heading-container">
							<h3 class="section-heading left">Comments</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="column small-12 medium-4 large-4">
				<?php include 'includes/sidebar.html.php'; ?>
			</div>
		</div>
	</div>
</section>