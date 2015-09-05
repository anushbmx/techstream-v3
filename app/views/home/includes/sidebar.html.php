<?php
/* 
 * Do not display if no sidebar data is passed
 */
if(isset($data['sidebar'])) {
?>

<div class="row">
	<div class="column small-12">
		<h2>Top 5 on Techstream</h2>
		<ol>	
			<?php 
			$total = sizeof($data['sidebar']['article']);

			for ( $i = 0; $i<$total; $i++ ) {
			?>
			<li>
				<a href="<?=PUBLICPATH.$data['sidebar']['article'][$i]['LINK']?>">
					<?=$data['sidebar']['article'][$i]['TITLE']?>
					<small><?=$data['sidebar']['article'][$i]['SUBSEC']?></small>
				</a>
			</li>
			<?php
			}
			?>
		</ol>
	</div>
</div>

<?php
}
?>