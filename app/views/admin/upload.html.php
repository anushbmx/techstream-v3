<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="row">
		<div class="small-12 medium-6 columns">
			<div class="clearfix">
				<div class="section-heading-container">
					<h3 class="section-heading left">Upload Multimedia</h3>
				</div>
			</div>
			<p>Choose an image to begin upload</p>
			<form method="post" target="" enctype="multipart/form-data">
				<input type="file" name="uploadfile" required>
				<?php if ( ! empty($data['error_uploadfile'])) : ?> <small class="clRed error2"><?=$data['error_uploadfile']?></small> <?php endif; ?>
				<input type="submit" class="button" value="upload file">
			</form>
		</div>
		<div class="small-12 medium-6 columns">
			<div class="clearfix">
				<div class="section-heading-container">
					<h3 class="section-heading left">Preview on Site</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>