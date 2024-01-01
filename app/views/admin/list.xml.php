ID, Title, Category, Sub Sec, Link, Date, Description, Content
<?php 
	for ( $i = 0; $i<sizeof($data['items']); $i++ ) {
?>
	<?=$data['items'][$i]['SL_NO']?>, <?=$data['items'][$i]['TITLE']?>, <?=$data['items'][$i]['SEC']?>, <?=$data['items'][$i]['SUBSEC']?>, <?=PUBLICPATH . $data['items'][$i]['LINK']?>, <?=$data['DATE']?>, <?=$data['items'][$i]['DES']?>, "<?=htmlspecialchars_decode($data['items'][$i]['CONTENT'])?>",
<?php
	}
?>