<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pbazawule2k16
 */

get_header(); ?>

		<!-- #main -->
		<main id="main" class="site-main" role="main">

		<?php

		// Start the loop.
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			// share
			if ( function_exists( 'sharing_display' ) ) echo sharing_display();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// nav
			the_post_navigation();

		endwhile;
		// End the loop.
		?>

		</main>

<?php
get_sidebar();
get_footer();
