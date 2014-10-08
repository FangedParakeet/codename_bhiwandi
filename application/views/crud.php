<?php include APPPATH . 'views/components/header.php';?>
	<!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    
    <?php include APPPATH . 'views/components/top_header.php';?>
    <?php 
    foreach($css_files as $file): ?>
    	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
    	<script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <div id="wrapper">
    	<?php //include APPPATH . 'views/components/sidebar.php';?>
<!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <!-- Build page from here: -->
                <div class="row-fluid">
					<?php echo $output; ?>
                </div><!-- End .row-fluid -->
                <!--End page -->
                
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->
<?php include APPPATH . 'views/components/footer.php';?>