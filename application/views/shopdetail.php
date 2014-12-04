<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Aggielp -Shop detail</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/mystyle.css" />
	
	<script type="text/javascript" src="<?php echo base_url();?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-tab.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-carousel.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-button.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/mypage.js"></script>

</head>
<body style="background-color: #6CA300">
	<?php
	
	$sid= $this->session->userdata('current_shop_id');
	echo form_open('shopdetail/add_comment');
	echo form_hidden('sid',$sid);
	?>
	<div class="container" style="margin: 40px 0 20px 0">
	
	
		<div class='hero-unit span10 offset1' style="padding:15px">
								<div class='thumbnail wthumbnail'>
									<img class='wimg span5 hidden-phone' src='<?php echo base_url();?>img/shop<?php echo  $shop['id']?>.jpg'/>
									<div class='caption span5'>
										<h3><?php echo $shop['name']; ?></h3>
										<h3 style="border-bottom: 2px solid #ccc;"><?php echo $shop['addr']; ?></h3>
			    			    		<h4>Average rating: <?php echo $shop['rating']; ?></h4> 
												    
			    			    	</div>
								</div>
							</div>					
		
		<div class="hero-unit span7 offset2" style="padding: 15px 15px 10px 15px; border-radius: 6px ">
                 <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <h5>Add your comments: </h5>
                            <p style="color:red"><?php echo form_error('comment'); ?></p>
                            <input name="comment" type="text" class="form-control span7" placeholder="Your comments here" 
                           				 value="<?php echo set_value('comment'); ?>"/>
                           	
                           	
                        </div>
                        
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <h5>Add your rate(1-5):  </h5>
                            <p style="color:red"><?php echo form_error('comment'); ?></p>
                            <input name="rate" class="form-control span7" placeholder="Your rate here" 
                           				 value="<?php echo set_value('rate'); ?>"/>
                           	                        	
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                           <input type="submit" value="Submit" class="btn span7"/>
                        </div>
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