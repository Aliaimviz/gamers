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
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:100,200,300,400,500,600,700,800,900" />
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" />
        <link rel="stylesheet" type="text/css" href="<?= get_bloginfo('stylesheet_directory'); ?>/assets/libraries/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= get_bloginfo('stylesheet_directory'); ?>/assets/libraries/font-awesome/css/font-awesome.min.css">
        <?php wp_head(); ?>
        <style>
            p.comment-form-author {
                /*display: none;*/
            }
        </style>
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
                                    
                                    <form class="" action="http://site.startupbug.net:6999/thegamers/game-result/" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm change_width" id="pref-search" placeholder="search" name="home_search_fld">
                                    </div>
                                    
                                    <div class="form-group btn-group-right">
                                        <input type="submit" name="search_btns" id="seach_btns" value="Search">
                                        
                                    </div>
                                </form>
                                    <div class="corner-btn col-12 col-sm-12 col-md-5 col-lg-5">
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 register">
                                            <?php if (is_user_logged_in()) { ?>
                                                <a href="#" class="btn btn-default">My Profile <i class="fa fa-user-circle" aria-hidden="true"></i></a>
                                            <?php } else {
                                                ?>
                                                <a href="#" class="btn btn-default"> register<i class="fa fa-user-circle" aria-hidden="true"></i></a>
                                            <?php } ?>

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
                            wp_nav_menu(array(
                                'menu' => 'Header Game menu',
                                'walker' => $walker
                            ));
                            ?>
                            <?php
                            wp_nav_menu(array(
                                'menu' => 'Header Magazine menu',
                                'walker' => $walker
                            ));
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
                        wp_nav_menu(array(
                            'menu' => 'Header Game menu',
                            'items_wrap' => game_menu_wrap(),
                            'walker' => $walker
                        ));
                        ?>
                    </div>
                    <div class="col-6 col-sm-12 col-md-12 col-lg-6 magazine-menu">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'Header Magazine menu',
                            'items_wrap' => magazine_menu_wrap(),
                            'walker' => $walker
                        ));
                        ?>
                    </div>
                </div>

            </header><!-- /header -->
            <div id="content" class="site-content">
