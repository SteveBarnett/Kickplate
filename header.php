<?php
/**
 * @package kickplate
 */

?><!DOCTYPE html>
<html class="" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="apple-touch-icon" href="apple-touch-icon.png">
 <!-- Place favicon.ico in the root directory -->

<?php wp_head(); ?>

<?php /*
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
  WebFont.load({
    google: {
      families: ['Open Sans:400,700']
    },
    timeout: 2000
  });
</script>
*/ ?>

</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kickplate' ); ?></a>

	<header id="top" role="banner">
			<?php
			if ( is_front_page() && is_home() ) : ?>
  				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  			<?php else : ?>
  				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

		  <p class="site-description"><?php echoget_bloginfo( 'description', 'display' ); ?></p>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="menu" class="nav-main" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #nav-main -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<main id="content">
