<?php Alerts::activate() ?>	
</body>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="<?=RESOURCEPATH?>js/foundation.min.js"></script>
<script src="<?=RESOURCEPATH?>js/highlight.pack.js"></script>
<script>
	hljs.initHighlightingOnLoad();
    $(document).foundation();
</script>
<?php 
	if ( isset($GLOBALS['extra']['styles']) ) {
?>
<style type="text/css">
		<?=$GLOBALS['extra']['styles']?>
</style>
<?php
	}
?>

<?php 
	if ( isset($GLOBALS['extra']['scripts']) ) {
?>
<script type="text/javascript">
		<?=$GLOBALS['extra']['scripts']?>
</script>
<?php
	}
?>
</html>