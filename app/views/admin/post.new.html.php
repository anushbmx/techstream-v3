<?php include 'includes/header.html.php'; ?>
<section id="content">
	<div class="row">
		<div class="small-12 columns padd-1-bottom border bb">
			<div class="clearfix">
				<div class="section-heading-container">
					<h3 class="section-heading left"><?=$data['TITLE']?></h3>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns padd-2-top padd-2-bottom">
			<form data-abide  action="" method="post">
				<div class="row">
					<div class="large-12 columns">
						<label>Title
						<input type="text" name="title" placeholder="" <?php if ( ! empty($data['title'])) : ?> value="<?=$data['title']?>" <?php endif; ?> />
						<?php if ( ! empty($data['error_title'])) : ?> <small class="clRed error2"><?=$data['error_title']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-6 small-12 columns">
						<label>Catagory
							<select name="catagory">
							<?php if ( ! empty($data['catagory'])) : ?>
								
								<option value="<?=$data['catagory']?>"><?=removeHyphen($data['catagory'])?></option>
							<?php endif; ?>
							<?php
							foreach ($data['CATAGORY'] as $key=>$value) {
							?>
								<option value="<?=$key?>"><?=removeHyphen($key)?></option>
							<?php 
							}
							?>
							</select>
						</label>
					</div>
					<div class="large-6 small-12 columns">
						<label>Sub Catagory ( Optional )
							<select name="subsec">
							<?php if ( ! empty($data['subsec'])) : ?>
								
								<option value="<?=$data['subsec']?>"><?=removeHyphen($data['subsec'])?></option>
							<?php endif; ?>
							<?php
							foreach ($data['SUBCATAGORY'] as $value) {
							?>
								<option value="<?=$value?>"><?=removeHyphen($value)?></option>
							<?php 
							}
							?>
							</select>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label>Link
						<input type="text" name="link" placeholder="" <?php if ( ! empty($data['link'])) : ?> value="<?=$data['link']?>" <?php endif; ?> />
						<?php if ( ! empty($data['error_link'])) : ?> <small class="clRed error2"><?=$data['error_link']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label>Featured Image
						<input type="text" name="featuredimage" placeholder="" <?php if ( ! empty($data['featuredimage'])) : ?> value="<?=$data['featuredimage']?>" <?php endif; ?>  />
						<?php if ( ! empty($data['error_featuredimage'])) : ?> <small class="clRed error2"><?=$data['error_featuredimage']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label>Short Description
						<textarea name="description" cols="77" rows="5"><?php if ( ! empty($data['description'])) : ?><?=$data['description']?><?php endif; ?></textarea>
						<?php if ( ! empty($data['error_description'])) : ?> <small class="clRed error2"><?=$data['error_description']?></small> <?php endif; ?>
						</label>
					</div>
				</div>
				
				<div class="row">
					<div class="large-12 columns">
						<input type="submit" class="button expand success" value="Create New Aticle" />
					</div>
				</div>
			</form>
		</div>
		<div class="small-12 medium-6 columns">
			
		</div>
	</div>
</section>
<?php include 'includes/footer.html.php'; ?>