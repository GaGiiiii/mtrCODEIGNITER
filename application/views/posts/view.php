

<div class="container">
  <div class="row">


<!-- SIDEBAR <div class="col-sm-4 col-md-3 sidebar"> -->

  <?php 
    $link = APPPATH;
    $link2 = $link . "views/templates/sidebar.php";
    include("$link2"); 
  ?>





<div class="col-sm-8 col-md-9">
  <section id="what-we-do">
      <div class="container-fluid">
        <h2 class="section-title mb-2 h1"><?= $title; ?></h2>
        <hr class="title-hr">
        <div class="row mt-5">

          <div class="col-md-12">
            <div class="card">
              <?php 

                // THIS SHOULD BE IN MODEL !!!!!!

                $category_id = $post['category_id'];
                $sql = "SELECT deleted FROM categories WHERE id = $category_id";
                $query = $this->db->query($sql);
                $category = $query->row_array();
                $deleted = $category['deleted'];

                if($post['category_id'] == 1){
                  $class = 'vest';
                  $category = "Vest";
                }else if($post['category_id'] == 2){
                  $class = "obavestenje";
                  $category = "Obaveštenje";
                }else if($post['category_id'] == 0 || $deleted){
                  $class = 'uncategorised';
                  $category = "Uncategorised";
                }else{
                  $class = 'default';
                  $category_id = $post['category_id'];

                  // THIS SHOULD BE IN MODEL !!!!

                  $sql = "SELECT name FROM categories WHERE id = $category_id";
                  $query = $this->db->query($sql);
                  $category = $query->row_array();
                  $category = $category['name'];
                }
              ?>
              <div class="card-block block-1 <?php echo $class; ?>">
                <h3 class="card-title"><?php echo $post['title']; ?></h3>
                <small>
                	Postavljeno: &nbsp;
                	<?php
	                	echo strtok($post['created_at'],  ' ');
	              	  $fullDate = $post['created_at'];
										$findme   = ' ';
										$pos = strpos($fullDate, $findme);
										$time = substr($post['created_at'], $pos);
                	?>
                	u <?php echo $time; ?> | Menadzment Tehnologije i Razvoja | <?php echo $category; ?>
                </small>
                <div class="card-text" style="margin-bottom: 1.5rem;">
                  <div class="content">
                    <?php
                      $string = $post['body'];
                      $string = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
                      echo $string;
                    ?>    
                  </div>             
                </div>
                <?php if($post['post_file'] != "") : ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">Fajlovi</div>
                    <div class="panel-body">
                      <?php
                        $normalize = $post['post_file'];
                        $normalize = str_replace(' ', '_', $normalize);
                      ?>
                      <a href="<?php echo base_url(); ?>assets/files/<?php echo $normalize; ?>" download><?php echo $post['post_file']; ?></a>
                    </div>
                  </div>
                <?php endif; ?>
                <a href="azuriraj/<?php echo $post['slug']; ?>" class="btn btn-default pull-left no-underline" style="margin-right: .5rem;">Edit</a>

                <input type="submit" class="btn btn-danger" data-target="#deletePostModal<?php echo $post['id']; ?>" data-toggle="modal" value="Delete">

                <div class="modal fade" id="deletePostModal<?php echo $post['id'] ?>" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Are you sure that you want to delete post:<br>"<?php echo $post['title']; ?>" ?</h4>
                        </div>
                        <div class="modal-body">
                          <?php echo form_open('/vesti/delete/' . $post['id']); ?>
                  
                            <input type="submit" value="YES" class="btn btn-danger">
                            <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>

                          <?php echo form_close(); ?>
                        </div>
                      </div> 
                    </div>
                  </div>  

                
              

              </div>
            </div>
          </div>

        </div>
      </div>  
    </section>
  </div>



  </div> <!-- ROW END -->
</div> <!-- CONTAINER END -->