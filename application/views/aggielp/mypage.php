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

<body style="background-color: #6CA300">
	<?php
		include 'header.php';
	?>
	<div class="container" style="margin-top: 20px">
		<div class="row">
			<div class="span3 well">
				<!--Sidebar content-->
				<img src="img/mypage/default_head.jpg" style="padding: 0"></img>
				<div style="max-width: 340px; padding: 8px 0;">
					<ul id="myList" class="nav nav-list ">
						<li class="nav-header">Places</li>
						<li class="active"><a href="#myplaces"
							onclick="checkactive('myplaces',0)" data-toggle="tab">My
								Places</a>
						</li>
						<li><a href="#votedplaces"
							onclick="checkactive('votedplaces',1)" data-toggle="tab">Rated
								Places</a>
						</li>
						<li class="nav-header">Achievements</li>
						<li><a href="#myachievements"
							onclick="checkactive('myachievements',2)" data-toggle="tab">My
								Achievements</a>
						</li>
						<li class="nav-header">Campaigns</li>
						<li><a href="#joinedcampaigns"
							onclick="checkactive('joinedcampaigns',3)" data-toggle="tab">Joined
								Campaigns</a>
						</li>
						<li class="divider"></li>
						<li><a href="#myprofile" data-toggle="tab">My Profile</a>
						</li>
					</ul>
				</div>
			</div>


			<div class="tab-content">
				<!-- my places -->
				<div class="tab-pane fade in active well" style="overflow: hidden"
					id="myplaces">
					<div class="span8">
						<div class="container">
							<h1 class="span7">My Places</h1>
							<!--a href="placecreatedpage.do" class="btn btn-large btn-info">
								<i class="icon-plus-sign icon-white"></i>New </a-->
						</div>
						<div id="wait_myplaces">
							<img class="span5" src="img/mypage/ajax-loader.gif"></img>
						</div>
						<!--place List Thumbnails-->
						<ul class="thumbnails" id="ulmyplacees">
						</ul>
					</div>
				</div>
				<!-- voted placees -->
				<div class="tab-pane fade well" style="overflow: hidden"
					id="votedplaces">
					<div class="span8">
						<div class="container">
							<h1>Rated Places</h1>
						</div>
						<div id="wait_votedplaces">
							<img class="span5" src="img/mypage/ajax-loader.gif"></img>
						</div>
						<!--place List Thumbnails-->
						<ul class="thumbnails" id="ulvotedplaces">

						</ul>
					</div>
				</div>

				<!-- my achievements -->
				<div class="tab-pane fade well" style="overflow: hidden"
					id="myachievements">
					<div class="span8">
						<div class="container">
							<h1>My Achievements</h1>
						</div>
						<div id="wait_myachievements">
							<img class="span5" src="img/mypage/ajax-loader.gif"></img>
						</div>
						<!--place List Thumbnails-->
						<ul class="thumbnails" id="ulmyachievements">

						</ul>
					</div>
				</div>


				<!-- joined campaigns -->

				<div id="joinedcampaigns" class="tab-pane fade well"
					style="overflow: hidden">
					<div class="span8">
						<div class="container">
							<h1>My Campaigns</h1>
						</div>
						<div id="wait_joinedcampaigns">
							<img class="span5" src="img/mypage/ajax-loader.gif"></img>
						</div>
						<!--place List Thumbnails-->
						<ul id="uljoinedcampaigns" class="thumbnails"></ul>
					</div>
				</div>

				<!-- my profile -->
				<div class="tab-pane fade well" style="overflow: hidden"
					id="myprofile">
					<div class="span8">
						<div class="container">
							<h1>My Profile</h1>
							<form id="myprofileform" action="myprofileok.do" method="post">
								<div class="input-prepend">
									<span class="add-on">User Name</span> <input class="span2"
										id="username" name="username" size="16" type="text"
										onblur="isModiNameValid()" placeholder="Username">
								</div>
								<div>
									<span id="warnmodiName"></span>
								</div>

								<div class="input-prepend">
									<span class="add-on">Mobile Number</span> <input class="span2"
										id="phone" name="phone" size="16" type="text"
										placeholder="Phone" onblur="isModiMobileValid()">
								</div>
								<div>
									<span id="warnmodiMobile"></span>
								</div>

								<div class="input-prepend">
									<span class="add-on">Old Password</span> <input class="span2"
										id="oldpassword" name="oldpassword" " size="16"
										type="password" placeholder="Old Password"
										onblur="isOldPasswordValid()">
								</div>
								<div>
									<span id="warnoldpassword"></span>
								</div>


								<div class="input-prepend">
									<span class="add-on">New Password</span> <input class="span2"
										id="newpassword" name="newpassword" size="16" type="password"
										placeholder="New Password" onblur="isNewPasswordValid()">
								</div>
								<div>
									<span id="warnnewpassword"></span>
								</div>

								<div class="input-prepend">
									<span class="add-on">Confirm Your Password</span> <input
										class="span2" id="confirmpassword" name="confirmpassword"
										size="16" type="password" placeholder="Confirm Your Password"
										onblur="isConfirmPasswordValid()">
								</div>

								<div>
									<span id="warnconfirmpassword"></span>
								</div>

								<button id="btnCommit" onclick="isAllValid()"
									class="btn btn-success offset4">
									<a><i class="icon-ok icon-white"></i> submit</a>
							</form>
						</div>
					</div>
				</div>


			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->


	<!-- ------modals ------------->
	<div id="deleteModal" class="modal hide" tabindex=-1 role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">Message</h3>
		</div>
		<div class="modal-body">
			<p>Are you sure to delete this item?</p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
			<a class="btn btn-primary" onclick=deleting_item()>Sure</a>
		</div>
	</div>

	<div id="deletingModal" class="modal hide" tabindex=-1 role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<h3 id="myModalLabel">Deleting...</h3>
		</div>
		<div class="modal-body">
			<div class="progress progress-striped active">
				<div class="bar bar-danger" style="width: 100%;"></div>
			</div>
		</div>
		<div class="modal-footer"></div>
	</div>

	<div id="achieveModal" class="modal hide" tabindex=-1 role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">Message</h3>
		</div>
		<div class="modal-body">
			<p>Are you sure to achieve this place?</p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
			<a class="btn btn-primary" onclick=achieving_item()>Sure</a>
		</div>
	</div>

	<div id="achievingModal" class="modal hide" tabindex=-1 role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<h3 id="myModalLabel">Achieving...</h3>
		</div>
		<div class="modal-body">
			<div class="progress progress-striped active">
				<div class="bar bar-success" style="width: 100%;"></div>
			</div>
		</div>
		<div class="modal-footer"></div>
	</div>


	<div id="waitModal" class="modal hide fade" tabindex=-1 role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<h3 id="myModalLabel">Fetching data, please wait...</h3>
		</div>
		<div class="modal-body">
			<img class="span5" src="img/mypage/ajax-loader.gif"></img>
		</div>
		<div class="modal-footer"></div>
	</div>



</body>
</html> 