<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pranayama_yoga
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      
    <?php 
    /**
     * Before Page entry content
     * 
     * @hooked pranayama_yoga_post_content_image - 10
     * @hooked pranayama_yoga_post_entry_header  - 20 
    */
    do_action( 'pranayama_yoga_before_post_entry_content' );    
    ?>

	<div class="entry-content">
		<?php		
    		the_content( sprintf(
    			/* translators: %s: Name of current post. */
    			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pranayama-yoga' ), array( 'span' => array( 'class' => array() ) ) ),
    			the_title( '<span class="screen-reader-text">"', '"</span>', false )
    		) );
    	
    		wp_link_pages( array(
    			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pranayama-yoga' ),
    			'after'  => '</div>',
    		) );
		?>
	</div><!-- .entry-content -->
    
    <footer class="entry-footer">
		<?php pranayama_yoga_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
