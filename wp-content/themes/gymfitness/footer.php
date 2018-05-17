<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Fitness
 */
?>

        <div class="footersec">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <?php dynamic_sidebar('footer-1');?>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <?php dynamic_sidebar('footer-2');?>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <?php dynamic_sidebar('footer-3');?>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <?php dynamic_sidebar('footer-4');?>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrapper">
        	<div class="container">
                <div class="clear"></div> 
                <div class="copyright">
                   <p><?php echo esc_html(get_theme_mod('vw_fitness_footer_copy',__('Powered By','gymfitness'))); ?> <?php echo esc_html(gymfitness_credit(),'gymfitness'); ?></p>
                </div>
            </div>
        </div>
<?php wp_footer(); ?>

</body>
</html>