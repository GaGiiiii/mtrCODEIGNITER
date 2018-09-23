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
        <?php echo form_open('login', 'class="new-post-form form-horizontal"'); ?>
        <?php if($this->session->flashdata('login_failed')) : ?>
          <?php echo '<p class="alert alert-danger" id="login_failed">' . $this->session->flashdata('login_failed') . '</p>'; ?>
        <?php endif; ?>
        <h2>Uloguj se</h2>
        <fieldset>
          <div class="form-group">
            <div class="col-lg-10">
              <?php echo form_error('username'); ?>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" autofocus required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10">
              <?php echo form_error('password'); ?>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" autofocus required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10">
              <a class="btn btn-default" href="<?php echo base_url(); ?>">Cancel</a>
              <button type="submit" name="login" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
