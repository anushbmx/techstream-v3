<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="row">
		<form method="post">	
			<div class="small-12 medium-6 columns">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">System Settings</h3>
					</div>
				</div>
					<p>Custom Settings for the site</p>
						<div class="row">
							<div class="large-12 columns">
								<label> Ad Sidebar (HTML)
									<textarea name="ad_sidebar" cols="77" rows="5"><?php if ( ! empty($data['ad_sidebar'])) : ?><?=$data['ad_sidebar']?><?php endif; ?></textarea>
									<?php if ( ! empty($data['error_ad_sidebar'])) : ?> <small class="clRed error2"><?=$data['error_ad_sidebar']?></small> <?php endif; ?>
								</label>
							</div>
						</div>

						<div class="row">
							<div class="large-12 columns">
								<label> Ad Main (HTML)
									<textarea name="ad_main" cols="77" rows="5"><?php if ( ! empty($data['ad_main'])) : ?><?=$data['ad_main']?><?php endif; ?></textarea>
									<?php if ( ! empty($data['error_ad_main'])) : ?> <small class="clRed error2"><?=$data['error_ad_main']?></small> <?php endif; ?>
								</label>
							</div>
						</div>

						

						<div class="row">
							<div class="large-12 columns">
								<label> Footer Links (HTML)
									<textarea name="footer_links" cols="77" rows="5"><?php if ( ! empty($data['footer_links'])) : ?><?=$data['footer_links']?><?php endif; ?></textarea>
									<?php if ( ! empty($data['error_footer_links'])) : ?> <small class="clRed error2"><?=$data['error_footer_links']?></small> <?php endif; ?>
								</label>
							</div>
						</div>

						<div class="row">
							<div class="large-12 columns">
								<label> Comments Section (HTML)
									<textarea name="comments" cols="77" rows="5"><?php if ( ! empty($data['comments'])) : ?><?=$data['comments']?><?php endif; ?></textarea>
									<?php if ( ! empty($data['error_comments'])) : ?> <small class="clRed error2"><?=$data['error_fcomments']?></small> <?php endif; ?>
								</label>
							</div>
						</div>

						<div class="row">
							<div class="large-12 columns">
								<input type="submit" class="button expand success" value="Save" />
							</div>
						</div>
							
			</div>
			<div class="small-12 medium-6 columns">
				<div class="clearfix">
					<div class="section-heading-container">
						<h3 class="section-heading left">Account Settings</h3>
					</div>
				</div>
				<p>Custom code for the site, will be included to all pages in footer section</p>
				<div class="row">
					<div class="large-12 columns">
						<label> Additional Styles (CSS)
							<textarea name="styles" cols="77" rows="5"><?php if ( ! empty($data['styles'])) : ?><?=$data['styles']?><?php endif; ?></textarea>
							<?php if ( ! empty($data['error_styles'])) : ?> <small class="clRed error2"><?=$data['error_styles']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label> Additional Script (JS)
							<textarea name="scripts" cols="77" rows="5"><?php if ( ! empty($data['scripts'])) : ?><?=$data['scripts']?><?php endif; ?></textarea>
							<?php if ( ! empty($data['error_scripts'])) : ?> <small class="clRed error2"><?=$data['error_scripts']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<input type="submit" class="button expand success" value="Save" />
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>