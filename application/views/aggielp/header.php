<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<title>Aggielp</title>
	<base href="<?php echo base_url();?>"></base>
	<base src="<?php echo base_url();?>"></base>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="js/bootstrap-tab.js"></script>
	<script type="text/javascript" src="js/bootstrap-carousel.js"></script>
	<script type="text/javascript" src="js/mainpage.js"></script>
	<script type="text/javascript" src="js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="js/bootstrap-button.js"></script>
</head>


<body>
	
	<div class="container" style="width:100%">
		<div class="row" style="margin-left: 0px; background: #333; /* IE6,7 */;
							background: -moz-linear-gradient(top, #333, #333 50%, #1c1c1c 100%);
							background: -webkit-gradient(linear, left top, left bottom, from(black), color-stop(50%, #131235), color-stop(100%, #1C1C1C) );
							background: -o-linear-gradient(top, #333, #333 50%, #1c1c1c 100%);">
			<h1 class="span3 pull-left" style="font-size:60px; color:white;font-weight: bold; font-family: georgia; vertical-align: middle;padding:10px">
			    Aggielp
			</h1> 
			<?php echo validation_errors(); ?>
			<?php
			$attributes = array('class' => "form-search span5 pull-right", 'style' => "margin-bottom:0px"); 
			echo form_open('search/query', $attributes) ?>
			<div class="input-append">
				<input type="input" name="keyword" class="span4 search-query" 
						style="margin-top: 20px; height:30px;" placeholder="Search Places"/>
				<button type="submit" name="submit" style="margin-top: 20px"class="btn btn-info">
							Search
						</button>

			</form>
            
				
				<!--div class="brand span3"  style="padding:0">
					<h3 style="margin:0;color:white">Hey, ${username}
					<a class="btn btn-warning btn-small" style="margin-bottom: 8px; color: white" href="logout.do"> 
						Logout
					</a>
					</h3>
				</div-->
		</div>
	</div>
	
	
	<div class="navbar" style="position: static; margin-bottom: 0px;">
              <div class="navbar-inner" style="border-width: 0;">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".subnav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <div class="nav-collapse subnav-collapse">
                    <ul class="nav">
	              <li><a href="<?php echo site_url('main') ?>">Home</a></li>
                      <li><a href="<?php echo site_url('mypage') ?>">My Page</a></li>
                      <li><a href="<?php echo site_url('about') ?>">About us</a></li>
                    </ul>

					<h3 class="span5 hidden-phone" style="text-align:center;
						font-family:'Dancing Script', cursive; margin-top: 0px;margin-bottom: 0px;">
						Best places in BCS!
					</h3>
					
					<div id="button_group">
					
					<?php
						if($is_logged_in){
					?>
						<a class="btn btn-info pull-right"
							style="color: white;margin-left: 10px" href="<?php echo site_url('main/logout') ?>">
								Logout</a>
						
						<h4 class="pull-right">Welcome 
						<?php
							echo($this->session->userdata('username'));
						?>
						,
						</h4>
					
					
					
					<?php }else{?>
					<a class="btn btn-primary pull-right"
							style="color: white" href="<?php echo site_url('register') ?>">
								Register</a>
					<a class="btn btn-success pull-right" 
						style="color: white; margin-right: 10px;" href="<?php echo site_url('login') ?>">
						<i class="icon-user icon-white"></i>Login
					</a>
					<?php }?>
                    
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div><!-- /navbar -->
	
    
    
	
	  
</body>
</html>
