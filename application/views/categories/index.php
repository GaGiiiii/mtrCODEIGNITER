<div class="container">
	<div class="row">

	<!-- SIDEBAR <div class="col-sm-4 col-md-3 sidebar"> -->

  <?php 
    $link = APPPATH;
    $link2 = $link . "views/templates/sidebar.php";
    include("$link2"); 
  ?>



		<div class="col-md-9 col-sm-8" style="padding-left: 3rem;">
			<h2>Kategorije</h2>
			<ul class="list-group categories">
				<?php foreach($categories as $category) : ?>

					<?php if(!$category['deleted']) : ?>

				  <li class="list-group-item">
				  	<?php
				  		$categoryName = url_title($category['name']);
				  		$categoryName = strtolower($categoryName); 
				  	?>
				    <a href="<?php echo site_url('/kategorije/' . $categoryName); ?>">
				    	<?php echo $category['name']; ?>			    		
				    </a>

						<?php if($category['name'] != 'Obavestenje' && $category['id'] != 2 && $category['id'] != 1 && $category['name'] != 'Vest') : ?>

				    
				    <a type="submit" class="category-delete" data-target="#deleteCategoryModal<?php echo $category['id']; ?>" data-toggle="modal">[ X ]</a>

				  	<?php endif; ?>

				    <div class="modal fade" id="deleteCategoryModal<?php echo $category['id'] ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Are you sure that you want to delete category:<br>"<?php echo $category['name']; ?>" ?</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open('/kategorije/delete/' . $category['id']); ?>
            
                      <input type="submit" value="YES" class="btn btn-danger">
                      <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>

                    <?php echo form_close(); ?>
                  </div>
                </div> 
              </div>
            </div>

				  </li>

					<?php endif; ?>

				<?php endforeach; ?>
				<li class="list-group-item">
					<a href="<?php echo site_url('/kategorije/uncategorised'); ?>">
				    	Uncategorised			    		
				    </a>
				</li>
			</ul>
		</div>
	</div>
</div>
