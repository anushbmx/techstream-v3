<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="featured-post border bb padd-2-top padd-2-bottom">
		<div class="row push-4-top push-4-bottom center-element-container	">
			<div class="column small-12 medium-9 medium-centered large-uncentered large-7">
				<a href="<?=PUBLICPATH.$data['article'][0]['LINK']?>">
					<div class="responsive-image">
						<img src="<?=MEDIAPATH.$data['article'][0]['IMG']?>" alt="<?=$data['article'][0]['TITLE']?>" />
					</div>
				</a>
			</div>
			<div class="column small-12 small-centered featured-post-description-container show-for-small-only">
				<div class="featured-post-description">
					<a href="<?=PUBLICPATH.$data['article'][0]['LINK']?>"><h2 class="featured-post-heading"><?=elliStr($data['article'][0]['TITLE'],40)?></h2></a>
					<p class="push-4-top"><?=elliStr($data['article'][0]['DES'],200)?> <a href="<?=PUBLICPATH.$data['article'][0]['LINK']?>" class="p-anchor">Read More</a></p>
				</div>
			</div>
			<div class=" column small-12 medium-9 large-5 medium-centered large-uncentered push-4-top padd-4-top end text-center hide-for-small">
				<div class="featured-post-description">
					<a href="<?=PUBLICPATH.$data['article'][0]['LINK']?>"><h2 class="featured-post-heading"><?=elliStr($data['article'][0]['TITLE'],60)?></h2></a>
					<p class="push-4-top"><?=elliStr($data['article'][0]['DES'],300)?> <a href="<?=PUBLICPATH.$data['article'][0]['LINK']?>" class="p-anchor"> Read More</a></p>
				</div>
			</div>
		</div>	
	</div>
	<div class="second-post">
		<div class="row border bb" data-equalizer="second-post">
			<div class="column medium-8 small-12" data-equalizer-watch="second-post">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">Articles</h3>
					</div>
				</div>
				<ul class="post-list nostyle-list push-right-4">
					<?php 
					for ( $i = 1; $i<3; $i++ ) {
					?>
					<li class="padd-4-top padd-4-bottom center-element-container">
						<div class="row">
							<div class="center-element hide show-for-large column small-12 medium-9 medium-centered large-uncentered large-5">
								<a class="" href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>">
									<div class="responsive-image">
										<img src="<?=MEDIAPATH.$data['article'][$i]['IMG']?>" alt="<?=$data['article'][$i]['TITLE']?>" />
									</div>
								</a>
							</div>
							<div class="hide-for-large column small-12 medium-9 medium-centered large-uncentered large-5">
								<a class="" href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>">
									<div class="responsive-image">
										<img src="<?=MEDIAPATH.$data['article'][$i]['IMG']?>" alt="<?=$data['article'][$i]['TITLE']?>" />
									</div>
								</a>
							</div>
							<div class="column small-12 medium-12 medium-only-text-center large-7">
								<a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>"><h3 class="post-title-3 push-2-bottom push-2-top"><?=elliStr($data['article'][$i]['TITLE'],50)?></h3></a>
								<p><?=elliStr($data['article'][$i]['DES'],200)?> <a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>" class="p-anchor">Read More</a></p>
								<ul class="inline-list post-meta">
									<li><a href="<?=PUBLICPATH . $data['article'][$i]['SECURL']?>"><?=removeHyphen($data['article'][$i]['SECURL'])?></a></li>
									<li class="divide"></li>
									<li><?=date('M dS',strtotime($data['article'][$i]['DATE']))?></li>
									<li class="divide"></li>
									<li><a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>#disqus_thread">Comments</a></li>
								</ul>
							</div>
						</div>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
			<div class="column medium-4 border bl" data-equalizer-watch="second-post">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">advert</h3>
					</div>
				</div>
				<div class="ads push-3-top push-3-bottom">
					<?php 
						if ( isset($GLOBALS['extra']['ad_sidebar']) ) {
							echo $GLOBALS['extra']['ad_sidebar'];
						}
					?>
				</div>
				<div class="border bt">
					<div class="clearfix">
						<div class="section-heading-container">
							<h3 class="section-heading left">Bits</h3>
							<a href="<?=PUBLICPATH?>Bits" class="section-heading right">More</a>
						</div>
					</div>
					<ul class="nostyle-list side-list" data-equalizer="bits-post">
						<?php 
						if ( sizeof($data['bits']) < 5 ) {
							$total = sizeof($data['bits']);
						} else {
							$total = 7;
						}

						for ( $i = 0; $i<$total; $i++ ) {
						?>
						<li class="padd-1-top padd-1-bottom" data-equalizer-watch="bits-post">
							<a href="<?=PUBLICPATH.$data['bits'][$i]['LINK']?>">
								<h4 class="side-list-title"><?=elliStr($data['bits'][$i]['TITLE'],30)?></h4>
							</a>
							<small><?=$data['bits'][$i]['SUBSEC']?>  &nbsp; </small>

						</li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="third-post" data-equalizer="third-post"> 
		<div class="row show-for-small-only">
			<div class="column small-12">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">Articles</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row" data-equalizer="third-post-title">
			<?php 
			for ( $i = 3; $i<7; $i++ ) {
			?>
			<div class="column small-12 medium-3 border bb  padd-4-top padd-4-bottom" data-equalizer-watch="third-post">
				<a class="push-2-top push-3-bottom" href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>">
					<div class="responsive-image">
						<img src="<?=MEDIAPATH.$data['article'][$i]['IMG']?>" alt="<?=$data['article'][$i]['TITLE']?>" />
					</div>
				</a>
				<a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>" class="padd-2-top" ><h3 class="post-title-2" data-equalizer-watch="third-post-title"><?=elliStr($data['article'][$i]['TITLE'],30)?></h3></a>
				<ul class="inline-list post-meta push-4-bottom">
					<li><a href="<?=PUBLICPATH . $data['article'][$i]['SECURL']?>"><?=removeHyphen($data['article'][$i]['SEC'])?></a></li>
					<li class="divide"></li>
					<li><?=date('M dS',strtotime($data['article'][$i]['DATE']))?></li>
					<li class="divide"></li>
					<li><a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>#disqus_thread">Comments</a></li>
				</ul>
				<p><?=elliStr($data['article'][$i]['DES'],150)?> <a href="<?=PUBLICPATH.$data['article'][$i]['LINK']?>" class="p-anchor">Read More</a></p>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="text-center border padd-4">
			<a href="<?=PUBLICPATH?>All" class="button nospace round">All Articles</a>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>