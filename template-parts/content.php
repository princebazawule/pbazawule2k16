<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pbazawule2k16
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php pbazawule2k16_posted_on(); ?>, <?php pbazawule2k16_entry_footer(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<!-- heading -->
	<span class="single_thumb aligncenter center-align"><?php the_post_thumbnail(); ?></span>

	<!-- content -->
	<div class="entry-content">
		<?php

			// remove share from default location
			remove_filter( 'the_content', 'sharing_display', 19 );
  			remove_filter( 'the_excerpt', 'sharing_display', 19 );

			// content
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pbazawule2k16' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pbazawule2k16' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<!-- ?php pbazawule2k16_entry_footer(); ? -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
