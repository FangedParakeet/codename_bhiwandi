<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codename Bhiwandi | Dashboard</title>
		<?php $this->load->view('includes/head.php'); ?>
    </head>
    <body class="skin-blue">
		<?php $this->load->view('includes/taskbar.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
			<?php $this->load->view('includes/sidebar.php'); ?>
			<?php $this->load->view('includes/home_content.php'); ?>
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
		<?php $this->load->view('includes/foot.php'); ?>
    </body>
</html>