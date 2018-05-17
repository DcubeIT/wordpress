<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pro Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( !is_single() && has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) { ?>
		<div class="post-img">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pro-blog-thumb'); ?></a>
       </div>
       <?php
    } 
	?>
	<div class="post-content">
		<header class="entry-header">

			<?php
			if( is_sticky() && is_home() )  :	
			$featured = esc_attr__('Featured', 'pro-blog' );
			echo '<span class="featured-post">' . $featured . '</span>';
			endif;
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; 

			$cat_meta = pro_blog_customizer_option( 'category_meta' );
			 
			if ( ( 'post' === get_post_type() ) && ( 1 === absint( $cat_meta ) ) ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'pro-blog' ) );

				if ( $categories_list && pro_blog_categorized_blog() ) {
					printf( '<span class="cat-links">%s</span>', $categories_list ); // WPCS: XSS OK.
				}

			}?>
			<span class="separator"><?php echo esc_html__( ' / ', 'pro-blog' ); ?></span>
			<?php
			$author_meta 	= pro_blog_customizer_option( 'author_meta' );
			$date_meta 		= pro_blog_customizer_option( 'date_meta' ); 

			if( 1 === absint( $author_meta ) || 1 === absint( $date_meta ) ){ ?>

				<div class="post-info">
					<?php if( 1 === absint( $author_meta ) ){ ?>
						<span class="author vcard"><a  href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
					<?php } ?>

					<?php if( 1 === absint( $author_meta ) && 1 === absint( $date_meta ) ){ ?>
						<span class="separator"><?php echo esc_html__( ' / ', 'pro-blog' ); ?></span>
					<?php } ?>
				
					<?php if( 1 === absint( $date_meta ) ){ ?>
						<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
					<?php } ?>
				</div><!-- .post-info -->

			<?php } ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				
				if( is_single() ){

					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pro-blog' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pro-blog' ),
						'after'  => '</div>',
					) );

				} else{

					the_excerpt();
					
				}
				
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
