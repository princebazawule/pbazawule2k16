<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pbazawule2k16
 */

?>
	<!-- #colophon -->

	<footer id="colophon" class="site-footer page-item" role="contentinfo">

		<!-- .site-info -->
		<div class="site-info center-align">
			<span class="sitename"><?php bloginfo( 'name' ); ?></span><span class="sep"> • </span> &copy; <?php echo date("Y") ?></div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
