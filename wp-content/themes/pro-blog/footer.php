<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer ">
	<div class="site-info container">

		<?php if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) || is_active_sidebar( 'footer4' ) ) : ?>
			<div class="footer-widget-area col-md-3 fgd1">
				<?php dynamic_sidebar('footer1'); ?>
			</div>		
			<div class="footer-widget-area col-md-3 fgd2">
				<?php dynamic_sidebar('footer2'); ?>
			</div>		
			<div class="footer-widget-area col-md-3 fgd3">
				<?php dynamic_sidebar('footer3'); ?>
			</div>		
			<div class="footer-widget-area col-md-3 fgd4">
				<?php dynamic_sidebar('footer4'); ?>
			</div>
		<?php endif; ?>

		<div class="clearfix"></div>
        
        <?php $copyright = pro_blog_customizer_option('copyright');

        if( !empty( $copyright )){ ?>

        <div class="copyright-text container">

        	<?php echo wp_kses_data( $copyright ); ?>

        	<?php } 

        else{ 
			/* translators: 1: name of theme, 2: Link of author */
            printf( esc_html__( '%1$s by %2$s', 'pro-blog' ), '<a href="'.esc_url(home_url()).'">'.esc_attr(get_bloginfo( "name" )).'</a>', '<a href="'.esc_url('http://moazirfan.com').'" target="_blank">Moaz Irfan</a>'); 
		 	} ?> 

    	</div><!-- .copyright-text -->

	</div><!-- .site-info -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
