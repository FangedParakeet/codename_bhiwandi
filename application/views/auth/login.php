<?php
    $message = $this->session->flashdata('message');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?=$this->config->item('admin_app_name')?> login page</title>
        <meta name="author" content="Amit Shah" />
        <meta name="description" content="Asus-fonepad Dashboard" />
        <meta name="application-name" content="Asus-fonepad Dashboard" />
    
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
        <!-- Le styles -->
        <link href="<?php echo base_url()?>assets/styles/style.css" rel="stylesheet" />
    </head>
      
    <body>
        <div class="login-wrap">
            <h1 align="center"><?=$this->config->item('admin_app_name')?> Dashboard</h1>
            <div><?php echo $message;?></div>
            
            <div class="login-form">
                <form class="form-horizontal" action="<?php echo base_url()?>auth/login" method="post" id="loginForm" >
                    <h1>Admin Login</h1>
                    <input name="identity" id="identity" type="text" class="text" placeholder="User name" required/>
                    <input name="password" id="password" type="password" class="text" placeholder="Password" required/>
                    <input type="submit" class="submit-login" value="Login" />
                    <!--<a href="#" class="forgot">Forgot password?</a>-->
                </form>
            </div>
        </div>
        <script  type="text/javascript" src="<?php echo base_url()?>assets/scripts/jquery-1.10.2.min.js"></script>
  </body>
</html>