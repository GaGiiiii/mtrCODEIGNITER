

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
        <h2 class="section-title mb-2 h1">
          <?php 
            if(isset($category_name)){
              if($category_name == "invalid"){
                echo "Kategorija Ne Postoji";
              }else{
                echo "POSLEDNJE OBJAVE IZ KATEGORIJE: " . $category_name;
              }
            }else{
              echo "POSLEDNJE VESTI";
            }
          ?>
        </h2>
        <hr class="title-hr">
        <div class="row mt-5">

        <?php if(isset($posts)) : ?>

        <?php foreach($posts as $post) : ?>

        <?php if(!$post['deleted']) : ?>

          <div class="col-md-12">
            <div class="card">
              <?php 

                // THIS SHOULD BE IN MODEL !!!!!!

                $category_id = $post['category_id'];
                $sql ="SELECT deleted FROM categories WHERE id = $category_id";
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

                  $sql ="SELECT name FROM categories WHERE id = $category_id";
                  $query = $this->db->query($sql);
                  $category = $query->row_array();
                  $category = $category['name'];
                }
              ?>
              <div class="card-block block-1 <?php echo $class; ?>">
                <h3 class="card-title"><?php echo $post['title']; ?></h3>
                <small>
                  Postavljeno:&nbsp;
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
                      echo word_limiter($string, 300);
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
                <a href="<?php echo site_url('/vesti/' . $post['slug']); ?>" title="Read more" class="read-more no-underline" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
              </div>
            </div>
          </div>

          <?php endif; ?>

          <?php endforeach; ?>
          
          <div class="col-md-12 pagination-div">
            <!-- <nav aria-label="Page navigation"> -->
              <ul class="pagination">
                <?php echo $this->pagination->create_links(); ?>
              </ul>
            <!-- </nav>    -->
          </div> 

          <?php endif; ?>

        </div>
      </div>  
    </section>
  </div>



  </div> <!-- ROW END -->
</div> <!-- CONTAINER END -->
