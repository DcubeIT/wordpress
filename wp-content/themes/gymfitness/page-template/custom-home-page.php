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
                <a class="read-more" href="<?php echo esc_url($vw_fitness_slidelink[$vw_fitness_k] ); ?>"><?php esc_html_e( 'Learn More','gymfitness' ); ?></a>
              </div>
            </div>
          </div>
            <?php $vw_fitness_k++;
          wp_reset_postdata();
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
    for ( $count = 0; $count <= 2; $count++ ) {
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
          <div class="col-md-4 col-sm-4">
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
 <div class="clearfix"></div>


<?php /*--Pricing Plan--*/?>
<secion id="pricing_plans">
  <div class="container">
    <?php if( get_theme_mod( 'gymfitness_pricesec_title')  != '') { ?>
    <h2><?php echo esc_html(get_theme_mod('gymfitness_pricesec_title',__('CHECK OUT PRICING PLANS','gymfitness'))); ?></h2>
    <?php }?>
    <div class="plans-box">
      <?php
      $number=get_theme_mod('gymfitness_pricing_number', 4);?>
      <div class="row">
        <?php 
          for ($i=1; $i<=4; $i++) {
            if ( get_theme_mod('gymfitness_pricing_number'.$i, true) != "" ) { ?>
            <div <?php if($number == 1){ echo ' class="col-md-12"'; } elseif($number == 2) { echo 'class="col-md-6 col-sm-6"'; } elseif($number == 3) { echo 'class="col-md-4 col-sm-4"';  } else { echo 'class="col-md-3 col-sm-6"'; } ?>>
              <?php if( get_theme_mod( 'gymfitness_price_value'.$i)  != '') { ?>
              <div class="price-box">                
                <div class="price-number"><?php echo esc_html(get_theme_mod('gymfitness_price_value'.$i,__('$29','gymfitness'))); ?> </div>
                <?php }?>
                <?php if( get_theme_mod( 'gymfitness_price_title'.$i)  != '') { ?>
                <div class="price-title"><?php echo esc_html(get_theme_mod('gymfitness_price_title'.$i,__('1 Month','gymfitness'))); ?> </div>
                <?php }?>
                <div class="box-content text-center">
                  <?php if( get_theme_mod( 'gymfitness_price_subcontent'.$i)  != '') { ?>
                  <p><?php echo esc_html(get_theme_mod('gymfitness_price_subcontent'.$i,__('Lorem Ipsum is simply dumy','gymfitness')));?></p>
                  <?php }?>
                  <?php if( get_theme_mod( 'gymfitness_price_subcontent1'.$i)  != '') { ?>
                  <p><?php echo esc_html(get_theme_mod('gymfitness_price_subcontent1'.$i,__('Lorem Ipsum is simply dumy','gymfitness')));?></p>
                  <?php }?>
                  <?php if( get_theme_mod( 'gymfitness_price_subcontent2'.$i)  != '') { ?>
                  <p><?php echo esc_html(get_theme_mod('gymfitness_price_subcontent2'.$i,__('Lorem Ipsum is simply dumy','gymfitness')));?></p>
                  <?php }?>
                  <?php if( get_theme_mod( 'gymfitness_price_subcontent3'.$i)  != '') { ?>
                  <p><?php echo esc_html(get_theme_mod('gymfitness_price_subcontent3'.$i,__('Lorem Ipsum is simply dumy','gymfitness')));?></p>
                  <?php }?>
                  <?php if( get_theme_mod( 'gymfitness_price_subcontent4'.$i)  != '') { ?>
                  <p><?php echo esc_html(get_theme_mod('gymfitness_price_subcontent4'.$i,__('Lorem Ipsum is simply dumy','gymfitness')));?></p>
                  <?php }?>
                  <div class="clearfix"></div>
                </div>                
                <div class="read-moresec text-center">
                  <?php if( get_theme_mod('gymfitness_sign-up_link'.$i) != ''){ ?>
                  <div class="wow bounceInUp"><a class="r_button"  href="<?php echo esc_url(get_theme_mod('gymfitness_sign-up_link'.$i,'#')); ?>"><?php echo esc_html(get_theme_mod('gymfitness_sign-up_button_text'.$i,'SIGN UP NOW')); ?></a></div>
                  <?php } ?>
                </div>                
                <div class="clearfix"></div>
              </div>
            </div>
            <?php  if($number%$i == 0){'<div class="clearfix"></div>'; }
            }
          }
        ?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</secion>
 <div class="clearfix"></div>



<?php get_footer(); ?>