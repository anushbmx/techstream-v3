<textarea name="content" cols="77" rows="30">
<?xml version="1.0" encoding="UTF-8"?>
	<records>
<?php 
	for ( $i = 0; $i<sizeof($data['items']); $i++ ) {
?>
<record>
	<ID><![CDATA[<?=$data['items'][$i]['SL_NO']?>]]></ID>
	<post_title><![CDATA[<?=$data['items'][$i]['TITLE']?>]]></post_title>
	<section><![CDATA[<?=$data['items'][$i]['SEC']?>]]></section>
	<subsection><![CDATA[<?=$data['items'][$i]['SUBSEC']?>]]></subsection>
	<guid><![CDATA[<?=PUBLICPATH . $data['items'][$i]['LINK']?>]]></guid>
	<post_date><![CDATA[<?=$data['items'][$i]['DATE']?>]]></post_date>
	<post_excerpt><![CDATA[<?=trim($data['items'][$i]['DES'])?>]]></post_excerpt>
	<post_content><![CDATA[<?=htmlspecialchars_decode($data['items'][$i]['CONTENT'])?>]]></post_content>
</record>
<?php
}
?>
<records>
</textarea>