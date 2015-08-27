<section id="content">
	<div class="featured-post border bb">
		<div class="row">
			<div class="column small-12 small-centered medium-uncentered medium-10">
				<div class="row">
					<div class="column small-8 medium-7"></div>
					<div class="column small-4 medium-5">
						<h1><?=$data['article'][0]['TITLE']?></h1>
					</div>
				</div>
			</div>
			<div class="column small-12 text-center medium-2">
				<h1>Ads</h1>
			</div>
		</div>	
	</div>
	<div class="second-post">
		<div class="row">
			<div class="column medium-8 small-12 border br">
				<ul class="nostyle-list">
					<li class="border bb">
						<div class="row">
							<div class="column small-3 medium-3 large-2">
								<img src="<?=MEDIAPATH.$data['article'][1]['IMG110']?>" alt="<?=$data['article'][1]['TITLE']?>" />
							</div>
							<div class="column small-8 medium-9 large-10">
								<h4><?=$data['article'][1]['TITLE']?></h4>
								<p><?=$data['article'][1]['DES']?></p>
								<ul class="inline-list">
									<li><a href="<?=PUBLICPATH . $data['article'][1]['SECURL']?>"><?=$data['article'][1]['SEC']?></a></li>
									<li><?=date('M dS',strtotime($data['article'][1]['DATE']))?></li>
									<li>Comments</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="border bb">
						<div class="row">
							<div class="column small-3 medium-3 large-2">
								<img src="<?=MEDIAPATH.$data['article'][2]['IMG110']?>" alt="<?=$data['article'][2]['TITLE']?>" />
							</div>
							<div class="column small-8 medium-9 large-10">
								<h4><?=$data['article'][2]['TITLE']?></h4>
								<p><?=$data['article'][2]['DES']?></p>
								<ul class="inline-list">
									<li><a href="<?=PUBLICPATH . $data['article'][2]['SECURL']?>"><?=$data['article'][2]['SEC']?></a></li>
									<li><?=date('M dS',strtotime($data['article'][2]['DATE']))?></li>
									<li>Comments</li>
								</ul>
							</div>
						</div>
					</li>
				</ul>

			</div>
			<div class="column medium-4">
				<h1>Bits</h1>
			</div>
		</div>
	</div>
	<div class="third-post">
		<div class="row border bt bb">
			<div class="column small-12 medium-3">
				<h4>Article 1</h4>
			</div>
			<div class="column small-12 medium-3">
				<h4>Article 2</h4>
			</div>
			<div class="column small-12 medium-3">
				<h4>Article 3</h4>
			</div>
			<div class="column small-12 medium-3">
				<h4>Article 4</h4>
			</div>
		</div>
	</div>
	<div class="most-read">
		<div class="row border bb">
			<div class="column small-12 medium-4">
				<h4>Section 1</h4>
			</div>
			<div class="column small-12 medium-8 border bl">
				<h4>Most Read 2</h4>
				<div class="row">
					<div class="column medium-6 border br">
						<h4>Article</h4>
					</div>
					<div class="column medium-6 border show-for-medium-up">
						<h4>Bits</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>