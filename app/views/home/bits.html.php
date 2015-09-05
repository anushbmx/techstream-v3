<section id="content">
	<div class="article-head">
		<div class="row">
			<div class="column small-12 medium-8 large-8">
				<h1 class="pages-heading "><?=$data['TITLE']?></h1>
				<p class="border bt"><?=$data['DES']?></p>
			</div>
			<div class="column small-6 medium-4 large-4 small-centered medium-uncentered">
				<h4>Ads</h4>
			</div>
		</div>
	</div>

	<div class="article-content">
		<div class="row">
			<div class="column small-12 medium-8 large-8 border br">
				<ul class="inline-list border bb">
					<li><a href="<?=PUBLICPATH . $data['SECURL']?>"><?=$data['SEC']?></a></li>
					<li><?=date('M dS Y',strtotime($data['DATE']))?></li>
					<li>Comments</li>
				</ul>
				<section class="article">
					<?=$data['FULLTEXT']?>
				</section>
				<h1>Comments</h1>
			</div>
			<div class="column small-12 medium-4 large-4">
				<h5>Sidebar</h5>
			</div>
		</div>
	</div>
</section>