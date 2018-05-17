<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>		 
	
	 <div class="main-head">
	
	<?php $top_bar = pro_blog_customizer_option( 'top_bar' ); ?>
	<?php if( $top_bar == true) : ?>
	<div class="top-bar row">
		<div class="container">
		<div style=" float:left; " class="main-nav col-md-9">
			<ul class="nav navbar-nav">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'top-bar-menu',
					'container'       => '',
   					'container_class' => 'menu-{menu slug}-container',
   					'container_id'    => '',
				    'menu_class'      => 'menu',
				    'menu_id'         => '',
				    'echo'            => true,
				    'fallback_cb'     => 'false',
				    'before'          => '',
				    'after'           => '',
				    'link_before'     => '',
				    'link_after'      => '',
				    'items_wrap'      => '%3$s',
				    'depth'           => 0,
				    'walker'          => ''
				) );
			?>
			</ul>
		</div>
		<div style=" float:right; " class="menu-widget-area col-md-3">
			<?php dynamic_sidebar('topbarwidget'); ?>
		</div>
		</div>
	</div><!-- .top-bar -->
	<?php endif; ?>

	<div class="head container">

	   	<?php $nav_layout = pro_blog_customizer_option( 'nav_layout' ); ?>	
		<?php if( $nav_layout == 'center') : ?> <div class="brand-center">
	    <?php elseif( $nav_layout == 'left') : ?> <div class="brand-left col-md-4"> <?php endif; ?>
	   
		    <?php the_custom_logo(); ?>
		    <h1 class="title"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		     <?php
				$description = get_bloginfo( 'description', 'display' );

				if ( $description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $description; ?></p> 
			<?php endif; ?>
  
		</div>
  		
  		  <?php if( $nav_layout == 'center') : ?> <nav id="site-navigation" class="main-nav primary navbar navbar-inverse">
  		  <?php elseif( $nav_layout == 'left') : ?> <nav id="site-navigation" class="main-nav col-md-8 left primary navbar navbar-inverse"> <?php endif; ?>	  
		  <div class="container-fluid">
		    <div class="navbar-header ">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		      </button>	

			</div>	
			
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		      	
		        <?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'       => '',
	   					'container_class' => 'menu-{menu slug}-container',
	   					'container_id'    => '',
					    'menu_class'      => 'menu',
					    'menu_id'         => '',
					    'echo'            => true,
					    'fallback_cb'     => 'false',
					    'before'          => '',
					    'after'           => '',
					    'link_before'     => '',
					    'link_after'      => '',
					    'items_wrap'      => '%3$s',
					    'depth'           => 0,
					    'walker'          => ''
					) );
				?>
					
		      </ul>
		    
		    </div>
		  </div>

		</nav> 
		</div><!-- .brand -->
		</div><!-- .head container -->
	</header><!-- #masthead -->
	</div><!-- .main-head -->

	<?php $site_layout = pro_blog_customizer_option( 'site_layout' ); ?>	
	<?php if( $site_layout == 'full') : ?> <div id="content" class="site-content container">
	<?php elseif( $site_layout == 'box') : ?> <div id="content" class="site-content wrap container"> <?php endif; ?>	

		<?php if(has_header_image()) : if ( is_home() ) :?>
			<div id="masthead">
				<img class="header" src="<?php echo esc_url(get_header_image()); ?>" >			
			</div>
		<?php endif; endif;?>
