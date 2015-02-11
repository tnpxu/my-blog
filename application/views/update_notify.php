<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>TNPXU</title>
		<link href="<?php echo base_url(); ?>/public/css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/public/images/logo1.png" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		
		<script src="<?php echo base_url(); ?>/public/js/jquery.min.js"></script>
        
         <script type="text/javascript">
			var $ = jQuery.noConflict();
				$(function() {
					$('#activator').click(function(){
						$('#box').animate({'top':'0px'},500);
					});
					$('#boxclose').click(function(){
					$('#box').animate({'top':'-700px'},500);
					});
				});
				$(document).ready(function(){
				//Hide (Collapse) the toggle containers on load
				$(".toggle_container").hide(); 
				//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
				$(".trigger").click(function(){
					$(this).toggleClass("active").next().slideToggle("slow");
						return false; //Prevent the browser jump to the link anchor
				});
									
			});
		</script>
        
	</head>
	<body>
		
			<div class="header">
				<div class="wrap">
				<div class="logo">
					<a href="<?php echo base_url(); ?>main"><img src="<?php echo base_url(); ?>/public/images/logo2.png" title="TNPXU" /></a>
				</div>
				<div class="nav-icon">
					 <a href="#" class="right_bt" id="activator"><span> </span> </a>
				</div>
				 <div class="box" id="box">
					 <div class="box_content">        					                         
						<div class="box_content_center">
						 	<div class="form_content">
								<div class="menu_box_list">
									<ul>
										<li><a href="<?php echo base_url(); ?>main"><span>Home</span></a></li>
										<li><a href="<?php echo base_url(); ?>main/about"><span>About</span></a></li>
										<li><a href="<?php echo base_url(); ?>main/update"><span>Update</span></a></li>
										
										<div class="clear"> </div>
									</ul>
								</div>
								<a class="boxclose" id="boxclose"> <span> </span></a>
							</div>                                  
						</div> 	
					</div> 
				</div>       	  
				<div class="top-searchbar">
					<?=form_open('main/search');?>
					<?php
                		$data = array(
                    	'name'  => 'search',
                    	'id'    => 'search',
                    	'placeholder' => 'searching Type of Blog i.e. movie',
                    	'size'  => '90',                   	         
                	);
                	echo form_input($data);
                	?>
                	<?php
                		$data = array(
                    	'value' => ' ',
                	);
                	echo form_submit($data);
                	?>
					
					<?=form_close();?>
				</div>
				<div class="userinfo">
					<div class="user">
						<ul>
							<li><a href="#"><img src="<?php echo base_url(); ?>/public/images/me.jpg" title="me" /><span>สวัสดีครับ!!</span></a></li>
						</ul>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<!---//End-header-->
		<!---start-content-->
		<div class="content">
			<div class="wrap">
			<div class="single-page">
				<!-- start form -->
				<div class='table-form'>

					<label><strong><?=$notify_message;?></strong></label><br>
								
					
				
        		</div>
					        
				<!---//End-form-section-->
			</div>
			</div>
		</div>
		<!---start-footer-->
		<div class="footer">
			<p>Log in <a href="<?php echo base_url(); ?>main/login">Here</a></p>
		</div>
		<!---//End-footer-->
		<!---//End-wrap-->
	</body>
</html>

