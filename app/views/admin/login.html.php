<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="row push-4-top">
		<div class="large-4 medium-5 small-10 small-centered column">
			<?php if ( ! empty($data['error_main'])) : ?> 
				<div class="alert-box alert radius text-center push-4-top">
					<small class="clWhite"><?=$data['error_main']?></small> 
				</div>
			<?php endif; ?>
			<form data-abide  action="" method="post">
				<div class="row">
					<div class="large-12 columns">
						<label>User Name
						<input type="text" name="username" placeholder="" />
						<?php if ( ! empty($data['error_username'])) : ?> <small class="clRed error2"><?=$data['error_username']?></small> <?php endif; ?>
						</label>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<label>Password
						<input type="password" name="password" placeholder="" />
						<small class="error">Please enter a password</small>
					    <?php if ( ! empty($data['error_password'])) : ?> <small class="clRed error2"><?=$data['error_password']?></small> <?php endif; ?>
						</label>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<input type="submit" class="button" value="login" />
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>