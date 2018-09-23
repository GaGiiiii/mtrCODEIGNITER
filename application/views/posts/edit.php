<div class="container">
	<div class="row">

	<!-- SIDEBAR <div class="col-sm-4 col-md-3 sidebar"> -->

  <?php 
    $link = APPPATH;
    $link2 = $link . "views/templates/sidebar.php";
    include("$link2"); 
  ?>



		<div class="col-md-9 col-sm-8" style="padding-left: 3rem;">	
			<!-- <form class="form-horizontal new-post-form" action="<?php //echo base_url(); ?>vesti/azuriraj" method="post"> -->
				<?php echo form_open_multipart('vesti/azuriraj', 'class="new-post-form form-horizontal"'); ?>

				<!-- MORAMO DA POSALJEMO ID OD POSTA KOJI CEMO UPDATE -->

				<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
				<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">

				<h2>Azuriraj Vest &nbsp;<strong>'<?= $post['title']; ?>'</strong></h2>
			  <fieldset>
			    <div class="form-group">
			      <div class="col-lg-10">
			      	<?php echo form_error('title'); ?>
			        <input type="text" class="form-control" id="title" name="title" placeholder="Naslov" value="<?php echo $post['title']; ?>"
			        >
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10">
			      	<?php echo form_error('body'); ?>
			        <textarea class="form-control" rows="3" name="body" id="cke" style="max-width: 100%;" placeholder="Unesite Sadrzaj Vesti"><?php echo $post['body']; ?></textarea>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10">
			      	<label>Kategorija</label>
			      	<select name="category_id" class="form-control">
			      		<?php foreach($categories as $category) : ?>
			      			<?php if(!$category['deleted']) : ?>
										<option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $post['category_id']) { ?>selected='selected' <?php } ?>>
											<?php
												echo $category['name'];
												if($category['name'] == 'Vest'){
													echo " &#xf0a1;";
												}else if($category['name'] == "Obavestenje"){
													echo " &#xf05a;";
												}else{
													echo " &#xf0f3;";
												}
											?>
										</option>
									<?php endif; ?>
			      		<?php endforeach; ?>
			      	</select>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10">
			      	<label>Upload Files</label>
			      	<small style="display: inline-block; margin-bottom: .8rem; margin-top: -0.8rem;">(Only PDF files allowed)</small>
			      	<input type="file" name="userfile" size='20'>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10">
			        <a class="btn btn-default" href="<?php echo base_url(); ?>">Cancel</a>
			        <button type="submit" name="addpost" class="btn btn-primary">Submit</button>
			      </div>
			    </div>
			  </fieldset>
			</form>
		</div>
	</div>
</div>
