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
	<link rel="stylesheet" type="text/css" href="<?=RESOURCEPATH?>css/style.css">
</head>