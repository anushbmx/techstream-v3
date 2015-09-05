<section id="content">
	<div class="article-head">
		<div class="row">
			<div class="column small-12 medium-9 large-8 small-centered">
				<img src="<?=MEDIAPATH . $data['IMG'] ?>" alt="<?=$data['TITLE']?>"/>
				<h1 class="article-heading"><?=$data['TITLE']?></h1>
				<ul class="inline-list border bt">
					<li><a href="<?=PUBLICPATH . $data['SECURL']?>"><?=$data['SEC']?></a></li>
					<li><?=date('M dS Y',strtotime($data['DATE']))?></li>
					<li>Comments</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="article-content">
		<div class="row">
			<div class="column small-8 medium-4 large-uncentered small-centered large-2">
				<h6>Ads</h6>
			</div>
			<div class="column small-12 medium-9 large-8 large-uncentered small-centered">
				<section class="article">
					<?=$data['FULLTEXT']?>
				</section>
			</div>
			<div class="column large-2 hide-for-medium-down">
				<ul class="side-nav">
					<li>Share it on :</li>
					<li class="divider"></li>
					<li>Facebook</li>
					<li>Twitter</li>
					<li>Google Plus</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="article-discussion border bt">
		<div class="row">
			<div class="column small-12 medium-8 large-8 border br">
				<h1>Comments</h1>
			</div>
			<div class="column small-12 medium-4 large-4">
				<h5>Sidebar</h5>
				<?php include 'includes/sidebar.html.php'; ?>
			</div>
		</div>
	</div>
</section>