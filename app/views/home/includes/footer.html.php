	<section id="footer" class="padd-4-top padd-4-bottom">
		<div class="row padd-4-bottom link-1 border bb">
			<div class="column small-12 medium-6 large-6">
				<ul class="inline-list nospace">
					<li><a href="<?=PUBLICPATH?>About">About</a></li>
					<li><a href="<?=PUBLICPATH?>All">All Article</a></li>
					<li><a href="<?=PUBLICPATH?>Newsletter">News Letter</a></li>
					<li><a href="<?=PUBLICPATH?>Contact">Contact</a></li>
				</ul>
			</div>
			<div class="column small-12 medium-6 large-6 ">
				<ul class="inline-list nospace right">
					<li>Social Links</li>
					<li><a href="<?=FACEBOOKURL?>">Facebook</a></li>
					<li><a href="<?=TWITTER?>">Twitter</a></li>
					<li><a href="<?=GOOGLEPLUS?>">Google +</a></li>
				</ul>
			</div>
		</div>
		<div class="row push-2-top push-2-bottom">
			<div class="column small-12 medium-10 small-centered">
				<ul class="inline-list nospace friendLinks text-center">
					<?php 
						if ( isset($GLOBALS['extra']['footer_links']) ) {
							echo $GLOBALS['extra']['footer_links'];
						}
					?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="column small-6">
				<ul class="inline-list nospace">
					<li><a href="<?=PUBLICPATH?>Privacy">Privacy</a></li>
					<li><a href="<?=PUBLICPATH?>License">License</a></li>
					<li><a href="<?=PUBLICPATH?>Credits">Credits</a></li>
				</ul>
			</div>
			<div class="column small-6 text-right">
				&copy; <?=date('Y')?> Tech Stream. All code <a href="http://opensource.org/licenses/MIT">MIT license</a>
			</div>
		</div>
	</section>
</div> <!-- End of id="container" -->
