	<div id="header" class="fixed">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="<?php echo base_url()?>"><?=$this->config->item('admin_backend_top')?>.<span class="slogan">backend</span></a>
                <!--<img class="brand" src="<?php echo base_url()?>assets/images/logo.png" height="51px">-->
                
                <div class="nav-no-collapse">
                    <ul class="nav">
                        <!-- here comes menus on the top -->
                    </ul>
                  
                    <ul class="nav pull-right usernav">
						<li>
							<!-- here u can display the logged in user -->
						</li>
                        <li>
                        	<a href="<?php echo base_url("auth/logout")?>">
                        		<span class="icon16 icomoon-icon-exit"></span> Logout
                        	</a>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->