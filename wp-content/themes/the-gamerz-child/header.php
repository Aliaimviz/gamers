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
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:100,200,300,400,500,600,700,800,900" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" />
	<link rel="stylesheet" type="text/css" href="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/libraries/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/libraries/font-awesome/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="header" class="clearfix">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 clearfix">
			<div class="col-4 col-sm-12 col-md-4 col-lg-4 logo-img">
				<?php the_custom_logo(); ?>
			</div>
			<div class="col-12 col-sm-12 col-md-8 col-lg-8">
				<div id="filter-panel" class="filter-panel header-panel">
				    <div class="panel panel-default">
				        <div class="panel-body">
				            <form class="col-8 col-sm-12 col-md-7 col-lg-7" role="form">
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
				                <div class="form-group btn-group-right">
				                    <button type="submit" class="btn btn-default filter-col header-btn-icon">
				                        <span class="glyphicon glyphicon-search"></span>
				                    </button>  
				                    <button type="submit" class="btn btn-default filter-col header-btn-search">
				                        <span class="glyphicon glyphicon-search"></span> Search
				                    </button>
				                </div>
				            </form>

							<div class="corner-btn col-12 col-sm-12 col-md-5 col-lg-5">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 register">
									<a href="#" class="btn btn-default">registeri <i class="fa fa-user-circle" aria-hidden="true"></i></a>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0;">
									<a href="#" class="yellow-btn btn btn-default">+ aggiungi un file</a>
								</div>
							</div>
				        </div>
				    </div>
				</div>

			</div>
		</div>

		


		<div id="wrapper">
		        <div class="overlay"></div>
		    
		        <!-- Sidebar -->
		        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
		            <ul class="nav sidebar-nav sidebar-menu">
		               <?php
							$walker = new Nfr_Menu_Walker();
							wp_nav_menu( array(
								'menu' => 'Header Game menu',
								'walker' => $walker
							) );
						?>
						<?php
							wp_nav_menu( array(
								'menu' => 'Header Magazine menu',
								'walker' => $walker
							) );
						?>
		            </ul>
		        </nav>
		        <!-- /#sidebar-wrapper -->

		        <!-- Page Content -->
		        <div id="page-content-wrapper">
		            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
		                <span class="hamb-top"></span>
		    			<span class="hamb-middle"></span>
						<span class="hamb-bottom"></span>
		            </button>
		        </div>
		        <!-- /#page-content-wrapper -->
		    </div>
		    <!-- /#wrapper -->




		<div class="col-12 col-sm-12 col-md-12 col-lg-12 clearfix top-both-menu">
			<div class="col-6 col-sm-12 col-md-12 col-lg-6 game-menu">
			<?php
				$walker = new Nfr_Menu_Walker();
				wp_nav_menu( array(
					'menu' => 'Header Game menu',
					'items_wrap' => game_menu_wrap(),
					'walker' => $walker
				) );
			?>
			</div>
			<div class="col-6 col-sm-12 col-md-12 col-lg-6 magazine-menu">
			<?php
				wp_nav_menu( array(
					'menu' => 'Header Magazine menu',
					'items_wrap' => magazine_menu_wrap(),
					'walker' => $walker
				) );
			?>
			</div>
		</div>

	</header><!-- /header -->
	<div id="content" class="site-content">
