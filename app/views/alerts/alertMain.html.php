<div id="actionNotification">
	<div class="actionNotification__wrap aN-hide ">
		<div class="top-border">
			<span class="border-block bgGreen"></span>
			<span class="border-block bgOrange"></span>
			<span class="border-block bgYellow"></span>
			<span class="border-block bgBlue"></span>
			<span class="border-block bgRed"></span>
			<span class="border-block bgLime"></span>
			<span class="border-block bgPurple"></span>
		</div>
		<div class="bgWhite border br bb bl padd-4 padd-0-bottom text-center">
			<?php 
				if ( $data['eventType'] == 'success') {
					echo '<h3 class="nospace clGreen"><i class="fa fa-check fa-fw"></i> ' . $data['alertTitle'] . ' </h3>';
				} else if ( $data['eventType'] == 'error' ) {
					echo '<h3 class="nospace clRed2"><i class="fa fa-close fa-fw"></i> ' . $data['alertTitle'] . ' </h3>';
				} else {
					echo '<h3 class="nospace clBlue"><i class="fa fa-info fa-fw"></i> ' . $data['alertTitle'] . ' </h3>';
				}
			?>
			<p class="text-center"><?=$data['alertMessage']?></p>
		</div>
	</div>
</div>