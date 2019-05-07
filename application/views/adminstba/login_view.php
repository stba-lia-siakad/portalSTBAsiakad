<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>STBA LIA - Administrator Login</title>
<link rel="icon" href="<?php echo base_url('assets/img/sta-lia2.png')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/cssL/css_login/style.default.css');?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/cssL/css/style.shinyblue.css');?>" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('assets/js_login/jquery-1.9.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js_login/jquery-migrate-1.1.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js_login/jquery-ui-1.9.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js_login/modernizr.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js_login/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js_login/jquery.cookie.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js_login/custom.js');?>"></script>


</head>

<body class="loginpage" style="background:url(assets/img/bg.png)">

<div class="loginpanel">
    <div class="loginpanelinner">
      <div class="logo animate0 bounceIn"><img src="<?php echo base_url('assets/img/sta-lia2.png');?>" alt="" /></div>
       <form class="form-signin" action="<?php echo site_url('login/auth');?>"  method="post" >
            <?php if ($this->session->flashdata('msg')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php endif; ?>
            
            <div class="inputwrapper animate1 bounceIn">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
            </div>
                       
            <div class="inputwrapper animate3 bounceIn">
                <button href="<?php echo site_url('home/index'); ?>" class="btn btn-lg btn-primary btn-block" type="submit"><font color="white">Sign in</font></button>
            </div>
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>
                    &copy; <script>document.write(new Date().getFullYear())</script> STBA LIA Yogyakarta</a> All right Reserved.
                </p>
</div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>
