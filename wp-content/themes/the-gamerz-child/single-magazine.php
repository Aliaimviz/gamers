<?php
/* Template Name: Magazine Detail Page */

get_header();
?>
<?php
$post_id = get_the_ID();
$template = get_post_meta($post_id, 'set_template', true);
?>
<div id="primary asdsd" class="content-area">
    <main id="main" class="site-main">
        <div class="magazine-single-page">
            <?php
            $user_id = get_current_user_id();
            $post_ids = get_the_ID();
            $post_counts = get_post_meta($post_ids, 'post_likes_more', true);
            if (empty($post_counts)) {
                $counts = 0;
            } else {
                $counts = count(get_post_meta($post_ids, 'post_likes_more', true));
            }
            if (have_posts()) {
                while (have_posts()):the_post();
                    $Featured_Image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    ?>
                    <div class="magazine-single-banner" style="background: url(<?php echo $Featured_Image[0]; ?>);">
                        <div class="likes">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <h4>total likes <br> <span><?php echo $counts; ?></span> </h4>
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
                                <?php get_the_excerpt(); ?>...
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
                    <?php
                    //print_r($pst_count);
                    $post_likes_user = get_post_meta($post_ids, 'post_likes_more', true);

                    function getUserIP() {
                        $client = @$_SERVER['HTTP_CLIENT_IP'];
                        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                        $remote = $_SERVER['REMOTE_ADDR'];

                        if (filter_var($client, FILTER_VALIDATE_IP)) {
                            $ip = $client;
                        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
                            $ip = $forward;
                        } else {
                            $ip = $remote;
                        }

                        return $ip;
                    }

                    $user_ip = getUserIP();
                    ?>
                    <div class="loader_show" style="display:none;position: relative;left: 20%;top: 79px;z-index: 9999999999999999999;"><img src="<?php echo site_url(); ?>/ajax-loader.gif"/></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 social-btns">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 bdr" id="heart">
                            <div class="Success_login_counter" style="display:none;">

                            </div>
                            <?php
                            if (!empty($post_likes_user)) {
                                if (in_array($user_ip, $post_likes_user)) {
                                    ?>

                                    <a href="javascript:void(0);" id="<?php echo get_the_ID(); ?>" data-user-id="<?php echo $user_ip; ?>" class="dislikes"><i class="fa fa-heart" aria-hidden="true"></i>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="javascript:void(0);" id="<?php echo get_the_ID(); ?>" data-user-id="<?php echo $user_ip; ?>" class="likes_btn"><i class="fa fa-heart-o" aria-hidden="true"></i>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <a href="javascript:void(0);" id="<?php echo get_the_ID(); ?>" data-user-id="<?php echo $user_ip; ?>" class="likes_btn"><i class="fa fa-heart-o" aria-hidden="true"></i>
                                            <?php
                                        }
                                        ?>


                                        <span>Total <span class="counter_likes"><?php //echo $counts;             ?></span></span>
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
                                    