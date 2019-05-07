<nav class="navbar navbar-ct-blue navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('admin/home') ?>">STBA LIA Yogyakarta </a>
                    <img src="<?php echo base_url('assets/img/stbaww.png')?>" width="45px" height="45pxa"" alt="" />
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        
                    </ul>


                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                        <img src="<?php echo base_url('assets/img/') . $this->session->userdata('avatar'); ; ?>" width="60px" height="60pxa" class="img-circle" alt="User Image">
                       
                      </li>
                       
                      <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                       <?php echo $this->session->userdata('username');?>
                                        <b class="caret"></b>
                                    </p>
                                    

                              </a>
                              <ul class="dropdown-menu">
                                
                                <li><a href="<?php echo site_url('admin/kajur/profile');?>"><font color="black"><i class="pe-7s-tools"></i> Settings</a></font></li>
                                <li><a href="<?php echo site_url('login/logout');?>"><font color="black"><i class="pe-7s-power"></i> Sign Out</a></font></li>

                                                               
                              </ul>
                        </li>
                                              
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>