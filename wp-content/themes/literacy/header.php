 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Literacy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>		
		<div id="topbar">
			<div class="container">	
            <?php $hidecontact = get_theme_mod('hide_contact', '1'); ?>	
            <?php if($hidecontact == '') { ?>		
				<div class="top-left">
					<p><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('email_text','info@sitename.com')); ?>"><?php echo esc_attr(get_theme_mod('email_text','info@sitename.com')); ?></a></p>
                   
                    <p><i class="fa fa-phone"></i><?php echo esc_html(get_theme_mod('call_text','(00) 123 456 7890')); ?></p>
				</div><!-- top-left -->
                <?php } ?>
				
				<div class="top-right">
						<?php wp_nav_menu( array('theme_location'  => 'top', 'fallback_cb' => false) ); ?>
				</div><!-- top-right --><div class="clear"></div>
			</div>			
		</div>		
		
		<div id="header">
            <div class="container">	
						<div class="logo">
							<?php literacy_the_custom_logo(); ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p><?php echo $description; ?></p>
					<?php endif; ?>
						</div>
                  
						<div class="toggle">
							<a class="toggleMenu" href="#"><?php _e('Menu','literacy'); ?></a>
						</div> 						
						<div class="main-nav">
							<?php wp_nav_menu( array('theme_location'  => 'primary', 'fallback_cb' => false) ); ?>							
						</div>						
						<div class="clear"></div>				
            </div><!-- container -->               
		</div><!-- header -->
	
    <?php $hideannouncement = get_theme_mod('hide_announcement', '1'); ?>	
            <?php if($hideannouncement == '') { ?>
    <?php if((get_theme_mod('anntext_left',true) && get_theme_mod('anntext_right',true)) != '') { ?>
		<div id="current">
        	<div class="shaper"></div>
                <div class="container">
                	<div class="handler">
                    	<div class="current-inner">
                    		<div class="current-left">
                            	<h3><?php echo esc_html(get_theme_mod('anntext_left',__('University exam start  from March 10, 2016','literacy'))); ?></h3>
                            </div><!-- current-left -->
                            
                            <div class="current-right">
                            	<h3><?php echo esc_html(get_theme_mod('anntext_right',__('Admission Open for 2016','literacy'))); ?></h3>
                            </div><!-- current-right -->
                            <div class="clear"></div>
                        </div><!-- current-inner -->
                    </div><!-- handler -->                    
                </div><!-- container -->
		</div><!-- current -->
        <?php } } ?>
        
		
<?php if ( is_front_page() && !is_home() ) { ?>
	<?php $hideslide = get_theme_mod('hide_slider', '1'); ?>
		<?php if($hideslide == ''){ ?>
                <!-- Slider Section -->
                <?php for($sld=7; $sld<10; $sld++) { ?>
                	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
                	<?php $slidequery = new WP_query('page_id='.esc_attr(get_theme_mod('page-setting'.$sld,true))); ?>
                	<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
                			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                			$img_arr[] = $image;
               				$id_arr[] = $post->ID;
                		endwhile;
                	}
                }
                ?>
<?php if(!empty($id_arr)){ ?>
        <div id="slider" class="nivoSlider">
            <?php 
            $i=1;
            foreach($img_arr as $url){ ?>
            <?php if(!empty($url)){ ?>
            <img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" />
            <?php }else{ ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/default-slide.jpg" title="#slidecaption<?php echo $i; ?>" />
            <?php } ?>
            <?php $i++; }  ?>
        </div>   
<?php 
	$i=1;
		foreach($id_arr as $id){ 
		$title = get_the_title( $id ); 
		$post = get_post($id); 
		$content = wp_trim_words( get_the_content(), 40, '...' ); 
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
    <div class="top-bar">
    	<h2><?php echo $title; ?></h2>
    	<p><?php echo $content; ?></p>
    	<a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('slidelinktext',__('Read More','literacy'))); ?></a>
    </div>
</div>      
    <?php $i++; } ?>       
     </div>
<div class="clear"></div>        
</section>
<?php wp_reset_postdata(); ?>
<?php } else { ?>
<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
    <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" />
    <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" />
    <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" />
    </div>                    
      <div id="slidecaption1" class="nivo-html-caption">
        <div class="top-bar">
                <h2><?php esc_html_e('Welcome to Literacy.','literacy'); ?></h2>
                <p><?php esc_html_e('Our number one goal is to make sure every one of our patients leaves 100% happy 
and with a bright, white smile on their face!','literacy'); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'literacy');?></a>
        </div>
        </div>
        
        <div id="slidecaption2" class="nivo-html-caption">
            <div class="top-bar">
                   <h2><?php esc_html_e('Knowledge is Power.','literacy'); ?></h2>
                <p><?php esc_html_e('For title, description, image and link go to Pages and add title, description featured image.','literacy'); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'literacy');?></a>
            </div>
        </div>
        
        <div id="slidecaption3" class="nivo-html-caption">
            <div class="top-bar">
                    <h2><?php esc_html_e('Success, Nothing Less.','literacy'); ?></h2>
                <p><?php esc_html_e('For title, description, image and link go to Pages and add title, description featured image.','literacy'); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'literacy');?></a>
            </div>
        </div>
<div class="clear"></div>
<!-- Slider Section -->
<?php } } } ?>

      <div class="main-container">
         <?php if( function_exists('is_woocommerce') && is_woocommerce() ) { ?>
		 	<div class="content-area">
                <div class="middle-align content_sidebar">
                	<div id="sitemain" class="site-main">
         <?php } ?>