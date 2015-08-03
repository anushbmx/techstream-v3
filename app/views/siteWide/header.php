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
</head>
<body>

<div id="container">
