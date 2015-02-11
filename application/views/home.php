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
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
		<!-- Global CSS for the page and tiles -->
  		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/main.css">
  		<!-- //Global CSS for the page and tiles -->
		<!---start-click-drop-down-menu-->
		<script src="<?php echo base_url(); ?>/public/js/jquery.min.js"></script>
        <!--start-dropdown-->
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
        <!---//End-dropdown-->
		<!--//End-click-drop-down-menu-->
	</head>
	<body>
		<!---start-wrap-->
			<!---start-header-->
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
			 <div id="main" role="main">
			      <ul id="tiles">
			        <!-- These are our grid blocks -->
			        
			        <?php if($blog > 0 ) { foreach ($blog as $value) { ?>
			        <?php 
			        	$i = $value['id']; 
			        	$path = base_url();
			        	$full_path = $path . "main/show_blog/" . $i;	
			        ?>
			        <li onclick="location.href='<?php echo $full_path; ?>';">
			        	<img
			        	<?php if($value['img_path'] == NULL)
			        	{	
			        		
			        		switch($value['type'])
			        		{
			        			case "miscellaneous" : $default_path = "miscellaneous.jpg"; $default_width = "282"; $default_height = "150"; break;
			        			case "movie" : $default_path = "movie.png"; $default_width = "282"; $default_height = "280"; break;
			        			case "travel" : $default_path = "travel.png"; $default_width = "280"; $default_height = "250"; break;
			        			case "food" : $default_path = "food.png"; $default_width = "280"; $default_height = "180"; break;
			        		}
			        	}
			        	else
			        	{
			        		$default_path = $value['img_path'];
			        		switch($value['type'])
			        		{
			        			case "miscellaneous" : $default_width = "282"; $default_height = "150"; break;
			        			case "movie" : $default_width = "282"; $default_height = "210"; break;
			        			case "travel" : $default_width = "282"; $default_height = "250"; break;
			        			case "food" : $default_width = "282"; $default_height = "280"; break;
			        		}
			        	}
			        	?> 
			        	src="<?php echo base_url(); ?>/public/images/<?php echo $default_path;?>" 
			        	width="<?php echo $default_width; ?>" 
			        	height="<?php echo $default_height; ?>"
			        	>
			        	<div class="post-info">
			        		<div class="post-basic-info">
				        		<h3><a href="#"><?= $value['subject'] ;?></a></h3>
				        		<span><a href="#"><label> </label><?= $value['type'] ;?></a></span>
				        		<p style="word-wrap: break-word;"><?php 
				        		if(strlen($value['message']) < 40)
				        		{
				        			echo $value['message'];
				        		}				  
				        		else
				        		{
				        			echo substr($value['message'],0,200);
				        		}
				        		?></p>
			        		</div>
			        		<div class="post-info-rate-share">
			        			<div class="rateit"><a href="<?php echo base_url() . 'main/edit/' . $value['id'];?>"><img src="<?php echo base_url(); ?>/public/images/edit.png" title="Edit" /></a></div>
								<div class="post-share"><a href="<?php echo base_url() . 'main/delete/' . $value['id'];?>"><img src="<?php echo base_url(); ?>/public/images/delete.png" title="Delete" /></a></div>
								<div class="clear"> </div>
			        		
			        	</div>
			        </li>
			        <?php } } ?>
			        
			        
			        
			        <!-- End of grid blocks -->
			      </ul>
			    </div>
			</div>
		</div>
		<!---//End-content-->
		<!--wookmark-scripts-->
		  <script src="<?php echo base_url(); ?>/public/js/jquery.imagesloaded.js"></script>
		  <script src="<?php echo base_url(); ?>/public/js/jquery.wookmark.js"></script>
		  <script type="text/javascript">
		    (function ($){
		      var $tiles = $('#tiles'),
		          $handler = $('li', $tiles),
		          $main = $('#main'),
		          $window = $(window),
		          $document = $(document),
		          options = {
		            autoResize: true, // This will auto-update the layout when the browser window is resized.
		            container: $main, // Optional, used for some extra CSS styling
		            offset: 35, // Optional, the distance between grid items
		            itemWidth:280 // Optional, the width of a grid item
		          };
		      /**
		       * Reinitializes the wookmark handler after all images have loaded
		       */
		      function applyLayout() {
		        $tiles.imagesLoaded(function() {
		          // Destroy the old handler
		          if ($handler.wookmarkInstance) {
		            $handler.wookmarkInstance.clear();
		          }
		
		          // Create a new layout handler.
		          $handler = $('li', $tiles);
		          $handler.wookmark(options);
		        });
		      }
		      /**
		       * When scrolled all the way to the bottom, add more tiles
		       */
		      
		
		      // Call the layout function for the first time
		      applyLayout();
		
		      // Capture scroll event.
		      $window.bind('scroll.wookmark', onScroll);
		    })(jQuery);
		  </script>
		<!--//wookmark-scripts-->
		<!--start-footer-->
		<div class="footer">
			<p>Log in<a href="<?php echo base_url(); ?>main/login"> Here</a></p>
		</div>
		<!--//End-footer-->
		<!--//End-wrap-->
	</body>
</html>

