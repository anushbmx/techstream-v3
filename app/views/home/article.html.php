<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="article-head push-4-top ">
		<div class="row">
			<div class="column small-12 medium-9 large-8 small-centered">
				<img class="featured-image" src="<?=MEDIAPATH . $data['IMG'] ?>" alt="<?=$data['TITLE']?>"/>
				<h1 class="article-heading padd-1-top"><?=$data['TITLE']?></h1>
				<ul class="inline-list post-meta border bb padd-4-bottom nospace">
					<li><a href="<?=PUBLICPATH . $data['SECURL']?>"><?=removeHyphen($data['SECURL'])?></a></li>
					<li class="divide"></li>
					<li><?=date('M dS Y',strtotime($data['DATE']))?></li>
					<li class="divide"></li>
					<li><li><a href="<?=PUBLICPATH.$data['LINK']?>#disqus_thread">Comments</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="article-content">
		<div class="row">
			<div class="column small-10 medium-4 large-uncentered small-centered large-2">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading">Advert</h3>
					</div>
				</div>
				<div class="ads">
					<?php 
						if ( isset($GLOBALS['extra']['ad_main']) ) {
							echo $GLOBALS['extra']['ad_main'];
						}
					?>
				</div>
			</div>
			<div class="column small-12 medium-9 large-8 large-uncentered small-centered push-4-top push-4-bottom">
				<section class="article">
					<?=htmlspecialchars_decode($data['CONTENT'])?>
				</section>
			</div>
			<div class="column large-2 hide-for-medium-down">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading">Share on : </h3>
					</div>
				</div>
				<ul class="nostyle-list social-links-vertical">
					<li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?=PUBLICPATH . $data['LINK']?>">Facebook</a></li>
					<li><a target="_blank" href="http://twitter.com/intent/tweet?url=<?=PUBLICPATH . $data['LINK']?>">Twitter</a></li>
					<li><a target="_blank" href="https://plus.google.com/share?url=/<?=PUBLICPATH . $data['LINK']?>">Google Plus</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="article-discussion border bt" data-equalizer="post-meta" >
		<div class="row">
			<div class="column small-12 medium-8 large-8 border br" >
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 id="comments" class="section-heading left">Comments</h3>
					</div>
				</div>
				<?php 
					if ( isset($GLOBALS['extra']['comments']) ) {
						echo $GLOBALS['extra']['comments'];
					}
				?>
			</div>
			<div class="column small-12 medium-4 large-4" >
				<?php include 'includes/sidebar.html.php'; ?>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>