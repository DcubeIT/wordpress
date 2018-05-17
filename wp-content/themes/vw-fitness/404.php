<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Fitness
 */

get_header(); ?>
    <div id="content-vw">
        <div class="container">
            <div class="page-content">      
                <div class="col-md-12">
                    <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'vw-fitness' ), esc_html__( 'Not Found', 'vw-fitness' ) ) ?></h1>
                    <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'vw-fitness' ); ?></p>
                    <p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-fitness' ); ?></p>
                    <div class="read-moresec">
                        <div><a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Back to Home Page', 'vw-fitness' ); ?></a></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        <div class="clearfix"></div>
        </div>
    </div>
<?php get_footer(); ?>