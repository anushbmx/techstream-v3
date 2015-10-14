<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="row">
		<div class="small-12 medium-6 columns">
			<div class="clearfix">
				<div class="section-heading-container">
					<h3 class="section-heading left">Blog Settings</h3>
				</div>
			</div>
			<ul class="small-block-grid-3 text-center push-4-top">
				<li><a class="button transparent" href="<?=ADMINPATH?>post">New Post</a></li>
				<li><a class="button transparent" href="<?=ADMINPATH?>viewpost/draft">Edit Draft</a></li>
				<li><a class="button success" href="<?=ADMINPATH?>viewpost">Published Post</a></li>
				<li><a class="button transparent" href="<?=ADMINPATH?>upload">Upload</a></li>
				<li><a class="button warning" target="_blank" href="<?=PUBLICPATH?>">Visit site</a></li>
			</ul>
		</div>
		<div class="small-12 medium-6 columns">
			<div class="clearfix">
				<div class="section-heading-container">
					<h3 class="section-heading left">Account Settings</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>