<?php
/* Template Name: Magazine Detail Page */

get_header();
?>
<?php
$post_id = get_the_ID();
$template = get_post_meta($post_id, 'set_template', true);
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="magazine-single-page">
            <?php
            if (have_posts()) {
                while (have_posts()):the_post();
                    $Featured_Image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    ?>
                    <div class="magazine-single-banner" style="background: url(<?php echo $Featured_Image[0]; ?>);">
                        <div class="likes">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <h4>total likes <br> <span>125</span> </h4>
                        </div>
                        <h1>For honor review- Somtime  it’s good to be honorless</h1>
                    </div>
                    <?php
                endwhile;
            }
            ?>
            <div id="sticky-anchor"></div>

            <div class="container mt-26 clearfix pad0">

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pad0 w316 for-affix">&nbsp;</div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pad0 w316 right-sidebar-gadget">
                    <div class="gadgets">
                        <h2 class="Raleway"> <i class="fa fa-mobile" aria-hidden="true"></i> Gadgets</h2>
                        <div class="gadgets-content">
                            <h3 class="Raleway">now reading</h3>
                            <p class="Raleway">
                                <?= get_the_excerpt(); ?>...
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix next-prev">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post) {
                                        $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
                                        echo "\t" . '<a rel="prev" class="Raleway semi-transparent-button right" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title . '" ><i class="fa fa-angle-left" aria-hidden="true"></i> prev' . '</a>' . "\n";
                                    } else {
                                        echo "\t" . '<a rel="prev" class="Raleway semi-transparent-button right disabled-button" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> prev</a>' . "\n";
                                    }
                                    ?>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post) {
                                        $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
                                        echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title . '" class="Raleway semi-transparent-button left">next <i class="fa fa-angle-right" aria-hidden="true"></i></a>' . "\n";
                                    } else {
                                        echo "\t" . '<a rel="next" href="#" class="Raleway semi-transparent-button left disabled-button">next <i class="fa fa-angle-right" aria-hidden="true"></i></a>' . "\n";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="side-content single-side-content">
                        <h2 class="Raleway"> contents</h2>
                        <div class="list-content">
                            <ul id="navigation-ul">
                            </ul>
                        </div>
                    </div>
                    <?php $user_id = get_current_user_id(); ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 social-btns">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 bdr" id="heart">
                            <a href="javascript:void(0);" id="<?php echo get_the_ID(); ?>" data-user-id="<?php echo $user_id; ?>" class="likes">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <span>Like</span>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <a href="#" class="addthis_button_compact">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                <span>Share</span>
                            </a>	
                        </div>
                    </div>
                </div>
                <div class="main-flex-div">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pad-r19-l17 content-single-magazine">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <?php
                                the_content();
                                //comments_template( '', true ); 
                                ?>

                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                /* if ( comments_open() || get_comments_number() ) :
                                  comments_template( '', true );
                                  endif; */
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;
                                ?>

                            <?php endwhile; ?>
                        <?php endif; ?>





                        <?php /* <div class="mg-slider" id="photos">
                          <div id="main_area">
                          <div class="row">
                          <div class="col-xs-12" id="slider">
                          <div class="row">
                          <div class="col-sm-12" id="carousel-bounding-box">
                          <div class="carousel slide" id="myCarousel">
                          <div class="carousel-inner">
                          <div class="active item" data-slide-number="0">
                          <img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-1.png">
                          </div>
                          <div class="item" data-slide-number="1">
                          <img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-2.png">
                          </div>
                          <div class="item" data-slide-number="2">
                          <img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-3.png">
                          </div>
                          <div class="item" data-slide-number="3">
                          <img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-4.png">
                          </div>
                          <div class="item" data-slide-number="4">
                          <img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-5.png">
                          </div>
                          <div class="item" data-slide-number="5">
                          <img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-6.png">
                          </div>
                          </div>
                          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>

                          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                          <span class="fa fa-arrow-circle-left"></span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                          <span class="fa fa-arrow-circle-right"></span>
                          </a>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>

                          <div class="row hidden-xs" id="slider-thumbs">
                          <ul class="hide-bullets">
                          <li class="col-sm-2">
                          <a class="thumbnail" id="carousel-selector-0"><img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-thumb-1.png"></a>
                          </li>
                          <li class="col-sm-2">
                          <a class="thumbnail" id="carousel-selector-1"><img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-thumb-2.png"></a>
                          </li>
                          <li class="col-sm-2">
                          <a class="thumbnail" id="carousel-selector-2"><img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-thumb-3.png"></a>
                          </li>
                          <li class="col-sm-2">
                          <a class="thumbnail" id="carousel-selector-3"><img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-thumb-4.png"></a>
                          </li>
                          <li class="col-sm-2">
                          <a class="thumbnail" id="carousel-selector-4"><img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-thumb-5.png"></a>
                          </li>
                          <li class="col-sm-2">
                          <a class="thumbnail" id="carousel-selector-5"><img src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/magazine-single/slider/slider-thumb-6.png"></a>
                          </li>
                          </ul>
                          </div>
                          </div>
                          </div> */ ?>

                        <div class="comments-form-box">

                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pad0 magazine-detail-sidebar">
                        <?php
                        if ($template == "Reviews") {
                            dynamic_sidebar('magazine-review-sidebar');
                        } else {
                            dynamic_sidebar('Magazine Detail Page Sidebar');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
