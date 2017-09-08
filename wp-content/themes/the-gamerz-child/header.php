<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Gamerz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />
	<link rel="stylesheet" type="text/css" href="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/libraries/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/libraries/font-awesome/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="header">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<?php the_custom_logo(); ?>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				
				<div id="filter-panel" class="filter-panel header-panel">
				    <div class="panel panel-default">
				        <div class="panel-body">
				            <form class="form-inline col-xs-8 col-sm-8 col-md-8 col-lg-8" role="form">
				                <div class="form-group">
				                    <input type="text" class="form-control input-sm" id="pref-search" placeholder="search">
				                </div>
				                <div class="form-group header-select">
				                    <select id="pref-orderby" class="form-control">
				                        <option>MAIN CATEGORY</option>
				                        <option>first</option>
				                        <option>second</option>
				                    </select>
				                </div>
				                <div class="form-group header-select">
				                    <select id="pref-orderby" class="form-control">
				                        <option>SUB CATEGORY</option>
				                        <option>first sub</option>
				                        <option>second sub</option>
				                    </select>
				                </div>
				                <div class="form-group">
				                    <button type="submit" class="btn btn-default filter-col">
				                        <span class="glyphicon glyphicon-search"></span>
				                    </button>  
				                </div>
				            </form>

							<div class="corner-btn col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<a href="#" class="btn btn-default">registeri <i class="fa fa-user-circle" aria-hidden="true"></i></a>
								<a href="#" class="yellow-btn btn btn-default">+ aggiungi un file</a>
							</div>

				        </div>
				    </div>
				</div>

			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix top-both-menu">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 game-menu">
			<?php
				wp_nav_menu( array(
					'menu' => 'Header Game menu',
					'items_wrap' => game_menu_wrap()
				) );
			?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 magazine-menu">
			<?php
				wp_nav_menu( array(
					'menu' => 'Header Magazine menu',
					'items_wrap' => magazine_menu_wrap()
				) );
			?>
			</div>
		</div>

	</header><!-- /header -->


	<?php /* <header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'the-gamerz' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead --> */ ?>

	<div id="content" class="site-content">
