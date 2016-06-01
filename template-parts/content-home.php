<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pbazawule2k16
 */

?>

<!-- .entry-content -->
<div class="entry-content">
	<?php 
		// The Query
		$query_posts = new WP_Query(array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => -1));

			if ( $query_posts->have_posts() ) : ?>

			<!-- The Loop -->
			<?php while ( $query_posts->have_posts() ) : $query_posts->the_post(); ?>
				<div class="post <?php foreach(get_the_category() as $category) { echo $category->slug . ' ';} ?>">
					<a href="<?php the_permalink(); ?>">
						<span class="post_meta">
							<span class="post_title item"><?php the_title(); ?><span class="post_date"><?php the_time('M d'); ?></span></span>
							<!-- <span class="post_category"><?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory; ?></span> -->
						</span>
					</a>
					<span class="post_thumb moon"><?php the_post_thumbnail(); ?></span>
				</div>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<!-- Reset Query -->
			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
</div>

<!-- .entry-footer -->
<footer class="entry-footer">
	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'pbazawule2k16' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
</footer>