<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			My Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>index.php/home"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-4 col-xs-3">
				<!--blank box space-->
			</div><!-- ./col -->
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					
					<div class="inner">
						
						<h3>
							<?php echo $hours; ?>/8 hrs
						</h3>
						<p>
							Time Accounted
						</p>
					</div>
					<div class="progress col-sm-2" style="padding:0;width:100%">
						<div class="progress-bar progress-bar-green" style="width: <?php echo ($hours / 8) * 100; ?>%;">
						</div>
					</div>
					<a href="#" class="small-box-footer" id="add_butt">
						Add Activity <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			<div class="col-lg-4 col-xs-3">
			</div><!-- ./col -->
		</div><!-- /.row -->

		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-12 connectedSortable">                            
                                          
				<?php $this->load->view('includes/activities_list.php'); ?>

			</section><!-- /.Left col -->
		</div><!-- /.row (main row) -->
		
		<!-- Bottom row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 col-xs-12 connectedSortable">                            
                                          
				<?php $this->load->view('includes/activity_form.php'); ?>

			</section><!-- /.Left col -->
			<!-- right col (We are only adding the ID to make the widgets sortable)-->
			<section class="col-lg-5 col-xs-12 connectedSortable"> 


				<?php $this->load->view('includes/calendar.php'); ?>
			</section><!-- right col -->
		</div><!-- /.row (main row) -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->
