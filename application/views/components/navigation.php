	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url()?>dashboard" id="brand">
				D&L
			</a>
			<!--<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>-->
			<ul class='main-nav'>
				<li <?php echo $active_menu=='Customers'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Customers</span>
						<span class="caret"></span>
					</a>				
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>admin/pending_customers">Pending Customers</a></li>
						<li><a href="<?php echo base_url()?>admin/all_customers">All Customers</a></li>
						<li><a href="<?php echo base_url()?>admin/pending_customers/add">Add new Customers</a></li>
						<li><a href="<?php echo base_url()?>admin/locations">Customer Locations</a></li>
						<li><a href="<?php echo base_url()?>admin/potential_customers">Potential Customers</a></li>
					</ul>
				</li>
				<li <?php echo $active_menu=='Routings'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Routing</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>routing/view_routes">Todays Route For All Zones</a></li>
						<li><a href="<?php echo base_url()?>routing/view_routes/East">Todays Route For East Zones</a></li>
						<li><a href="<?php echo base_url()?>routing/view_routes/West">Todays Route For West Zones</a></li>
						<li><a href="<?php echo base_url()?>routing/view_routes/North">Todays Route For North Zones</a></li>
						<li><a href="<?php echo base_url()?>routing/view_routes/South">Todays Route For South Zones</a></li>
						<!-- <li><a href="<?php echo base_url()?>routing/view_all_routes">All Routes</a></li> -->
						<!-- <li><a href="<?php echo base_url()?>routing/schedule_routing">Schedule a Routing</a></li> -->
						<!-- <li><a href="<?php echo base_url()?>routing/pickups">All Completed Pickups</a></li> -->
					</ul>
				</li>
				<li <?php echo $active_menu=='Pickups'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Pickups</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>pickups/view_all_pickups">All Pickups</a></li>
						<li><a href="<?php echo base_url()?>pickups/completed_pickups">All Completed Pickups</a></li>
						<li><a href="<?php echo base_url()?>pickups/manual_pickups">Manual Pickup</a></li>
						<li><a href="<?php echo base_url()?>pickups/automatic_pickups">Automatic Pickups</a></li>
					</ul>				
				</li>				
				<li <?php echo $active_menu=='Users'?"class='active'":''?>>
					<a href="<?php echo base_url()?>admin/users">Manage Users</a>
				</li>
				<li <?php echo $active_menu=='Cash Expenses'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Cash Expenses</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>expenses/allot_funds/add">Allot Funds</a></li>
						<li><a href="<?php echo base_url()?>expenses/transactions">Transactions</a></li>
					</ul>				
				</li>
				<li <?php echo $active_menu=='Payments'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Payments</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>payments/customer_payments">Check Payments</a></li>
						<li><a href="<?php echo base_url()?>payments/payment_report">Payment Report</a></li>
					</ul>				
				</li>
				<li <?php echo $active_menu=='Services'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Services</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>services/pending">Pending Services</a></li>
						<li><a href="<?php echo base_url()?>services/all_services">All Services</a></li>
					</ul>				
				</li>
				<li <?php echo $active_menu=='Parent Companies'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Parent Companies</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>masters/parent_companies">View Parent Companies</a></li>
						<li><a href="<?php echo base_url()?>masters/parent_company/add">Add Parent Company</a></li>
					</ul>				
				</li>
				<li <?php echo $active_menu=='Zones'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Zones</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>masters/zones">View all Zones</a></li>
						<li><a href="<?php echo base_url()?>masters/zones/add">Add new Zone</a></li>
					</ul>
				</li>
				<li <?php echo $active_menu=='Trucks'?"class='active'":''?>>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Trucks</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()?>masters/trucks">View all Trucks</a></li>
						<li><a href="<?php echo base_url()?>masters/trucks/add">Add new Truck</a></li>
						<li><a href="<?php echo base_url()?>masters/assign_driver/add">Assign driver to Truck</a></li>
					</ul>
				</li>
			</ul>
			<div class="user">
				<div class="dropdown">
					<a href="<?php echo site_url('/admin/logout');?>">Logout</a>
				</div>
			</div>
		</div>
	</div>