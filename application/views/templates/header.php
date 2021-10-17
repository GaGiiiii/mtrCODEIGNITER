<html lang="sr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menadzment Tehnologije i Razvoja</title>
  <!-- <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://bootswatch.com/3/lumen/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="http://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
  <!-- NEED FOR MODAL -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-4 col-sm-8 center">
          <!--       <div class="row">
        <div class="col-xs-1"> -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- </div> -->
          <!-- <div class="col-xs-11">   -->
          <a class="navbar-brand" href="<?php echo base_url(); ?>">Menadzment Tehnologije i Razvoja</a>
          <!-- </div> -->
          <!-- </div> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse col-md-8 col-sm-8 center" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li <?php if ($this->uri->segment(1) == "") {
                  echo 'class="active"';
                } ?>><a href="<?php echo base_url(); ?>">Pocetak <span class="sr-only">(current)</span></a></li>
            <li class="dropdown <?php if ($this->uri->segment(1) == "menadzment-tehnologije-i-razvoja" || $this->uri->segment(1) == "eramus-i-literature" || $this->uri->segment(1) == "razvoj-malih-i-srednjih-preduzeca" || $this->uri->segment(1) == "tehnoloska-strategija" || $this->uri->segment(1) == "menadzment-tehnoloskih-operacija") {
                                  echo 'active';
                                } ?>">
              <a href="#" data-toggle="dropdown">Osnovne Studije
                <span class="caret"></span></a>
              <ul class="dropdown-menu" id="dropdown-menu-rewrite">
                <li <?php if ($this->uri->segment(1) == "menadzment-tehnologije-i-razvoja") {
                      echo 'class="active"';
                    } ?>><a tabindex="-1" href="<?php echo base_url(); ?>menadzment-tehnologije-i-razvoja">Menadzment Tehnologije i Razvoja</a></li>
                <li class="dropdown-submenu">
                  <a class="test <?php if ($this->uri->segment(1) == "eramus-i-literature") {
                                    echo 'active-dropdown';
                                  } ?>" tabindex="-1" href="#">Managment Of Technology And Development <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li <?php if ($this->uri->segment(1) == "eramus-i-literature") {
                          echo 'class="active"';
                        } ?>><a tabindex="-1" href="<?php echo base_url(); ?>eramus-i-literature">Erasmus + Literature</a></li>
                  </ul>
                </li>
                <li class="dropdown-submenu">
                  <a class="test <?php if ($this->uri->segment(1) == "razvoj-malih-i-srednjih-preduzeca" || $this->uri->segment(1) == "menadzment-tehnoloskih-operacija" || $this->uri->segment(1) == "tehnoloska-strategija") {
                                    echo 'active-dropdown';
                                  } ?>" tabindex="-1" href="#">Izborni Predmeti <span class="caret"></span></a>
                  <ul class="dropdown-menu bigger-width">
                    <li <?php if ($this->uri->segment(1) == "razvoj-malih-i-srednjih-preduzeca") {
                          echo 'class="active"';
                        } ?>><a tabindex="-1" href="<?php echo base_url(); ?>razvoj-malih-i-srednjih-preduzeca">Razvoj Malih i Srednjih Preduzeca</a></li>
                    <li <?php if ($this->uri->segment(1) == "menadzment-tehnoloskih-operacija") {
                          echo 'class="active"';
                        } ?>><a tabindex="-1" href="<?php echo base_url(); ?>menadzment-tehnoloskih-operacija">Menadzment Tehnoloskih Operacija</a></li>
                    <li <?php if ($this->uri->segment(1) == "tehnoloska-strategija") {
                          echo 'class="active"';
                        } ?>><a tabindex="-1" href="<?php echo base_url(); ?>tehnoloska-strategija">Tehnoloska Strategija</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li <?php if ($this->uri->segment(1) == "master-studije") {
                  echo 'class="active"';
                } ?>><a href="<?php echo base_url(); ?>master-studije">Master Studije</a></li>
            <li>
              <form class="navbar-form navbar-left">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <a data-toggle="tooltip" data-placement="bottom" title="Pretraga trenutno nije u funkciji" class="btn btn-default disabled-search" disabled>Submit</a>
              </form>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </div><!-- /.container -->
  </nav>

  <div class="container-fluid">

    <!-- FLASH MESSAGES -->

    <?php if ($this->session->flashdata('post_created')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('post_created') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['post_created']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_created_test')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('post_created_test') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['post_created_test']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_updated')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('post_updated') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['post_updated']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_updated_test')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('post_updated_test') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['post_updated_test']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_deleted')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('post_deleted') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['post_deleted']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_deleted_test')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('post_deleted_test') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['post_deleted_test']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_created')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('category_created') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['category_created']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_created_test')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('category_created_test') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['category_created_test']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_deleted')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('category_deleted') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['category_deleted']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_deleted_test')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('category_deleted_test') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['category_deleted_test']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedin')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('user_loggedin') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['user_loggedin']); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_logged_out')) : ?>
      <?php echo '<p class="alert alert-success alert-dismissible">' . $this->session->flashdata('user_logged_out') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>'; ?>
      <?php unset($_SESSION['user_logged_out']); ?>
    <?php endif; ?>




  </div>