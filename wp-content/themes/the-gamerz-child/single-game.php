<?php
get_header();
global $post;
$post_id_game = $post->ID;
?>
<style>
    .single_games_comments{
        display: none;
    }
</style>
<div class="single_games_comments">
    <?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    $comment_args = array('title_reply' => '',
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

    comment_form($comment_args, $post_id_game);
    ?>
</div>
<div id="primary buying" class="content-area">
    <main id="main" class="site-main">
        <div class="magazine-single-page buying-guides-page">
            <?php
            if (have_posts()) {
                while (have_posts()):the_post();
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    $title_single_page = get_the_title($post->ID);
                    $piattaforma = get_post_meta($post->ID, 'piattaforma', true);
                    $date_figure = get_the_date();
                    $contents = get_the_content();
                    $tags = wp_get_post_tags($post->ID);
                    ?>
                    <div class="magazine-guides-banner" style='background:url("<?php echo $featured_image[0]; ?>");'>
                        <div class="row">
                            <div class="likes_game float-right">
                                <div class="heart-left">
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/heart-white.png" class="img-responsive center-block"/>
                                    </span>
                                </div>
                                <div class="likes-body">
                                    <h6>Total Likes</h6>
                                    <?php
                                    $likes_post_meta = get_post_meta($post->ID, 'post_likes_more', true);
                                    ?>
                                    <h4><?php echo count($likes_post_meta); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row title_signle">
                            <div class="col-xs-5 col-center clear-fix">
                                <div class="col-xs-4">
                                    <div class="rating-inner-box icon-one">
                                        <h6>Your</h6>
                                        <div class="img-box-rate">
                                            <span>rate</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="rating-inner-box">
                                        <h6 class="expert-rating">Expert rating</h6>
                                        <div class="img-box-rate bg-2">
                                            <?php
                                            $args_rate = array(
                                                'post_parent' => $post->ID,
                                                'post_type' => 'review',
                                                'post_status' => 'publish'
                                            );
                                            $query_rate = new WP_Query($args_rate);
                                            $count_user = $query_rate->post_count;
                                            $total = '';
                                            $total_rating = '';
                                            $final_rating = '';

                                            $total1 = '';
                                            $total_rating1 = '';
                                            $final_rating1 = '';
                                            $admin_rate = array(
                                                'post_type' => 'review',
                                                'post_status' => 'publish',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'wpcf-post-id',
                                                        'value' => $post->ID,
                                                        'compare' => '=',
                                                    ),
                                                )
                                            );
                                            $query_rate_admin = new WP_Query($admin_rate);

                                            $count_user_admin = $query_rate_admin->post_count;
                                            $j = 0;
                                            if ($query_rate_admin->have_posts()) {
                                                while ($query_rate_admin->have_posts()) {
                                                    $query_rate_admin->the_post();
                                                    $post_id_rate_admin = get_the_ID();
                                                    $post_rates = get_post_meta($post_id_rate_admin, 'wpcf-rating', true);
                                                    $total1 = $total1 + $post_rates;
                                                    $j++;
                                                }
                                                $total_rating1 = $total1 / $j;
                                                $final_rating1 = $total_rating1 * 20;
                                                echo '<span>' . round($final_rating1) . '</span>';
                                            } else {
                                                echo '<span>0</span>';
                                            }
                                            ?>
                                            <!--<span>70</span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="rating-inner-box icon-one">
                                        <h6>User RaTING</h6>
                                        <div class="img-box-rate bg-3">
                                            <?php
                                            if ($query_rate->have_posts()) {
                                                while ($query_rate->have_posts()) {
                                                    $query_rate->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user;
                                                $final_rating = $total_rating * 20;
                                                echo '<span>' . round($final_rating) . '</span>';
                                            } else {
                                                echo '<span>0</span>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1><?php echo $title_single_page; ?> </h1>
                    </div>
                    <?php
                endwhile;
            }
            ?>
            <div id="sticky-anchor"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-12 pad-r19-l17 content-single-magazine" style="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-xs-12">
                                            <div id="owl-demo" class="owl-carousel owl-theme">
                                                <?php
                                                //echo $post->ID;
                                                if (have_posts()) {
                                                    while (have_posts()):the_post();
                                                        if (have_rows('images')):
                                                            while (have_rows('images')): the_row();
                                                                $image_1 = get_sub_field('images_1');
                                                                $image_2 = get_sub_field('images_2');
                                                                $image_3 = get_sub_field('images_3');
                                                                $image_4 = get_sub_field('images_4');
                                                                ?>
                                                                <div class="item"><img src="<?php echo $image_1['url']; ?>" alt="The Last of us"></div>
                                                                <div class="item"><img src="<?php echo $image_2; ?>" alt="The Last of us"></div>
                                                                <div class="item"><img src="<?php echo $image_3; ?>" alt="The Last of us"></div>
                                                                <div class="item"><img src="<?php echo $image_4; ?>" alt="The Last of us"></div>
                                                                <?php
                                                            endwhile;
                                                        endif;
                                                    endwhile;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div id="owl-video" class="owl-carousel owl-theme">
                                                <?php
                                                $video = get_post_meta($post_id_game, 'video', true);
                                                //var_dump($video);
                                                ?>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 btns-groups">
                                            <div class="col-xs-6 gallery">
                                                <?php
                                                if (have_rows('images')):
                                                    while (have_rows('images')): the_row();
                                                        $image_1 = get_sub_field('images_1');
                                                        $image_2 = get_sub_field('images_2');
                                                        $image_3 = get_sub_field('images_3');
                                                        $image_4 = get_sub_field('images_4');
                                                        $image_5 = get_sub_field('images_5');
                                                        ?>
                                                        <a href="#" rel="prettyPhoto[gallery1]" class="simple-content-readmore glr">Images Gallery <i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                                        <!--Image Gallary PopUp-->
                                                        <?php echo $images_1; ?>
                                                        <ul class="" style="display:none;">
                                                            <li><a href="<?php echo $image_1['url']; ?>" rel="prettyPhoto[gallery1]" <img src="<?php echo $image_1['url']; ?>" width="60" height="60" alt="Red round shape" /></a></li>
                                                            <li><a href="<?php echo $image_2; ?>" rel="prettyPhoto[gallery1]" <img src="<?php echo $image_2; ?>" width="60" height="60" alt="Red round shape" /></a></li>
                                                            <li><a href="<?php echo $image_3; ?>" rel="prettyPhoto[gallery1]" <img src="<?php echo $image_3; ?>" width="60" height="60" alt="Red round shape" /></a></li>
                                                            <li><a href="<?php echo $image_4; ?>" rel="prettyPhoto[gallery1]" <img src="<?php echo $image_4; ?>" width="60" height="60" alt="Red round shape" /></a></li>
                                                        </ul>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                                <!--./End Image Gallary PopUp-->
                                            </div>
                                            <div class="col-xs-6 gallery video">
                                                <a href="#" rel="prettyvideo" class="simple-content-readmore glr btn-blk">Video Gallery <i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                                <ul class="clearfix" style="display:none">
                                                    <li>
                                                        <iframe title="YouTube video player" rel="prettyvideo"  height="60" src="<?php echo $video; ?>" frameborder="0" width="60" allowfullscreen></iframe>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 game-para">
                                        <div class="row">
                                            <div class = "col-md-3 col-xs-6">
                                                <?php
                                                $piattaforma = get_post_meta($post_id_game, 'piattaforma', true);
                                                if (!empty($piattaforma)) {
                                                    echo'<h2 class="title-game"> piattaforma </h2>';
                                                    echo "<p>";
                                                    foreach ($piattaforma as $platform) {
                                                        echo"$platform, ";
                                                    }
                                                    echo "</p>";
                                                } else {
                                                    
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <?php
                                                $status = get_post_meta($post_id_game, 'status', true);
                                                if (!empty($status)) {
                                                    echo'<h2 class="title-game"> Status </h2>';
                                                    echo "<p>";
                                                    foreach ($status as $sta) {
                                                        echo"$sta, ";
                                                    }
                                                    echo "</p>";
                                                } else {
                                                    
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <?php
                                                $generes = get_post_meta($post_id_game, 'genere', true);
                                                $a = 0;
                                                if (!empty($generes)) {
                                                    echo'<h2 class="title-game"> GENRE </h2>';
                                                    echo "<p>";
                                                    foreach ($generes as $key => $genere) {
                                                        $a;
                                                        if ($a == 5) {
                                                            break;
                                                        } else {
                                                            echo $genere . ", ";
                                                        }
                                                        $a++;
                                                    }
                                                    echo "</p>";
                                                } else {
                                                    
                                                }
                                                ?>

                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <?php
                                                $multiplayer = get_post_meta($post_id_game, 'multiplayer', true);
                                                $a = 0;
                                                if (!empty($multiplayer)) {
                                                    if (!empty($status)) {
                                                        echo'<h2 class="title-game"> Multiplayer </h2>';
                                                        echo "<p>";
                                                        foreach ($multiplayer as $multi) {
                                                            echo"$multi, ";
                                                        }
                                                        echo "</p>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="top-bottum-border">
                                                <?php
                                                if (have_rows('buy_it_here')):
                                                    while (have_rows('buy_it_here')) : the_row();
                                                        $url = get_sub_field('site_url')
                                                        ?>
                                                        <div class="col-md-3 col-xs-6">
                                                            <a href="<?php echo $url; ?>" target="_blank">
                                                                <img src="<?php echo get_sub_field('images_logo'); ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <?php
                                                    endwhile;
                                                else :
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row tag-padding">
                                                <div class="col-md-12">
                                                    <?php
                                                    $specArray;
                                                    $specArray['data_di_uscita'] = get_post_meta($post_id_game, 'data_di_uscita', true);
                                                    $specArray['voto_degli_esperti'] = get_post_meta($post_id_game, 'voto_degli_esperti', true);
                                                    $specArray['voto_acquirenti'] = get_post_meta($post_id_game, 'voto_acquirenti', true);
                                                    $specArray['systema_di_pagamento'] = get_post_meta($post_id_game, 'systema_di_pagamento', true);
                                                    $specArray['ambientazione'] = get_post_meta($post_id_game, 'ambientazione', true);
                                                    $specArray['caratteristiche'] = get_post_meta($post_id_game, 'caratteristiche', true);
                                                    foreach ($specArray as $spec) {
                                                        if (!empty($spec)) {
                                                            if (is_array($spec)) {
                                                                $key = array_search($spec, $specArray);
                                                                $key = str_replace('_', ' ', $key);
                                                                echo '<div class="col-md-6"><div><h6 class="title-game">' . $key . '</h6>';
                                                                foreach ($spec as $spe) {
                                                                    echo"<p>$spe</p>";
                                                                }
                                                                echo "</div></div>";
                                                            } else {
                                                                $key = array_search($spec, $specArray);
                                                                $key = str_replace('_', ' ', $key);
                                                                echo'<div class="col-md-6"><h6 class="title-game">' . $key . '</h6>';
                                                                echo"<p>$spec</p></div>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 50px;">
                                                <div class="col-md-12">
                                                    <div style="text-align: center;margin-top: 10px;">
                                                        <a href="#profile" id="spci" class="simple-content-readmore black-bg nf">
                                                            View all the specs
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="title-game bottom-border">editors Don't like</h4>
                                                    <div class="text-icons">
                                                        <?php
                                                        $editer_dont_likes = get_post_meta($post_id_game, 'editors_didnt_like', true);
                                                        if (!empty($editer_dont_likes)) {
                                                            echo"<p><i class='fa fa-minus-square' aria-hidden='true'></i>$editer_dont_likes</p>";
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                        <?php
                                                        $editer_dont_likes = get_post_meta($post_id_game, 'editors_didnt_like_1', true);
                                                        if (!empty($editer_dont_likes)) {
                                                            echo"<p><i class='fa fa-minus-square' aria-hidden='true'></i>$editer_dont_likes</p>";
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                        <?php
                                                        $editer_dont_likes = get_post_meta($post_id_game, 'editors_didnt_like_2', true);
                                                        if (!empty($editer_dont_likes)) {
                                                            echo"<p><i class='fa fa-minus-square' aria-hidden='true'></i>$editer_dont_likes</p>";
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                        <?php
                                                        $editer_dont_likes = get_post_meta($post_id_game, 'editors_didnt_like_3', true);
                                                        if (!empty($editer_dont_likes)) {
                                                            echo"<p><i class='fa fa-minus-square' aria-hidden='true'></i>$editer_dont_likes</p>";
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                        <?php
                                                        $editer_dont_likes = get_post_meta($post_id_game, 'editors_didnt_like_4', true);
                                                        if (!empty($editer_dont_likes)) {
                                                            echo"<p><i class='fa fa-minus-square' aria-hidden='true'></i>$editer_dont_likes</p>";
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="title-game bottom-border">editors like</h4>
                                                    <div class="text-icons">
                                                        <?php
                                                        $editer_likes = get_post_meta($post_id_game, 'editors_liked', true);
                                                        if (!empty($editer_likes)) {
                                                            echo"<p><i class='fa fa-plus-square' aria-hidden='true'></i>" . $editer_likes . "</p>";
                                                        } else {
                                                            
                                                        }
                                                        $editer_likes = get_post_meta($post_id_game, 'landrush_quickly', true);
                                                        if (!empty($editer_likes)) {
                                                            echo"<p><i class='fa fa-plus-square' aria-hidden='true'></i>" . $editer_likes . "</p>";
                                                        } else {
                                                            
                                                        }
                                                        $editer_likes = get_post_meta($post_id_game, 'editors_liked_2', true);
                                                        if (!empty($editer_likes)) {
                                                            echo"<p><i class='fa fa-plus-square' aria-hidden='true'></i>" . $editer_likes . "</p>";
                                                        } else {
                                                            
                                                        }
                                                        $editer_likes = get_post_meta($post_id_game, 'editors_liked3', true);
                                                        if (!empty($editer_likes)) {
                                                            echo"<p><i class='fa fa-plus-square' aria-hidden='true'></i>" . $editer_likes . "</p>";
                                                        } else {
                                                            
                                                        }
                                                        $editer_likes = get_post_meta($post_id_game, 'editors_liked4', true);
                                                        if (!empty($editer_likes)) {
                                                            echo"<p><i class='fa fa-plus-square' aria-hidden='true'></i>" . $editer_likes . "</p>";
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="simple-heading-para-content">
                                    <h1>Description</h1>
                                    <?php
                                    if (have_posts()) {
                                        while (have_posts()):the_post();
                                            ?>
                                            <p><?php the_content(); ?></p>
                                            <?php
                                        endwhile;
                                    }
                                    ?>
                                    <?php
                                    $site_link = get_post_meta($post_id_game, 'visit_official_site', true);
                                    if (!empty($site_link)) {
                                        echo'<a href="' . "$site_link" . '" class="simple-content-readmore wdt btn-blk" target="_blank">Visit Officiall Website</a>';
                                    } else {
                                        
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="image-text-quote">
                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/banner.png" class="img-responsive center-block" style="width:100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="tabination_all">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Summary</a></li>
                                <li role="presentation" id="spec_active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Specs</a></li>
                                <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab" data-post-id="<?php echo $post_id_game; ?>">News</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="home" role="tab" data-toggle="tab" data-post-id="" id="<?php echo $post_id_game; ?>" data-post-id="" class="community_sect">Communities</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <section id="custom_html-19" class="widget_text widget widgets widget_custom_html">
                                                <div class="textwidget custom-html-widget">
                                                    <h2>critic reviews</h2>
                                                    <ul id="buying-guide-side">
                                                        <?php
                                                        $admin_rate2 = array(
                                                            'post_type' => 'review',
                                                            'post_status' => 'publish',
                                                            'meta_query' => array(
                                                                array(
                                                                    'key' => 'wpcf-post-id',
                                                                    'value' => $post_id_game,
                                                                    'compare' => '=',
                                                                ),
                                                            )
                                                        );
                                                        $query_rate_admin2 = new WP_Query($admin_rate2);
                                                        while ($query_rate_admin2->have_posts()) {
                                                            $query_rate_admin2->the_post();
                                                            $post_id = get_the_ID();
                                                            $author_id = get_the_author($post_id);
                                                            $user = get_user_by('id', $author_id);
                                                            ?>
                                                            <li>
                                                                <div>
                                                                    <span>
                                                                        <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png">
                                                                    </span>
                                                                    <div>
                                                                        <h3 class="name-title"><?php echo $author_id; ?></h3>
                                                                        <span><?php echo get_post_meta($post_id, 'wpcf-rating', true); ?></span>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    <?php
                                                                    echo get_the_content();
                                                                    ?>
                                                                </p>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </section>
                                            <a href="#" class="simple-content-readmore">View All The Critic Review</a>
                                        </div><!--./End First Colum-->
                                        <div class="col-xs-6">
                                            <section id="custom_html-19" class="widget_text widget widgets widget_custom_html">
                                                <div class="textwidget custom-html-widget black-colum">
                                                    <div class="two-third">
                                                        <?php
                                                        $id = $post_id_game;
                                                        ?>
                                                        <h2>user reviews <span><a href="<?php echo add_query_arg('post_ID', $id, get_permalink(685)); ?>">Write A1 Review</a></span></h2>
                                                    </div>
                                                    <ul id="buying-guide-side">
                                                        <?php
                                                        $args = array(
                                                            'post_parent' => $id,
                                                            'post_type' => 'review',
                                                            'posts_per_page' => 6,
                                                            'order' => 'DESC',
                                                            'tax_query' => array(
                                                                array(
                                                                    'taxonomy' => 'reviews-category',
                                                                    'field' => 'slug',
                                                                    'terms' => 'user-reviews',
                                                                )
                                                            ),
                                                        );
                                                        $query = new WP_Query($args);
                                                        while ($query->have_posts()):$query->the_post();
                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                                            $post_id = get_the_ID();
                                                            ?>
                                                            <li>
                                                                <div>
                                                                    <span>
                                                                        <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png">
                                                                    </span>
                                                                    <div>
                                                                        <h3 class="name-title"><?php the_title(); ?></h3>
                                                                        <span><?php echo get_post_meta($post_id, 'wpcf-rating', true); ?></span>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    <?php echo get_the_content(); ?>
                                                                </p>

                                                            </li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                </div>
                                            </section>
                                            <a href="#" class="simple-content-readmore btn-blk">View All User Reviews</a>
                                        </div><!--./End Second Colum-->
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="col-xs-12">
                                        <h2 class="heading-title">specification</h2>
                                        <div class="specs">
                                            <?php
                                            $pec_1 = get_post_meta($post_id_game, 'specification_1', true);
                                            if (!empty($pec_1)) {
                                                ?>
                                                <td><?php echo do_shortcode($pec_1); ?></td>
                                                <?php
                                            }
                                            ?>
                                            <div class="clear-fix"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h2 class="heading-title">specification</h2>
                                        <div class="specs">
                                            <?php
                                            $pec_2 = get_post_meta($post_id_game, 'specification_2', true);
                                            if (!empty($pec_2)) {
                                                ?>
                                                <td><?php echo do_shortcode($pec_2); ?></td>
                                                <?php
                                            }
                                            ?>
                                            <div class="clear-fix"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h2 class="heading-title">specification</h2>
                                        <div class="specs">
                                            <?php
                                            $pec_3 = get_post_meta($post_id_game, 'specification_3', true);
                                            if (!empty($pec_3)) {
                                                ?>
                                                <td><?php echo do_shortcode($pec_3); ?></td>
                                                <?php
                                            }
                                            ?>
                                            <div class="clear-fix"></div>
                                        </div>
                                    </div>
                                    <?php ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="news">


                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">...</div>
                            </div>
                        </div><!--./End Tabs-->
                    </div>
                    <div class="col-xs-4">
                        <div class="col-xs-12 r-m-p">
                            <section id="custom_html-19" class="widget_text widget widgets widget_custom_html">
                                <div class="textwidget custom-html-widget black-colum">
                                    <div class="two-third black-box">
                                        <h2>help us to create our database submit a game</h2>
                                    </div>
                                    <div class="img-section">
                                        <a href="#">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/robort-img.png" class="img-responsive center-block" width="100%"/>
                                        </a>
                                    </div>
                                    <div class="red-section clear custom-red">
                                        <ul class="ul-heading clear">
                                            <li>
                                                <span>Your</span>
                                            </li>
                                            <li>
                                                <span>G2A Score</span>
                                            </li>
                                            <li>
                                                <span>USers</span>
                                            </li>
                                            <div class="clear-fix"></div>
                                        </ul>
                                        <ul class="ul-thumnails clear">
                                            <li>
                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/rate.png"/></span>
                                            </li>

                                            <?php
                                            $args_rate1 = array(
                                                'post_parent' => $post_id_game,
                                                'post_type' => 'review',
                                                'post_status' => 'publish'
                                            );
                                            $query_rate1 = new WP_Query($args_rate1);
                                            $count_user1 = $query_rate1->post_count;
                                            $total = '';
                                            $total_rating = '';
                                            $final_rating = '';

                                            $total1 = '';
                                            $total_rating1 = '';
                                            $final_rating1 = '';

                                            $admin_rate1 = array(
                                                'post_type' => 'review',
                                                'post_status' => 'publish',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'wpcf-post-id',
                                                        'value' => $post_id_game,
                                                        'compare' => '=',
                                                    ),
                                                )
                                            );
                                            $query_rate_admin1 = new WP_Query($admin_rate1);

                                            $count_user_admin1 = $query_rate_admin1->post_count;
                                            $j = 0;
                                            if ($query_rate_admin1->have_posts()) {
                                                while ($query_rate_admin1->have_posts()) {
                                                    $query_rate_admin1->the_post();
                                                    $post_id_rate_admin = get_the_ID();
                                                    $post_rates = get_post_meta($post_id_rate_admin, 'wpcf-rating', true);
                                                    $total1 = $total1 + $post_rates;
                                                    $j++;
                                                }

                                                $total_rating1 = $total1 / $j;
                                                $final_rating1 = $total_rating1 * 20;
                                                ?>
                                                <li>
                                                    <span class="g2a">
                                                        <?php
                                                        echo '<span>' . $final_rating1 . '</span>';
                                                        ?>
                                                    </span>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li>
                                                    <span class="g2a">
                                                        <?php
                                                        echo '<span>0</span>';
                                                        ?>
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if ($query_rate1->have_posts()) {
                                                while ($query_rate1->have_posts()) {
                                                    $query_rate1->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user1;
                                                $final_rating = $total_rating * 20;
                                                ?>
                                                <li>
                                                    <span class="g3a">
                                                        <span><?php echo $final_rating; ?></span>
                                                    </span>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li>
                                                    <span class="g3a">
                                                        <span>0</span>
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        <h4>For Honor</h4>
                                        <h5><i class="fa fa-gamepad" aria-hidden="true"></i>
                                            <?php
                                            if (!empty($tags)) {
                                                foreach ($tags as $related) {
                                                    echo $related->name . ",";
                                                    ;
                                                }
                                            }
                                            ?>
                                        </h5>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12">
                                                <div class="date-releas">
                                                    <h6>Relaeas Date:</h6>
                                                    <h6><?php echo $date_figure; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="pc-btn">
                                                    <?php
                                                    if (!empty($piattaforma)) {
                                                        foreach ($piattaforma as $val) {
                                                            echo "<p>" . $val . "</p>";
                                                        }
                                                    }
                                                    ?>
                                                    <!-- <p>pc</p> <p>PS4</p> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="text-red-section">
                                                <p>
                                                    <?php echo substr($contents, 50, 100); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="center-btn">
                                                <!-- <a href="#" class="simple-content-readmore btn-blk">Find Lowest Price</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="widget start-widget"><a href="http://test.com"><img width="458" height="345" src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/Untitled-2-1.png" alt="" title="Untitled-2"></a></section>
                        </div>
                        <section id="custom_html-20" class="widget_text widget widget_custom_html">
                            <div class="textwidget custom-html-widget">
                                <?php echo do_shortcode('[similar-products-magazine]'); ?>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="looking-for-clan clear">
                            <h3>looking for clan?</h3>
                            <h4>checkout these communities</h4>
                            <div class="col-xs-10 col-center">
                                <ul class="btn-ul clear">
                                    <?php
                                    $args = array(
                                        'post_type' => 'community-type',
                                        'posts_per_page' => 4,
                                    );

                                    $query = new WP_Query($args);
                                    while ($query->have_posts()):$query->the_post();
                                        ?>
                                        <li>
                                            <div class="input-group margin-bottom-sm btn-groups-xee">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </span>
                                                <a href="<?php echo the_permalink(761); ?>" class="btn btn-default btn-xee"><?php the_title(); ?></a>
                                            </div>
                                        </li>
                                        <?php
                                    endwhile;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 comminucation-banner2"></div>
                        <div class="single_games_comments_sections">
                            <div class="comments_section_before">

                            </div>

                        </div>
                        <!-- <div class="row comment">
                            <div class="col-md-1" style="float: left;margin-bottom: 15px;">
                                <img alt="" src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="40" width="40"></div>
                            <div class="col-md-10">
                                <div id="comment_form">
                                    <div><h4><i class="fa fa-comments" aria-hidden="true"></i>Comment</h4></div>
                                    <div>
                                        <textarea rows="10" name="comment" id="comment" class="textarea" placeholder="Enter Your Comment Here"></textarea>
                                    </div>
                                    <div>
                                        <input type="text" name="name" id="name" value="" class="textbox" placeholder="Name">
                                    </div>
                                    <div>
                                        <input type="email" name="email" id="email" value="" class="textbox" placeholder="Email">
                                    </div>
                                    <div class="comment-footer">
                                        <ul class="comments_ul">
                                            <li><img alt="" src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32" style="border-radius: 15px;"></li>
                                            <li><i class="fa fa-user-o" aria-hidden="true"></i>JS</li>
                                            <li><i class="fa fa-user-o" aria-hidden="true"></i>Apri 13th, 2017 12:26
                                            </li>
                                        </ul>
                                        <p class="comment_para">Any1 played it ready? Is it worth buying?</p>
                                        <ul class="comments_rate_ul">
                                            <li>Rate this comment</li>
                                            <li>0 <i class="fa fa-thumbs-up" aria-hidden="true"></i></li>
                                            <li>0 <i class="fa fa-thumbs-down" aria-hidden="true"></i></li>
                                            <li><a href="#" class="comment-reply">Reply</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!--End Zain css here-->
            </div>
        </div>
</div>
</div>
</main><!-- #main -->
</div><!-- #primary -->
<style>
    .comment{
        display: none;
    }
</style>
<script>
        jQuery(document).ready(function () {
        jQuery(".single_games_comments").insertAfter(".comments_section_before");
    jQuery(".single_games_comments").show();
    });

</script>
<?php
get_footer();
