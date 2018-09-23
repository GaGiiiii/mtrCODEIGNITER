    <div class="col-sm-4 col-md-3 sidebar">

			<!-- SIDEBAR 1 -->

      <div class="mini-submenu">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </div>
      <div class="list-group">
          <span href="#" class="list-group-item active">
              Submenu
              <span class="pull-right" id="slide-submenu">
                  <i class="fa fa-times"></i>
              </span>
          </span>        

          <a data-toggle="collapse" href="#collapseOne" class="list-group-item">
            Osnovne Studije  <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </a>
          <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="sidebar-ul">
                      <li class="sidebar-li">
                        <a href="<?php echo base_url(); ?>menadzment-tehnologije-i-razvoja">Menadzment Tehnologije i Razvoja</a>
                      </li>
                      <li class="sidebar-li">
                        <a href="<?php echo base_url(); ?>managment-of-technology-and-development">Managment Of Technology And Development</a>
                      </li>
                    </ul>
                </div>
            </div>
          <a data-toggle="collapse" href="#collapseOnee" class="list-group-item">
              Izborni Predmeti  <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </a>
          <div id="collapseOnee" class="panel-collapse collapse">
                          <div class="panel-body">
                              <ul class="sidebar-ul">
                                <li class="sidebar-li">
                                  <a href="<?php echo base_url(); ?>razvoj-malih-i-srednjih-preduzeca">Razvoj Malih i Srednjih Preduzeca</a>
                                </li>
                                <li class="sidebar-li">
                                  <a href="<?php echo base_url(); ?>menadzment-tehnoloskih-operacija">Menadzment Tehnoloskih Operacija</a>
                                </li>
                                <li class="sidebar-li">
                                  <a href="<?php echo base_url(); ?>tehnoloska-strategija">Tehnoloska Strategija</a>
                                </li>
                              </ul>
                          </div>
                      </div>
          <a href="<?php echo base_url(); ?>master-studije" class="list-group-item underline">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i> Master Studije
          </a>
      </div>  

			<!-- SIDEBAR 2 -->

      <div class="mini-submenu2">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </div>
      <div class="list-group">
          <span href="#" class="list-group-item active">
              Submenu
              <span class="pull-right" id="slide-submenu2">
                  <i class="fa fa-times"></i>
              </span>
          </span>
          <a href="<?php echo base_url(); ?>nastavnici" class="list-group-item underline">
              <i class="fa fa-users" aria-hidden="true"></i>  Nastavnici
          </a>
          <a href="<?php echo base_url(); ?>kodeks-ponasanja-komunikacije-i-oblacenja" class="list-group-item underline">
              <i class="fa fa-book" aria-hidden="true"></i> Kodeks Ponasanja, Komunikacije i Oblacenja
          </a>
          <a href="<?php echo base_url(); ?>apa-uputstvo" class="list-group-item underline">
              <i class="fa fa-info-circle" aria-hidden="true"></i> Uputstvo Za Citiranje APA
          </a>
      </div>    

      <!-- ADMIN SIDEBAR -->

      <div class="mini-submenu3">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </div>
      <div class="list-group">
          <span href="#" class="list-group-item active">
              Admin Meni
              <span class="pull-right" id="slide-submenu3">
                  <i class="fa fa-times"></i>
              </span>
          </span>
          <a href="<?php echo base_url(); ?>vesti/napravi" class="list-group-item underline">
              <i class="fa fa-plus" aria-hidden="true"></i> Dodaj Vest
          </a>
          <a data-toggle="collapse" href="#categories" class="list-group-item">
            Kategorije  <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </a>
          <div id="categories" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sidebar-ul">
                  <li class="sidebar-li">
                    <a href="<?php echo base_url(); ?>kategorije">Vidi Sve</a>
                  </li>
                  <li class="sidebar-li">
                    <a href="<?php echo base_url(); ?>kategorije/napravi">Dodaj Novu</a>
                  </li>                 
                </ul>
            </div>
          </div>
          <?php if(!$this->session->userdata('logged_in')){ ?>
            <a href="<?php echo base_url(); ?>login" class="list-group-item underline">
                <i class="fa fa-user" aria-hidden="true"></i> Login
            </a>
          <?php }else{ ?>
            <a href="<?php echo base_url(); ?>logout" class="list-group-item underline">
                <i class="fa fa-user" aria-hidden="true"></i> Logout
            </a>
          <?php } ?>
      </div> 
    </div>