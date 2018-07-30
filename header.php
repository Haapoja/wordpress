<!DOCTYPE html>
<html <?php language_attributes(); ?>><!-- specify language -->


<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width-device-width">
	<title>
		<?php bloginfo("name");?>
	</title>
	<?php wp_head();?><!-- plugins and wordpress use this function to insert crucial elements into the document (scripts,styles,meta tags)  -->
	
</head>
</header>


<body <?php body_class();?>>
	<div class="container">
		<!-- site header -->
		<header class="site-header">
			<!-- site search -->
			<div class="header-search">

			</div>
			<h1 >
				<a class="head1" href="<?php echo home_url();?>">
					<?php bloginfo("name");?>
				</a>
			</h1>
			<h5>
                <?php bloginfo("description");?>
                <?php if(is_page(17)){ ?>
                   -  burn the heretic
            <?php  }?>
            </h5>
           

			<nav class="site-nav">

              <?php
              $args = array(
                  "theme_location" => "primary"
               )
              
              ?>

         <?php wp_nav_menu($args);?> <!--same as having ul, and li elements inside the nav element -->

			</nav>
		</header>
		<!--/site header -->