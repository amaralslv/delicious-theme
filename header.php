<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Delicious
 */

$default_logo = get_template_directory_uri() .'/assets/images/logo.png';
$custom_logo_id = get_theme_mod( 'custom_logo', $default_logo );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );


?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() .'/assets/font-awesome/css/font-awesome.min.css'?>">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'delicious' ); ?></a>

	<header id="masthead" class="site-header">
	
		<a href="<?php echo get_bloginfo('url')?>">
		<div class="site-branding" style="background-image: url('<?php if (!empty($custom_logo_id)) { echo $image[0] ; } else{ echo $default_logo; } ?>');">
			<!--<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
			-->
		</div><!-- .site-branding -->
		</a>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<i class="fa fa-bars" aria-hidden="true" style="
    font-size: 35px;
"></i>
			MENU

			<?php esc_html_e( '', 'delicious' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->

	<div id="main-content" class="site-content">

	<?php 
	if (is_front_page()) {
	  get_template_part('sections-home/main','page');
    }