<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Great_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="maincontainer"> 
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'great-theme' ); ?></a>
<header id="masthead" class="site-header" role="banner">
    <div class="headerarea">

       <?php
    // This is not the blog posts index
		// You can upload a custom header and it'll output in a smaller logo size.
		$header_image = get_header_image();

		if ( ! empty( $header_image ) ) { ?>
			
		<?php } else { ?>
			
		<?php } ?>
	<div class="row logo">
        <a href="<?php echo get_site_url(); ?>"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo2.png"></a>
	</div><!-- .site-branding -->
 
</div>
    <div class="small-12 columns show-for-small-only" style="padding:0;">
<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title">Menu</div>
</div>

<div class="top-bar" id="example-menu">
  <div class="top-bar-left">
    <ul class="vertical menu" data-dropdown-menu>
      <?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'menu_id' => 'mobile-menu' ) ); ?>
    </ul>
  </div>
  <div class="top-bar-right">
  </div>
</div>
    </div>
    
       <div class="hide-for-small-only medium-12 large-12 columns mainnav"> 
        <nav id="site-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'great-theme' ); ?></button>
      
	<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'menu_id' => 'top-menu' ) ); ?>

        </nav><!-- #site-navigation -->

        </div>
    </header><!-- #masthead -->

    </header><!-- #masthead -->
	<div id="content" class="site-content">