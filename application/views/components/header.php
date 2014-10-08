<?php 
if(!isset($is_printing)) {
	$is_printing = 0;
}
if(isset($data) && array_key_exists('active_menu', $data)) {
	$active_menu = $data['active_menu'];
	$page_title = $data['page_title'];
} else{
	$active_menu = '';
	$page_title = '';
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <title>Asus-Fonepad.admin</title>
	    <meta name="author" content="Amit Shah" />
	    <meta name="description" content="<?=$this->config->item('admin_app_name')?> Dashboard" />
	    <meta name="application-name" content="<?=$this->config->item('admin_app_name')?> Dashboard" />
	
	    <!-- Mobile Specific Metas -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	    <!-- Le styles -->
	    <link href="<?php echo base_url()?>assets/styles/bootstrap/bootstrap.css" rel="stylesheet" />
	    <link href="<?php echo base_url()?>assets/styles/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
	    <link href="<?php echo base_url()?>assets/styles/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
	    <link href="<?php echo base_url()?>assets/styles/icons.css" rel="stylesheet" type="text/css" />
	
		<!-- Plugin stylesheets -->
	    <link href="<?php echo base_url()?>assets/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
	    <!-- <link href="<?php echo base_url()?>assets/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />  -->	    
	    
	    <!-- Main stylesheets -->
	    <link href="<?php echo base_url()?>assets/styles/main.css" rel="stylesheet" type="text/css" />
	    
	    <!-- Custom stylesheets ( Put your own changes here ) -->
    	<link href="<?php echo base_url()?>assets/styles/custom.css" rel="stylesheet" type="text/css" /> 
	    
	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	
	    <!-- Le fav and touch icons -->
	    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico" />
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/images/apple-touch-icon-144-precomposed.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/images/apple-touch-icon-114-precomposed.png" />
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/images/apple-touch-icon-72-precomposed.png" />
	    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/images/apple-touch-icon-57-precomposed.png" />

	    <!-- Le javascript
	    ================================================== -->
	    <script  type="text/javascript" src="<?php echo base_url()?>assets/scripts/jquery-1.10.2.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url()?>assets/scripts/bootstrap/bootstrap.js"></script>  
		<script type="text/javascript" src="<?php echo base_url()?>assets/scripts/jquery.mousewheel.js"></script>
	    
		<!-- Misc plugins -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/misc/totop/jquery.ui.totop.min.js"></script>
		
	    <!-- Form plugins -->
	    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/forms/watermark/jquery.watermark.min.js"></script>
	    <!-- <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/forms/uniform/jquery.uniform.min.js"></script> -->
		
		<!-- Fix plugins -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/fix/ios-fix/ios-orientationchange-fix.js"></script>
		
	    <!-- Important Place before main.js  -->
		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/fix/touch-punch/jquery.ui.touch-punch.min.js"></script><!-- Unable touch for JQueryUI -->
	    
	    <!-- Init plugins -->
	    <script type="text/javascript" src="<?php echo base_url()?>assets/scripts/main.js"></script>
		    
	    
	    <script type="text/javascript">
	        //adding load class to body and hide page
        	document.documentElement.className += 'loadstate';
    	</script>
    </head>
