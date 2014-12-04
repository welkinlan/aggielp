<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
   <link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/mainpage.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="js/bootstrap-tab.js"></script>
	<script type="text/javascript" src="js/bootstrap-carousel.js"></script>
</head>
<body style="background-color: #6CA300">
	<?php
	echo form_open('login');
	?>
	<div class="container" style="width:100%">
		<div class="row" style="margin-left: 0px; background: #333; /* IE6,7 */;
							background: -moz-linear-gradient(top, #333, #333 50%, #1c1c1c 100%);
							background: -webkit-gradient(linear, left top, left bottom, from(black), color-stop(50%, #131235), color-stop(100%, #1C1C1C) );
							background: -o-linear-gradient(top, #333, #333 50%, #1c1c1c 100%);">
			<h1 class="span3 pull-left" style="font-size:60px; color:white;font-weight: bold; font-family: georgia; vertical-align: middle;padding:10px">
			    Aggielp
			</h1> 
			
			<div class="form-search span5 pull-right" 
					style="margin-bottom: 0px;" href="search" method="post">
				<div class="input-append">
					<input name="keyword" type="text" class="span4 search-query" 
						style="margin-top: 20px; height:20px;" placeholder="Search Places"/>
						<button type="submit" style="margin-top: 20px"class="btn btn-info">
							Search
						</button>
				</div>
            </div>
            
				
				<!--div class="brand span3"  style="padding:0">
					<h3 style="margin:0;color:white">Hey, ${username}
					<a class="btn btn-warning btn-small" style="margin-bottom: 8px; color: white" href="logout.do"> 
						Logout
					</a>
					</h3>
				</div-->
		</div>
	</div>
	
	<div class="container" style="margin: 40px 0 20px 0">
		<div class="hero-unit span5 offset4" style="padding: 15px 15px 10px 15px; border-radius: 6px ">
                    <h5 class="text-center">
                      Login
                     </h5>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <h5>Username</h5>
                            
                            <input name="username" type="text" class="form-control span5" placeholder="Username" 
                            			value="<?php echo set_value('username'); ?>"/>
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <h5>Password</h5>
                            <input name="password" type="password" class="form-control span5" placeholder="Password" 
                           				 value="<?php echo set_value('password'); ?>"/>
                           	<?php echo form_error('password'); ?>
                           	
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                           <input type="submit" value="Submit" class="btn span5"/>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
</div>
</div> 	<script type="text/javascript">
		</script>
</body>
</html>