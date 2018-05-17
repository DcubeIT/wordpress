<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Literacy
 */
?>
        <div class="copyright-wrapper">
        	<div class="inner">
                <div class="copyright">
                	<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <?php echo date_i18n('Y'); ?> | <?php _e('Powered by WordPress.','literacy'); ?></p>
                </div><!-- copyright --><div class="clear"></div>         
            </div><!-- inner -->
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>