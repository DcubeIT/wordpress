<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pro Blog
 */

get_header(); 
?>

<div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-lg-12 col-md-12"; } else { echo "col-lg-9 col-md-9"; } ?>" id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'single' );

		do_action( 'pro_blog_related_post' );

		do_action( 'pro_blog_author_info' );

		//Load up the navigation function if it is enabled.
		$show_nav = pro_blog_customizer_option( 'show_post_nav' );

		if ( 1 == $show_nav ) :
			the_post_navigation();
		endif;

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
