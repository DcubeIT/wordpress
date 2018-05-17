<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package GYM Fitness
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
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','gymfitness'); ?></a></div>

<div class="topbar">
  <div class="container">
    <div class="social-media">
      <?php if(esc_url( get_theme_mod( 'vw_fitness_pintrest_url','' ) ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_fitness_pintrest_url','' ) ); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if(esc_url( get_theme_mod( 'vw_fitness_facebook_url','' ) ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_fitness_facebook_url','' ) ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if(esc_url( get_theme_mod( 'vw_fitness_twitter_url','' ) ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_fitness_twitter_url','' ) ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if(esc_url( get_theme_mod( 'vw_fitness_insta_url','' ) ) != '') { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_fitness_insta_url','' ) ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      <?php } ?>
    </div>
    <div class="clearfix"></div>
  </div>  
</div> 
<div id="header">
  <div class="container">
    <div class="col-md-4 col-sm-4">
      <div class="logo">
        <?php if( has_custom_logo() ){ gymfitness_the_custom_logo();
         }else{ ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?> 
          <p class="site-description"><?php echo esc_html($description); ?></p>       
        <?php endif; }?>
      </div>
    </div>
    <div class="col-md-8 col-sm-8">
      <div class="nav">
        <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
      </div>
    </div>
  </div>
</div>