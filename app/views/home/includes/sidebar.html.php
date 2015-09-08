<?php
/* 
 * Do not display if no sidebar data is passed
 */
if(isset($data['sidebar'])) {
?>

<div class="row">
	<div class="column small-12">
		<div class="clearfix">
			<div class="section-heading-container">
				<h3 class="section-heading left">Search</h3>
			</div>
		</div>
		<form class="padd-2-bottom border bb">
			<div class="row">
				<div class="large-12 columns">
					<div class="row collapse">
						<div class="small-10 columns">
							<input type="text" placeholder="Search on Tech Stream">
						</div>
						<div class="small-2 columns">
							<input class="button tiny" value="Search" type="submit">
						</div>
					</div>
				</div>
			</div>
		</form>


		<div class="clearfix">
			<div class="section-heading-container">
				<h3 class="section-heading left">Last 5 Articles</h3>
			</div>
		</div>
		<ol class="nostyle-list side-list border bb padd-4-bottom">	
			<?php 
			$total = sizeof($data['sidebar']['article']);

			for ( $i = 0; $i<$total; $i++ ) {
			?>
			<li class="padd-1-top padd-1-bottom">
				<a href="<?=PUBLICPATH.$data['sidebar']['article'][$i]['LINK']?>">
					<h4 class="side-list-title"><?=$data['sidebar']['article'][$i]['TITLE']?></h4>
				</a>
				<small><?=$data['sidebar']['article'][$i]['SEC']?></small>
			</li>
			<?php
			}
			?>
		</ol>
		<div class="clearfix">
			<div class="section-heading-container">
				<h3 class="section-heading left">News Letter</h3>
			</div>
		</div>
		<p>Subscribe to our email newsletter for useful tips and valuable resources, sent out every new article release.</p>
		<form class="newsletter" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=techstream/feeds', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<div class="row">
				<div class="large-12 columns">
					<div class="row collapse">
						<div class="small-10 columns">
		    				<input placeholder="Your e-mail address" name="email" type="text">
						</div>
						<div class="small-2 columns">
							<input class="button tiny" value="Subscribe" type="submit">
						</div>
					</div>
				</div>
			</div>
			
		    <input value="techstream/feeds" name="uri" type="hidden">
			        <input name="loc" value="en_US" type="hidden">
		    
			
			<p class="powered_by">Powered by <a href="http://feedburner.google.com/" target="_blank">FeedBurner</a></p>
		</form>

	</div>
</div>

<?php
}
?>