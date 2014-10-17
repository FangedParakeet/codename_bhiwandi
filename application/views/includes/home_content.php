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
            <div class="col-lg-3 col-xs-6">
										<!--blank box space-->
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            0/8 hrs
                        </h3>
                        <p>
                            Time Accounted
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Add More <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            </div><!-- ./col -->
        </div><!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">                            
                                          

                <!-- TO DO List -->
                <div class="box box-primary">
												<div class="box-header">
                    <h3 class="box-title">Add Activity</h3>
                  </div>														
												<div class="" id="">
														<form action="#" method="post">
																<div class="body bg-gray">
																	<div class="col-xs-5 form-group">
                                <label>Start Time</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>																						
                            </div>
																	<div class="col-xs-5 form-group">
                                <label>End Time</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>	
                            </div>
																	<div class="col-xs-4 form-group">
																		<label>For Client</label>
																		<select class="form-control">
																				<option>option 1</option>
																				<option>option 2</option>
																				<option>option 3</option>
																				<option>option 4</option>
																				<option>option 5</option>
																		</select>	
                            </div>
																	<div class="col-xs-4 form-group">
                              <label>Activity Done</label>
                                <input type="text" class="form-control" placeholder="Remarks">
                            </div>		
																	<div class="col-xs-4 form-group">
																			<label>Remarks</label>																																								
                                <input type="text" class="form-control" placeholder="Remarks">
                            </div>																					
																</div>
																<div class="footer">  
																		<button type="submit" class="btn bg-olive btn-block">Add to my Timesheet</button>
																</div>
														</form>
												</div>
											</div><!-- /.box -->

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable"> 


                <!-- solid sales graph -->
										<!-- /.box -->                            
                <!-- Calendar -->
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Add new event</a></li>
                                    <li><a href="#">Clear events</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View calendar</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>                                        
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div><!-- /.box-body -->  
                    <div class="box-footer text-black">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Progress bars -->
                                <div class="clearfix">
                                    <span class="pull-left">Task #1</span>
                                    <small class="pull-right">90%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                                </div>

                                <div class="clearfix">
                                    <span class="pull-left">Task #2</span>
                                    <small class="pull-right">70%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <div class="clearfix">
                                    <span class="pull-left">Task #3</span>
                                    <small class="pull-right">60%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                                </div>

                                <div class="clearfix">
                                    <span class="pull-left">Task #4</span>
                                    <small class="pull-right">40%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->                                                                        
                    </div>
                </div><!-- /.box -->                            

            </section><!-- right col -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
