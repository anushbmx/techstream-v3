<!DOCTYPE html>
<html>
<head>
	<title><?php
				if(isset($data['TITLE'])){
					echo $data['TITLE'];
				}else{
					echo SITENAME;
				}
			?>
	</title>
	<link rel="stylesheet" type="text/css" href="<?=RESOURCEPATH?>css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?=RESOURCEPATH?>css/foundation.min.css">
	<link rel="stylesheet" type="text/css" href="<?=RESOURCEPATH?>css/default.css">
	<link rel="stylesheet" type="text/css" href="<?=RESOURCEPATH?>css/font.css">
	<link rel="stylesheet" type="text/css" href="<?=RESOURCEPATH?>css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no">
</head>