<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pro Blog
 */

get_header(); 
?>

<div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-lg-12 col-md-12"; } else { echo "col-lg-9 col-md-9"; } ?>" id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; ?>

	</main><!-- #main -->
	
</div><!-- #primary -->
	
<?php
	
get_sidebar();
get_footer();
