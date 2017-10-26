<?php
get_header();
global $post;
?>
<?php // // Get wp-comments.php template 
do_action("comment_form_before");
/*$comment_args = array('title_reply' => '',
    'fields' => apply_filters('comment_form_default_fields', array(
        'author' => '<p class="comment-form-author col-xs-12">' . '<label for="author">' . __('Your Good Name') . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
        'email' => '<p class="comment-form-email col-xs-12">' .
        '<label for="email">' . __('Your Email Please') . '</label> ' .
        ( $req ? '<span>*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />' . '</p>',
        'url' => '')),
    'comment_field' => '<p>' .
    '<label for="comment" class="comment-form-email2 col-xs-12">' . __('Let us know what you have to say:') . '</label>' .
    '<textarea id="comment" class="col-xs-12 text-area-xee" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
    '</p>',
    'comment_notes_after' => '',
);

comment_form($comment_args, $post->ID);*/
?>

<div id="primary buying" class="content-area">
    <main id="main" class="site-main">
        <div class="magazine-single-page buying-guides-page">
            <?php
            if (have_posts()) {
                while (have_posts()):the_post();
                    $Featured_Image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), true);
                    ?>
                    <div class="magazine-guides-banner" style="background:url(<?php echo $Featured_Image[0]; ?>);">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <?php
                endwhile;
            }
            ?>
            <div id="sticky-anchor"></div>
            <div class="container mt-26 clearfix pad0">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pad0 w316 for-affix">&nbsp;</div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pad0 w316 right-sidebar-gadget">
                        <div class="gadgets">
                            <h2 class="Raleway"><i class="fa fa-mobile" aria-hidden="true"></i> Gadgets</h2>
                            <div class="gadgets-content">
                                <h3 class="Raleway name-title">now reading</h3>
                                <p class="Raleway">
                                    <?php get_the_excerpt(); ?>
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
                        <div class="side-content">
                            <h2 class="Raleway"> contents</h2>
                            <div class="list-content">
                                <ul id="navigation-ul">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pad-r19-l17 content-single-magazine"
                         style="float: right;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 pad-r19-l17 content-single-magazine">
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
                                       
                                        ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="image-text-quote">
                                    <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/magazine-single-banner.png">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pad0 magazine-detail-sidebar">
                                <?php dynamic_sidebar('Magazine Buying Guide Sidebar'); ?>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px 0px 0 15px;">
                            <div class="row">
                                <style>
                                    @media all and (max-width: 768px) {
                                        .content-single-magazine .row{
                                            padding:5px 0px !important;
                                            margin:0px auto;
                                        }
                                        body #itemslider .carousel-control.left {
                                            background: none;
                                            left: -10px;
                                            top: 30%;
                                            z-index: 999999;
                                            margin-right: 0px;
                                        }
                                        body #itemslider .carousel-control.right {
                                            background: none;
                                            right: -10px;
                                            top: 30%;
                                            z-index: 999999;
                                        }
                                        body .team_columns_item_image {
                                            max-width: 90% !important;
                                            margin: 0px auto !important;
                                            float: none !important;
                                            display: block;
                                            position: relative;
                                            left: 0px !important;
                                            right: 0px !important;
                                            width: 100% !important;
                                            padding: 0px;
                                        }
                                        body .carousel-showmanymoveone .cloneditem-1{
                                            display:block;
                                            opacity: 0.3;
                                            position: absolute;
                                            top: 0px;
                                            right: -170px;
                                        }
                                        body .carousel-showmanymoveone .cloneditem-2,
                                        body .carousel-showmanymoveone .cloneditem-3,
                                        body .carousel-showmanymoveone .cloneditem-4
                                        {
                                            display:none;
                                        }
                                        .carousel-showmanymoveone .carousel-inner > .active.left,
                                        .carousel-showmanymoveone .carousel-inner > .prev {
                                            left: 0%;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .active.right,
                                        .carousel-showmanymoveone .carousel-inner > .next {
                                            left: 50%;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .left,
                                        .carousel-showmanymoveone .carousel-inner > .prev.right,
                                        .carousel-showmanymoveone .carousel-inner > .active {
                                            left: 0;
                                        }
                                        .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
                                            display: block;
                                        }
                                    }
                                    .team_columns_item_image:hover .row {
                                        border-bottom: 5px solid #3e8091;
                                        margin: 0px 0px;
                                    }

                                    .team_columns_item_image .row {
                                        border-bottom: 5px solid #cacaca;
                                        margin: 0px 0px;
                                    }

                                    .carousel-showmanymoveone .cloneditem-1,
                                    .carousel-showmanymoveone .cloneditem-2,
                                    .carousel-showmanymoveone .cloneditem-3,
                                    .carousel-showmanymoveone .cloneditem-4,
                                    .carousel-showmanymoveone .cloneditem-5,
                                    .carousel-showmanymoveone .cloneditem-6,
                                    .carousel-showmanymoveone .cloneditem-7,
                                    .carousel-showmanymoveone .cloneditem-8,
                                    .carousel-showmanymoveone .cloneditem-9 {
                                        display: none;

                                    }

                                    @media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {

                                        .carousel-showmanymoveone .carousel-inner > .item.active.right,
                                        .carousel-showmanymoveone .carousel-inner > .item.next {
                                            -webkit-transform: translate3d(50%, 0, 0);
                                            transform: translate3d(50%, 0, 0);
                                            left: 0;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .item.active.left,
                                        .carousel-showmanymoveone .carousel-inner > .item.prev {
                                            -webkit-transform: translate3d(-50%, 0, 0);
                                            transform: translate3d(-50%, 0, 0);
                                            left: 0;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .item.left,
                                        .carousel-showmanymoveone .carousel-inner > .item.prev.right,
                                        .carousel-showmanymoveone .carousel-inner > .item.active {
                                            -webkit-transform: translate3d(0, 0, 0);
                                            transform: translate3d(0, 0, 0);
                                            left: 0;
                                        }
                                    }

                                    @media all and (min-width: 992px) {
                                        .carousel-showmanymoveone .carousel-inner > .active.left,
                                        .carousel-showmanymoveone .carousel-inner > .prev {
                                            left: -32%;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .active.right,
                                        .carousel-showmanymoveone .carousel-inner > .next {
                                            left: 32%;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .left,
                                        .carousel-showmanymoveone .carousel-inner > .prev.right,
                                        .carousel-showmanymoveone .carousel-inner > .active {
                                            left: 0;
                                        }

                                        .carousel-showmanymoveone .carousel-inner .cloneditem-1,
                                        .carousel-showmanymoveone .carousel-inner .cloneditem-2 {
                                            display: block;
                                        }
                                    }

                                    @media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
                                        .carousel-showmanymoveone .carousel-inner > .item.active.right,
                                        .carousel-showmanymoveone .carousel-inner > .item.next {
                                            -webkit-transform: translate3d(30%, 0, 0);
                                            transform: translate3d(30%, 0, 0);
                                            left: 0;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .item.active.left,
                                        .carousel-showmanymoveone .carousel-inner > .item.prev {
                                            -webkit-transform: translate3d(-30%, 0, 0);
                                            transform: translate3d(-30%, 0, 0);
                                            left: 0;
                                        }

                                        .carousel-showmanymoveone .carousel-inner > .item.left,
                                        .carousel-showmanymoveone .carousel-inner > .item.prev.right,
                                        .carousel-showmanymoveone .carousel-inner > .item.active {
                                            -webkit-transform: translate3d(0, 0, 0);
                                            transform: translate3d(0, 0, 0);
                                            left: 0;
                                        }
                                    }

                                    .team_columns_item_image {
                                        width: 30% !important;
                                    }

                                    .carousel-showmanymoveone .cloneditem-3 {
                                        display: block;
                                        position: absolute;
                                        top: 0px;
                                        right: -200px;
                                        opacity: 0.3;

                                    }

                                    #itemslider .carousel-control.right {
                                        background: none;
                                        right: 95px;
                                        top: 30%;
                                        z-index: 999999;
                                    }

                                    #itemslider .carousel-control.left {
                                        background: none;
                                        left: 0px;
                                        top: 30%;
                                        z-index: 999999;
                                    }
                                </style>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                                        <div class="carousel-inner">

                                            <div class="item active">
                                                <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                    <a href="#"><img
                                                            src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                            alt="slider 01"></a>
                                                    <div class="team_columns_item_caption">
                                                        <h4>MOUSE $300 1</h4>

                                                    </div>
                                                    <div class="list-colums">
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 1</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 2</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 3</h4>

                                                    </div>
                                                    <div class="color-red">
                                                        <h4>Game Mouse 1</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 remove_padding">
                                                            <p>Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                    <a href="#"><img
                                                            src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                            alt="slider 01"></a>
                                                    <div class="team_columns_item_caption">
                                                        <h4>MOUSE $300 2</h4>

                                                    </div>
                                                    <div class="list-colums">
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 1</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 2</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 3</h4>

                                                    </div>
                                                    <div class="color-red">
                                                        <h4>Game Mouse 1</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4 remove_padding">
                                                            <p>Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item ">
                                                <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                    <a href="#"><img
                                                            src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                            alt="slider 01"></a>
                                                    <div class="team_columns_item_caption">
                                                        <h4>MOUSE $300 3</h4>

                                                    </div>
                                                    <div class="list-colums">
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 1</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 2</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 3</h4>

                                                    </div>
                                                    <div class="color-red">
                                                        <h4>Game Mouse 1</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 remove_padding">
                                                            <p>Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item ">
                                                <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                    <a href="#"><img
                                                            src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                            alt="slider 01"></a>
                                                    <div class="team_columns_item_caption">
                                                        <h4>MOUSE $300 4</h4>

                                                    </div>
                                                    <div class="list-colums">
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 1</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 2</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 3</h4>

                                                    </div>
                                                    <div class="color-red">
                                                        <h4>Game Mouse 1</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 remove_padding">
                                                            <p>Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                    <a href="#"><img
                                                            src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                            alt="slider 01"></a>
                                                    <div class="team_columns_item_caption">
                                                        <h4>MOUSE $300 5</h4>

                                                    </div>
                                                    <div class="list-colums">
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 1</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 2</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 3</h4>

                                                    </div>

                                                    <div class="color-red">
                                                        <h4>Game Mouse 1</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 remove_padding">
                                                            <p>Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item ">
                                                <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                    <a href="#"><img
                                                            src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                            alt="slider 01"></a>
                                                    <div class="team_columns_item_caption">
                                                        <h4>MOUSE $300 6</h4>

                                                    </div>
                                                    <div class="list-colums">
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 1</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 2</h4>
                                                        <h4><i class="fa fa-arrow-circle-o-right"
                                                               aria-hidden="true"></i>Game Mouse 3</h4>

                                                    </div>
                                                    <div class="color-red">
                                                        <h4>Game Mouse 1</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 remove_padding">
                                                            <p>Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>

                                                        <div class="col-md-4 remove_padding">
                                                            <p> Best All Purpose Gaming Mouse </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div id="slider-control">
                                            <a class="left carousel-control" href="#itemslider"
                                               data-slide="prev"><img
                                                    src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/l.png"
                                                    alt="Left" class="img-responsive"></a>
                                            <a class="right carousel-control" href="#itemslider"
                                               data-slide="next"><img
                                                    src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/r.png"
                                                    alt="Right" class="img-responsive"></a>
                                        </div>
                                    </div>
                                </div>


                                <div id="adv_team_4_columns_carousel"
                                     class="hide carousel slide four_shows_one_move team_columns_carousel_wrapper"
                                     data-ride="carousel" data-interval="2000" data-pause="hover">
                                    <!--========= Wrapper for slides =========-->
                                    <div class="carousel-inner" role="listbox">
                                        <!--========= 1st slide =========-->
                                        <div class="item active">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 01">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 1</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 1</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 2</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 3</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 01">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 2</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 1</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 2</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 3</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 01">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 3</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 1</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 2</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 3</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 01">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 4</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 1</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 2</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 3</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 01">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 5</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 1</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 2</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 3</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 01">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 6</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 1</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 2</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 3</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 01">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 1</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 1</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 2</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 3</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image cloneditem-1">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 2</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 4</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 5</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 6</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image cloneditem-2">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 3</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 7</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 8</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 9</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!--========= 2nd slide =========-->
                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 4</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 10</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 11</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 12</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image cloneditem-1">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 5</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 13</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 14</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 15</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image cloneditem-2">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 6</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 16</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 17</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 18</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!--========= 3rd slide =========-->
                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 7</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 19</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 20</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 21</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image cloneditem-1">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 8</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 22</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 23</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 24</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image cloneditem-2">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/mouse-png.png"
                                                     alt="slider 02">
                                                <div class="team_columns_item_caption">
                                                    <h4>MOUSE $300 9</h4>

                                                </div>
                                                <div class="list-colums">
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 25</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 26</h4>
                                                    <h4><i class="fa fa-arrow-circle-o-right"
                                                           aria-hidden="true"></i>Game Mouse 27</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p>Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p> Best All Purpose Gaming Mouse </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <!--======= Navigation Buttons =========-->
                                    <!--======= Left Button =========-->
                                    <a class="left carousel-control team_columns_carousel_control_left adv_left"
                                       href="#adv_team_4_columns_carousel" role="button" data-slide="prev">
                                        <span class="fa fa-angle-left team_columns_carousel_control_icons"
                                              aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <!--======= Right Button =========-->
                                    <a class="right carousel-control team_columns_carousel_control_right adv_right"
                                       href="#adv_team_4_columns_carousel" role="button" data-slide="next">
                                        <span class="fa fa-angle-right team_columns_carousel_control_icons"
                                              aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 comminucation-banner"></div>
                        <div class="col-md-12 best-mouse"><h1>BEST MOUSE UNDER 100 €</h1></div>
                        <!-- <div class="simple-heading-para-content simple-content-2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat delectus, cum
                                porro, culpa esse temporibus nam tempore maiores fugiat atque ipsum, et quaerat
                                dicta voluptas veritatis voluptatem, ea consequuntur.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat delectus, cum
                                porro, culpa esse temporibus nam tempore maiores fugiat atque ipsum, et quaerat
                                dicta voluptas veritatis voluptatem, ea consequuntur.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat delectus, cum
                                porro, culpa esse temporibus nam tempore maiores fugiat atque ipsum, et quaerat
                                dicta voluptas veritatis voluptatem, ea consequuntur.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat delectus, cum
                                porro, culpa esse temporibus nam tempore maiores fugiat atque ipsum, et quaerat
                                dicta voluptas veritatis voluptatem, ea consequuntur.</p>
                        </div> -->

                            <?php echo do_shortcode('[game-slider-section]'); ?>

                        <div class="col-md-12 comminucation-banner2"></div>
                        <div class="single_games_comments_sections">
                            <div class="comments_section_before">
                            <?php
                            if (have_posts()) : while (have_posts()) : the_post(); ?>

                                        <?php
                                        if (comments_open() || get_comments_number()) :
                                            comments_template();
                                        endif;
                                        ?>
                                    <?php endwhile; ?>
                                <?php endif;
                                ?>
                            </div>

                        </div>
                        <!-- <div class="row comment">
                            <div class="col-md-1" style="float: left;margin-bottom: 15px;">
                                <img alt=""src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g"srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x"
                                     class="avatar avatar-32 photo"
                                     height="40"
                                     width="40">
                            </div>
                            <div class="col-md-10">
                                <div id="comment_form">
                                    <div><h4><i class="fa fa-comments" aria-hidden="true"></i>Comment</h4></div>
                                    <div>
                                        <textarea rows="10" name="comment" id="comment" class="textarea"placeholder="Enter Your Comment Here">

                                        </textarea>
                                    </div>
                                    <div>
                                        <input type="text" name="name" id="name" value="" class="textbox"placeholder="Name">
                                    </div>
                                    <div>
                                        <input type="email" name="email" id="email" value="" class="textbox"placeholder="Email">
                                    </div>
                                    <div class="comment-footer">
                                        <ul class="comments_ul">
                                            <li><img alt=""
                                                     src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g"
                                                     srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x"
                                                     class="avatar avatar-32 photo" height="32" width="32"
                                                     style="border-radius: 15px;"></li>
                                            <li><i class="fa fa-user-o" aria-hidden="true"></i>JS</li>
                                            <li><i class="fa fa-user-o" aria-hidden="true"></i>Apri 13th, 2017 12:26
                                            </li>
                                        </ul>
                                        <p class="comment_para">Any1 played it ready? Is it worth buying?</p>
                                        <ul class="comments_rate_ul">
                                            <li>Rate this comment</li>
                                            <li>0 <i class="fa fa-thumbs-up" aria-hidden="true"></i></li>
                                            <li>0 <i class="fa fa-thumbs-down" aria-hidden="true"></i></li>
                                            <li><a href="#" class='comment-reply'>Reply</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
