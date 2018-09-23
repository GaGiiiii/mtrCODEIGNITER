<div class="container">
	<div class="row">

	<!-- SIDEBAR <div class="col-sm-4 col-md-3 sidebar"> -->

  <?php 
    $link = APPPATH;
    $link2 = $link . "views/templates/sidebar.php";
    include("$link2"); 
  ?>



		<div class="col-md-9 col-sm-8" style="padding-left: 3rem;">	
			<!-- <form class="form-horizontal new-post-form" action="<?php //echo base_url(); ?>vesti/napravi" method="post"> -->
				<?php echo form_open('kategorije/napravi', 'class="new-post-form form-horizontal"'); ?>
				<h2>Dodaj Novu Kategoriju</h2>
			  <fieldset>
			    <div class="form-group">
			      <div class="col-lg-10">
			      	<?php echo form_error('name'); ?>
			        <input type="text" class="form-control" id="name" name="name" placeholder="Ime" value="<?php echo set_value('name'); ?>"
			        >
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10">
			        <a class="btn btn-default" href="<?php echo base_url(); ?>">Cancel</a>
			        <button type="submit" name="addpost" class="btn btn-primary">Submit</button>
			      </div>
			    </div>
			  </fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
