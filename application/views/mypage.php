<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Aggielp - Personal Page</title>
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
	<script type="text/javascript" src="js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="js/bootstrap-carousel.js"></script>
	<script type="text/javascript" src="js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="js/bootstrap-button.js"></script>
	<script type="text/javascript" src="js/mypage.js"></script>

</head>
<?php ?>
<body style="background-color: #6CA300">
	<div class="container" style="margin-top: 20px">
		<div class="row">
			<div class="span2 well offset1">
				<!--Sidebar content-->
				<img src="img/mypage/default_head.jpg" style="padding: 0"></img>			
				<div class="span2" style="margin-left: 0px;">  
					<ul id="myList" class="nav nav-pills nav-stacked">
						<li class="nav-header" >Your Aggielp</li>
						<li class="span2 active" style="margin-left: 0px;"><a href="#ratings"
							onclick="checkactive('myplaces',0)" data-toggle="tab">My
								Ratings</a>
						</li>
						<li  class="span2" style="margin-left: 0px;"><a href="#comments"
							onclick="checkactive('myachievements',2)" data-toggle="tab">My
								Comments</a>
						</li>
						<li class="divider"></li>
						<li  class="span2" style="margin-left: 0px;"><a href="#myprofile" data-toggle="tab">My Profile</a>
						</li>
					</ul>
				</div>  
			</div>


			<div class="tab-content">
				<!-- my places -->
				<div class="tab-pane fade in active well span8" style="overflow: hidden"
					id="ratings">
					<div class="span8">
						<div class="container">
							<h1 class="span7">My Ratings</h1>
							<!--a href="placecreatedpage.do" class="btn btn-large btn-info">
								<i class="icon-plus-sign icon-white"></i>New </a-->
						</div>
						<!--div id="wait_myplaces">
							<img class="span5" src="img/mypage/ajax-loader.gif"></img>
						</div>
						<!--place List Thumbnails-->
						<ul class="thumbnails" id="ulmyplacees">
						<?php foreach ($ratings as $rating):?>
							<li class='span10'>
								<div class='thumbnail wthumbnail'>
								<img class='wimg span5 hidden-phone' src='<?php echo base_url();?>img/shop<?php echo  $rating['sid']?>.jpg'/>
								<div class='caption span5'>
									<h3><?php echo $rating['name']; ?> </h3>
		    			    				<p style='font-size:15px;line-height:20px'>
		    			    				Rating: "<?php echo $rating['rating']; ?>"</p>        
		    			    	</div>
								</div>
							</li>						
							<?php endforeach;?>						
						</ul>
					</div>
				</div>
				<!-- comments -->
				<div class="tab-pane fade well span8" style="overflow: hidden"
					id="comments">
					<div class="span8">
						<div class="container">
							<h1>My Comments</h1>
						</div>
						<!--div id="wait_votedplaces">
							<img class="span5" src="img/mypage/ajax-loader.gif"></img>
						</div>
						<!--place List Thumbnails-->
						<ul class="thumbnails" id="ulvotedplaces">
							<?php foreach ($comments as $comment):?>
							<li class='span10'>
								<div class='thumbnail wthumbnail'>
								<img class='wimg span5 hidden-phone' src='<?php echo base_url();?>img/shop<?php echo  $comment['sid']?>.jpg'/>
								<div class='caption span5'>
									<h3><?php echo $comment['name']; ?> </h3>
		    			    				<p class='wcontent' style='font-size:15px;line-height:20px'>Comment: "<?php echo $comment['comment']; ?> "</p>        
		    			    	</div>
								</div>
							</li>						
							<?php endforeach;?>	
						</ul>
					</div>
				</div>

				<!-- my profile -->
				<div class="tab-pane fade well  span8" style="overflow: hidden"
					id="myprofile">
					<div class="span8">
						<div class="container">
							<h1>My Profile</h1>
								<div class="input-prepend">
									<span class="add-on">User name</span> 
									<h2>
										<?php echo $this->session->userdata('username'); ?>
									</h2>
								</div>
								<div>
									<span id="warnmodiName"></span>
								</div>

								<div class="input-prepend">
									<span class="add-on">Email</span>
									<h2>
									<?php echo $this->session->userdata('useremail');  ?>
									</h2>
								</div>
								<div>
									<span id="warnmodiMobile"></span>
								</div>
					</div>
				</div>


			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>
</html> 