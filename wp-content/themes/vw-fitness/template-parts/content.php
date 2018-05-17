<?php
/**
 * The template part for displaying slider
 *
 * @package VW Fitness
 * @subpackage vw_fitness
 * @since 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="page-box">
    <h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title();?></a></h4>
    <div class="metabox">
      <span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span>
      <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
      <span class="entry-comments"> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
    </div><!-- metabox -->
    <div class="box-image">
      <?php 
          if(has_post_thumbnail()) {
           the_post_thumbnail(); 
          }
        ?>
    </div>
    <p><?php the_excerpt();?></p>
    <div class="clearfix"></div>
  </div>
</div>