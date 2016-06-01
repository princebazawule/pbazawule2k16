<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pbazawule2k16
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- Favicon -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Analytics inclusion -->

<?php include_once("analyticstracking.php") ?>

<!-- #page -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'pbazawule2k16' ); ?></a>

	<!-- #masthead -->

	<header id="masthead" class="site-header page-item center-align" role="banner">

		<div class="header-content scrolling">

			<!-- Avatar -->

			<?php $query = new WP_Query("page_id=2");
	    	while ($query->have_posts()) : $query->the_post();
	    	$do_not_duplicate = $post->ID; ?>

				<?php if( get_field( "avatar" ) ): ?>
					<span class="avatar center-align item"><img src="<?php the_field('avatar'); ?>" /></span>
				<?php endif;?>

			<?php endwhile; ?>

			<!-- .site-branding -->

			<div class="site-branding center-align item">
				<?php

				// site title
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif; ?>


				<!-- site bio -->
				<div class="site-description">
				  <input type="checkbox" class="read-more-state" id="post-1" />

				  <div class="read-more-wrap">

				  <!-- visible text -->
				  	<p class="description-p">
					  	<?php $description = get_bloginfo( 'description', 'display' ); 
					  	
					  	if ( $description || is_customize_preview() ) : 
					  		echo $description; 
					  	endif; ?>
				  	</p>

				  	<!-- read more prompt -->
				  	<span class="read-more-target">

					  	<!-- hidden text -->
					  	<?php $query = new WP_Query("page_id=2");
					    	while ($query->have_posts()) : $query->the_post();
						    	$do_not_duplicate = $post->ID; 

						    	if( get_field( "biography" ) ):
									the_field('biography');
								endif;
							endwhile; ?>
				  	</span>

				  </div>
				  
				  <label for="post-1" class="read-more-trigger">
				  	<div class="spinner">
					  <div class="spinner__item1"></div>
					  <div class="spinner__item2"></div>
					  <div class="spinner__item3"></div>
					</div>
				  </label>
				</div>
			</div>

			<!-- social links -->

			<?php $query = new WP_Query("page_id=2");
	    	while ($query->have_posts()) : $query->the_post();
	    	$do_not_duplicate = $post->ID; ?>

				<ul id="social-icons">

					<!-- twitter -->
					<?php if( get_field( "twitter" ) ): ?>
						<li>
							<a href="https://twitter.com/<?php the_field('twitter'); ?>"" title="link to twitter" target="_blank">
								<span class="icon-twitter social-icon"></span>
								<span class="mls">Twitter</span>
							</a>
						</li>
					<?php endif;?>

					<!-- github -->
					<?php if( get_field( "github" ) ): ?>
						<li>
							<a href="https://github.com/<?php the_field('github'); ?>" title="link to github" target="_blank">
								<span class="icon-github social-icon" ></span>
								<span class="mls">Github</span>
							</a>
						</li>
					<?php endif;?>

					<!-- dribbble -->
					<?php if( get_field( "dribbble" ) ): ?>
						<li>
							<a href="http://www.dribbble.com/<?php the_field('dribbble'); ?>" title="link to dribbble" target="_blank">
								<span class="icon-dribbble social-icon" ></span>
								<span class="mls">Dribbble</span>
							</a>
						</li>
					<?php endif;?>

					<!-- linkedIn -->
					<?php if( get_field( "linkedin" ) ): ?>
						<li>
							<a href="http://www.linkedin.com/in/<?php the_field('linkedin'); ?>" title="link to linkedin" target="_blank">
								<span class="icon-linkedin social-icon" ></span>
								<span class="mls">LinkedIn</span>
							</a>
						</li>
					<?php endif;?>

					<!-- mixcloud -->
					<?php if( get_field( "mixcloud" ) ): ?>
						<li>
							<a href="https://www.mixcloud.com/<?php the_field('mixcloud'); ?>" title="link to mixcloud" target="_blank">
								<span class="icon-mixcloud social-icon"></span>
								<span class="mls">Mixcloud</span>
							</a>
						</li>
					<?php endif;?>

					<!-- blog -->
					<?php if( get_field( "blog" ) ): ?>
						<li>
							<a href="<?php the_field('blog'); ?>" title="link to PixlD blog" target="_blank">
								<span class="icon-pixld social-icon"></span>
								<span class="mls">Blog</span>
							</a>
						</li>
					<?php endif;?>

					<!-- mail -->
					<?php if( get_field( "mail" ) ): ?>
						<li>
							<a href="mailto:<?php the_field('mail'); ?>" title="send email" target="_blank">
								<span class="icon-mail social-icon"></span>
								<span class="mls">Email</span>
							</a>
						</li>
					<?php endif;?>
					
					
				</ul>
			<?php endwhile; ?>


			<!-- #site-navigation -->

			<?php if ( is_front_page() ) {
				$categories = get_categories(); ?>
				<nav id="site-navigation" class="main-navigation center-align item" role="navigation">
					<ul id="category-menu">
					    <?php foreach ( $categories as $cat ) { ?>
					    <li id="cat-<?php echo $cat->term_id; ?>"><a href="#" data-filter=".<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
					    <?php } ?>
					</ul>

					<button class="menu-toggle">
						filters
						<div class="spinner">
							<div class="spinner__item1"></div>
							<div class="spinner__item2"></div>
							<div class="spinner__item3"></div>
						</div>
					</button>
				</nav>

			<?php } else { ?>

				<nav id="site-navigation" class="main-navigation center-align item" role="navigation">
					<ul id="category-menu">
					    <li id="back"><a href="http://princebazawule.mamp/" rel="home">back 2 home</a></li>
					</ul>
				</nav>

			<?php } ?>
		</div>
	</header>