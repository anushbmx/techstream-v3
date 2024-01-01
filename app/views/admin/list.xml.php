<textarea name="content" cols="77" rows="30">
<channel>
<?php 
	for ( $i = 0; $i<sizeof($data['items']); $i++ ) {
?>
<item>
	<id><?=$data['items'][$i]['SL_NO']?></id>
	<title><?=$data['items'][$i]['TITLE']?></title>
	<section><?=$data['items'][$i]['SEC']?></section>
	<subsection><?=$data['items'][$i]['SUBSEC']?></subsection>
	<link><?=PUBLICPATH . $data['items'][$i]['LINK']?></item>
	<date><?=$data['items'][$i]['DATE']?></date>
	<description><?=trim($data['items'][$i]['DES'])?></description>
	<content><?=htmlspecialchars_decode($data['CONTENT'])?></content>
</item>
<?php
}
?>
</channel>
</textarea>