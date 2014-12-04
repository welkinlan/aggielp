<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />


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
		include 'header.php';
	?>
			
	<div class="container">
		<!--  Campaigns-->
		<div class="row" style="margin: 40px 0 20px 0">
			<div class="hero-unit span9 offset1"
				style="padding: 15px 15px 10px 15px; border-radius: 6px">
				<div id="campaignCarousel" class="carousel slide span6"
					style="padding: 0; margin: 0">
					<div class="carousel-inner">
						<div class="item">
							<a href="shopdetail.php?campid=campaign0"> <img
								alt="Please wait while this image is loading "
								class="cimg"
								src="img/chinese-burger.jpg" /> </a>
						</div>

						<div class="item">
							<a href="shopdetail.php?campid=campaign1"> <img
								class="cimg"
								src="img/food-1.jpg" /> </a>
						</div>

						<div class="item active">
							<a href="shopdetail.php?campid=campaign2"> <img
								class="cimg"
								src="img/jins.jpg" /> </a>
						</div>
					</div>
					<a class="carousel-control left" href="#campaignCarousel"
						data-slide="prev">&lsaquo;</a> 
					<a class="carousel-control right" href="#campaignCarousel" 
						data-slide="next">&rsaquo;</a>
				</div>

				<!--  Hot wishes -->
				<div class="span2" style="margin: 2px 10px 2px 10px">
					<table class="well table table-striped"
						style="margin-top: 30px; margin-left: 10px;">
						<thead>
							<tr>
								<th><i class='icon-fire icon-red'></i>Hot Spots</th>
								<th> Rate</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="hotwish_it" items="${hotwishes}">
								<tr>
									<td><a href="hotwish.do?wishid=${hotwish_it.wish_id }">${hotspot_it.title
											}</a></td>
									<td>100</td>
								</tr>
							</c:forEach>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="row" style="margin:auto 0">
			<div class="tabbable  hero-unit span9 offset1" style="padding:15px">
				<ul id="myTab" class="nav nav-tabs" style="margin-right: 0px;margin-bottom: 0px;border-bottom-width: 0px;">
	              <li class="active">
	              	<a href="javascript:void(0);" class="refresh btn btn-large btn-block" type="button" style="height: 50px;width: 200px; text-align:center;
	              	 font-size:20px;font-family:'Dancing Script', cursive;"
	              	 data-original-title="Press to refresh~" rel="tooltip" data-placement="left" onclick="refreshwishes()">
	              		New Posts!<i class='icon-eye-open icon-red'></i></a>
	              </li>
	         <!-- <li>
	                <a href="#achievement" style="height: 30px;width: 140px;text-align:center;
	                font-size:20px;font-family:'Dancing Script', cursive;" data-toggle="tab" >
	                	Achievements</a></li> -->
	            </ul>


				<div id="myTabContent" class="tab-content">
              		<div class="tab-pane fade in active" id="wish" style="overflow:hidden">
						<!--Wish List Thumbnails-->
						<ul id="ulwishes" class="thumbnails">							
						</ul>
						<div class="row">
							<a id ="nextpage" style="text-align: center;">Drag to refresh</a>	
							<img id ="waitbar" src="img/mypage/ajax-loader.gif" style="display: none; margin:0 auto"></img>	
						</div>
							
					</div>									
					<script type="text/javascript">
						var isfirst = false;	
						getmorewish();
						$(window).bind("scroll",function(){	
							if( $(document).scrollTop() + $(window).height() > $(document).height() - 10 ) {
						    	if(isfirst == true){
						    		
						    		getmorewish();
						    	}
							}
						});
				</script>

				</div><!-- tab content -->
			</div><!-- hero unit -->
		</div><!-- content row -->

	</div>

	<!-- Footer
    ================================================== -->
	<div class="footer hidden-phone"
		style="margin-top: 0px; padding-bottom: 20px; padding-top: 20px; background: #333; /* IE6,7 */; background: -moz-linear-gradient(top, #333, #333 50%, #1c1c1c 100%); background: -webkit-gradient(linear, left top, left bottom, from(#333), color-stop(50%, #333), color-stop(100%, #1c1c1c) ); background: -o-linear-gradient(top, #333, #333 50%, #1c1c1c 100%);">
		<div class="container">
			<div class="span8">
				<p>
					Design by <a href="http://psi.cse.tamu.edu/people/tian-lan/">Tian Lan</a>
				</p>
				<p>@SE Project</p>
				<p>
					<a href="#">Back to top</a>
				</p>
			</div>
			<img class="span2 pull-right" src="img/yelp.jpg" />

		</div>
	</div>
</body>
</html>