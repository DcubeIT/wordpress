<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php /** slider section **/ ?>
  <?php
    // Get pages set in the customizer (if any)
    $pages = array();
    for ( $count = 1; $count <= 5; $count++ ) {
    $mod = absint( get_theme_mod( 'vw_fitness_slidersettings-page-' . $count ));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }
    }
    if( !empty($pages) ) :
      $args = array(
        'posts_per_page' => 5,
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 1;
        ?>
      <div class="slider-main">
          <div id="slider" class="nivoSlider">
            <?php
              $vw_fitness_n = 0;
          while ( $query->have_posts() ) : $query->the_post();
            
            $vw_fitness_n++;
            $vw_fitness_slideno[] = $vw_fitness_n;
            $vw_fitness_slidetitle[] = get_the_title();
            $vw_fitness_slidelink[] = esc_url(get_permalink());
            ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $vw_fitness_n ); ?>" />
            <?php
          $count++;
          endwhile;
            ?>
          </div>

        <?php
        $vw_fitness_k = 0;
          foreach( $vw_fitness_slideno as $vw_fitness_sln ){ ?>
          <div id="slidecaption<?php echo esc_attr( $vw_fitness_sln ); ?>" class="nivo-html-caption">
            <div class="slide-cap  ">
              <div class="container">
                <h2><?php echo esc_html($vw_fitness_slidetitle[$vw_fitness_k] ); ?></h2>
                <a class="read-more" href="<?php echo esc_url($vw_fitness_slidelink[$vw_fitness_k] ); ?>"><?php esc_html_e( 'Learn More','vw-fitness' ); ?></a>
              </div>
            </div>
          </div>
            <?php $vw_fitness_k++;
        } ?>
      </div>
        <?php else : ?>
          <div class="header-no-slider"></div>
        <?php
      endif;
    endif;
  ?>

<?php /*--OUR SERVICES--*/?>
<section id="our-services">    
    <div class="container">
    <?php $pages = array();
    for ( $count = 0; $count <= 3; $count++ ) {
      $mod = intval( get_theme_mod( 'vw_fitness_servicesettings-page-' . $count ));
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
    }
    if( !empty($pages) ) :
      $args = array(
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 0;
        while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="col-md-3 col-sm-3">
            <div class="service-main-box">
                <div class="row fit-title-box text-center">
                  <h4><?php the_title(); ?></h4>                    
                </div>
                <div class="box-content text-center">
                    <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                    <p><?php the_excerpt(); ?></p>                  
                    <div class="clearfix"></div>                   
                </div>
            </div>
          </div>
        <?php $count++; endwhile; 
        wp_reset_postdata();?>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
    endif;?>
      <div class="clearfix"></div>
  </div> 
</section>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>