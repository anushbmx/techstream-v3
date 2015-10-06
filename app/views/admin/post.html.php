<?php include 'includes/header.html.php'; ?>
<section id="content">
	<form data-abide  action="" method="post">
	<div class="row border bb">
		<div class="small-12 medium-6 columns padd-1-bottom">
			<div class="clearfix">
				<div class="section-heading-container">
					<h3 class="section-heading left"><?=$data['TITLE']?></h3>
				</div>
			</div>
		</div>
		<div class="hide-for-small-only medium-6 columns padd-1-bottom text-right padd-1-top">
			<input type="submit" class="button success tiny  nospace" value="Save" />
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns padd-2-bottom">
			<div class="row">
				<div class="small-12 columns padd-1-bottom border">
					<div class="clearfix">
						<div class="section-heading-container">
							<h3 class="section-heading left">Edit</h3>
						</div>
					</div>
				</div>
			</div>
				<div class="row">
					<div class="large-12 columns">
						<label>Title
						<input type="text" name="title" placeholder="" <?php if ( ! empty($data['TITLE'])) : ?> value="<?=$data['TITLE']?>" <?php endif; ?> />
						<?php if ( ! empty($data['error_title'])) : ?> <small class="clRed error2"><?=$data['error_title']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-6 small-12 columns">
						<label>Catagory
							<select name="catagory">
							<?php if ( ! empty($data['SECURL'])) : ?>
								
								<option value="<?=$data['SECURL']?>"><?=removeHyphen($data['SECURL'])?></option>
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
							<?php if ( ! empty($data['SUBSEC'])) : ?>
								
								<option value="<?=$data['SUBSEC']?>"><?=removeHyphen($data['SUBSEC'])?></option>
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
						<input type="text" name="link" placeholder="" <?php if ( ! empty($data['LINK'])) : ?> value="<?=$data['LINK']?>" <?php endif; ?> />
						<?php if ( ! empty($data['error_link'])) : ?> <small class="clRed error2"><?=$data['error_link']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label>Featured Image
						<input type="text" name="featuredimage" placeholder="" <?php if ( ! empty($data['IMG'])) : ?> value="<?=$data['IMG']?>" <?php endif; ?>  />
						<?php if ( ! empty($data['error_featuredimage'])) : ?> <small class="clRed error2"><?=$data['error_featuredimage']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label>Article
						<textarea name="content" cols="77" rows="30"><?php if ( ! empty($data['CONTENT'])) : ?><?=htmlspecialchars($data['CONTENT'])?><?php endif; ?></textarea>
						<?php if ( ! empty($data['error_content'])) : ?> <small class="clRed error2"><?=$data['error_content']?></small> <?php endif; ?>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label>Short Description
						<textarea name="description" cols="77" rows="5"><?php if ( ! empty($data['DES'])) : ?><?=$data['DES']?><?php endif; ?></textarea>
						<?php if ( ! empty($data['error_description'])) : ?> <small class="clRed error2"><?=$data['error_description']?></small> <?php endif; ?>
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
			<section id="content">
				<div class="article-head push-4-top ">
					<div class="row">
						<div class="column small-12">
							<img src="<?=MEDIAPATH . $data['IMG'] ?>" alt="<?=$data['TITLE']?>"/>
							<h1 class="article-heading padd-1-top"><?=$data['TITLE']?></h1>
							<ul class="inline-list post-meta border bb padd-4-bottom nospace">
								<li><a href="<?=PUBLICPATH . $data['SECURL']?>"><?=$data['SEC']?></a></li>
								<li class="divide"></li>
								<li><?=date('M dS Y',strtotime($data['DATE']))?></li>
								<li class="divide"></li>
								<li>Comments</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="article-content">
					<section class="article">
						<?=$data['CONTENT']?>
					</section>
				</div>
			</section>
		</div>
	</div>
	</form>
</section>
<?php include 'includes/footer.html.php'; ?>