<?php

class inner_pages_shortcodes {

    public function __construct() {
        //silder shortcode buying guide page
        add_shortcode('buying_guides_sliders_showes', array($this, "buying_guide_slider_shower"));

        add_shortcode("gammer-videos", array($this, "gamming_videos"));

        add_shortcode("show-side-bar-video-filter", array($this, "gamming_show_cats"));

        add_action("wp_footer", array($this, "footer_scriptss_muy"));

        add_action('wp_ajax_search_video_based_on_character', array($this, 'search_video_based_on_character'));
        add_action('wp_ajax_nopriv_search_video_based_on_character', array($this, 'search_video_based_on_character'));

        add_action('wp_ajax_search_video_based_on_character_by_cat', array($this, 'search_video_based_on_character_by_cat'));

        add_action('wp_ajax_nopriv_search_video_based_on_character_by_cat', array($this, 'search_video_based_on_character_by_cat'));

        add_action('wp_ajax_search_likes_chartes', array($this, 'search_likes_chartes'));

        add_action('wp_ajax_nopriv_search_likes_chartes', array($this, 'search_likes_chartes'));

        add_shortcode("show-all-games", array($this, "show_games_all"));

        add_shortcode("show-peripheral-all", array($this, "show_peripheral_all"));

        add_shortcode("show-game-peripheral-all", array($this, "show_game_universal_all"));

        add_action('wp_ajax_search_likes_chartes_dislikes', array($this, 'search_likes_chartes_dislikes'));
        add_action('wp_ajax_nopriv_search_likes_chartes_dislikes', array($this, 'search_likes_chartes_dislikes'));

        add_shortcode("game-database", array($this, "show_database_games"));

        add_action("wp_ajax_search_likes_chartes_dislikes_compare", array($this, "search_likes_chartes_dislikes_compare"));

        add_action("wp_ajax_nopriv_search_likes_chartes_dislikes_compare", array($this, "search_likes_chartes_dislikes_compare"));

        add_action('wp_ajax_search_likes_chartes_likes_actives', array($this, 'search_likes_chartes_likes_actives'));
        add_action('wp_ajax_nopriv_search_likes_chartes_likes_actives', array($this, 'search_likes_chartes_likes_actives'));
        add_shortcode("game-database-cats", array($this, "show_database_games_cats"));

        add_action('wp_ajax_search_likes_actives_dis', array($this, 'search_likes_actives_dis'));
        add_action('wp_ajax_nopriv_search_likes_actives_dis', array($this, 'search_likes_actives_dis'));

        add_action('wp_ajax_show_cats_games_posts_shows', array($this, 'show_cats_games_posts_shows'));
        add_action('wp_ajax_nopriv_show_cats_games_posts_shows', array($this, 'show_cats_games_posts_shows'));

        add_action('wp_ajax_show_posts_games_image', array($this, 'show_posts_games_image'));
        add_action('wp_ajax_nopriv_show_posts_games_image', array($this, 'show_posts_games_image'));

        add_shortcode("ads-banner", array($this, "ads_banner_image"));
        add_shortcode("top-ten-rating-games", array($this, "top_ten_rating_game_show"));

        add_shortcode("buying-cats-shows", array($this, "buying_cat_shows_always"));
        add_shortcode("ggames-cats-shows", array($this, "games_cat_shows_always"));

        add_shortcode("similar-products-game", array($this, "similar_product_games"));
        add_shortcode("similar-products-magazine", array($this, "similar_product_magazine"));

        add_action('wp_ajax_games_sorting_cat', array($this, 'games_sorting_cat'));
        add_action('wp_ajax_nopriv_games_sorting_cat', array($this, 'games_sorting_cat'));

        add_action('wp_ajax_games_new_relatd_show', array($this, 'games_new_relatd_show'));
        add_action('wp_ajax_nopriv_games_new_relatd_show', array($this, 'games_new_relatd_show'));

        add_shortcode("show-recent-posts", array($this, "show_posts_recents_classified"));
        add_shortcode("post-type-terms-get",array($this,"show_post_type_terms"));

        add_action('wp_ajax_show_cats_related_posts', array($this, 'show_cats_related_posts'));
        add_action('wp_ajax_nopriv_show_cats_related_posts', array($this, 'show_cats_related_posts'));
        add_action('wp_ajax_games_sorting_cat_pref', array($this, 'games_sorting_cat_pref'));
        add_action('wp_ajax_nopriv_games_sorting_cat_pref', array($this, 'games_sorting_cat_pref'));
        add_action('wp_ajax_show_posts_games_image_pref', array($this, 'show_posts_games_image_pref'));
        add_action('wp_ajax_nopriv_show_posts_games_image_pref', array($this, 'show_posts_games_image_pref'));

        add_action('wp_ajax_games_sorting_cat_univ', array($this, 'games_sorting_cat_univ'));
        add_action('wp_ajax_nopriv_games_sorting_cat_univ', array($this, 'games_sorting_cat_univ'));

        add_action('wp_ajax_games_sorting_cat_game_univers', array($this, 'games_sorting_cat_game_univers'));

        add_action('wp_ajax_nopriv_games_sorting_cat_game_univers', array($this, 'games_sorting_cat_game_univers'));

        add_action('wp_ajax_show_cats_games_posts_shows_filters', array($this, 'show_cats_games_posts_shows_filters'));

        add_action('wp_ajax_nopriv_show_cats_games_posts_shows_filters', array($this, 'show_cats_games_posts_shows_filters'));
        
    }
    function show_cats_games_posts_shows_filters(){
        $cats_ids = $_POST["cats_ids"];
        $meta_exp = get_post_meta($cats_ids,"community_field_ids",true);
        $exp_fld = explode(",",$meta_exp);
        global $wpdb;
        if(!empty($exp_fld)){
            foreach($exp_fld as $exp_flds){
                //echo $exp_flds."<br>";
                $Featured_Image = wp_get_attachment_image_src(get_post_thumbnail_id($exp_flds), 'full');
                $com_link = get_post_meta($exp_flds, 'wpcf-link', true);
                $query_res = "select $wpdb->posts.* from $wpdb->posts where $wpdb->posts.ID=".$exp_flds;
                $res_query = $wpdb->get_results($query_res,OBJECT);
                
                foreach($res_query as $vals){
                    ?>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="community-main-box">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="<?php echo $Featured_Image[0]; ?>" alt="community logo">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $vals->post_title; ?></h4>
                                    <p>
                                        <?php echo $vals->post_content; ?>
                                    </p>
                                    <a href="<?php echo $com_link; ?>" target="_blank">Community link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                
                
            }
        }
        
        /*$args = array(
                'post_type' => 'game-univer',
                'post_title' => $pref_search_game_txt,
                'post_status' => 'publish',
                'posts_per_page' => -1);
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                }
        }*/
        die();
    }
    function games_sorting_cat_univ(){
        $pref_search_game_txt = $_POST["pref_search_game_txt"];
        $main_cat = $_POST["main_cat"];
        $sub_cats = $_POST["sub_cats"];
        $html = '';
        if ($pref_search_game_txt != "" && $main_cat != "" && $sub_cats != "") {

            $args = array(
                'post_type' => 'game-univer',
                'post_title' => $pref_search_game_txt,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-universe-category',
                        'field' => 'id',
                        'terms' => peripherals-caterory
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-universe-category', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    if ($term_ids == $sub_cats) {
                        $content = get_the_content($post_id);

                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }
                        $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                        }
                        $admin_rate = array(
                        'post_type' => 'review',
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => 'wpcf-post-id',
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                        $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                    $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                                    'post_parent' => $post_id,
                                                                    'post_type' => 'review',
                                                                    'post_status' => 'publish'
                                                                );
                                                                $query_rate = new WP_Query($args_rate);
                                                                $count_user = $query_rate->post_count;
                                                                $total = '';
                                                                $total_rating = '';
                                                                $final_rating = '';
                                                if ($query_rate->have_posts()) {
                                                                    while ($query_rate->have_posts()) {
                                                                        $query_rate->the_post();
                                                                        $post_id_rate = get_the_ID();
                                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                        $total = $total + $post_rate;
                                                                    }
                                                                    $total_rating = $total / $count_user;
                                                                    $final_rating = $total_rating * 20;
                                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                                } else {
                                                                    $html .= '<span>0</span>';
                                                                }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                            } else {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                        }


                        $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        } else if ($pref_search_game_txt != "" && $main_cat == "" && $sub_cats == "") {
//echo "only title";

            $args = array(
                'post_type' => 'game-univer',
                's' => $pref_search_game_txt,
                'post_status' => 'publish',
                'orderby' => 'title',
                'posts_per_page' => -1,
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-universe-category', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;

                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                       <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                                                if (!empty($term_list)) {
                                                    $html .= '<span class="cat_name">
                                                                                <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                                            </span>';
                                                }
                                                $admin_rate = array(
                                                    'post_type' => 'review',
                                                    'post_status' => 'publish',
                                                    'meta_query' => array(
                                                        array(
                                                            'key' => 'wpcf-post-id',
                                                            'value' => $post_id,
                                                            'compare' => '=',
                                                        ),
                                                    )
                                                );
                                                $query_rate_admin = new WP_Query($admin_rate);

                                                $count_user_admin = $query_rate_admin->post_count;


                                                 $j=0;
                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                                'post_parent' => $post_id,
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish'
                                                            );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
                                                    if ($query_rate->have_posts()) {
                                                            while ($query_rate->have_posts()) {
                                                                $query_rate->the_post();
                                                                $post_id_rate = get_the_ID();
                                                                $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                $total = $total + $post_rate;
                                                            }
                                                            $total_rating = $total / $count_user;
                                                            $final_rating = $total_rating * 20;
                                                            $html .= '<span>' . round($final_rating) . '</span>';
                                                        } else {
                                                            $html .= '<span>0</span>';
                                                        }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else if ($pref_search_game_txt != "" && $main_cat != "" && $sub_cats == "") {
            $u = 0;

            $args = array(
                'post_type' => 'game-univer',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-universe-category',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $post_title = mb_strtoupper(get_the_title($post_id));
                    $titles = mb_strtoupper($pref_search_game_txt);
                    if (strpos($post_title, $titles) !== false) {
                        $u = 1;
                        $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                        $term_list = wp_get_post_terms($post_id, 'game-universe-category', array("fields" => "all"));
                        $term_ids = $term_list[0]->term_id;
                        $content = get_the_content($post_id);
                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }
                        $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                        }

                        $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                               $admin_rate = array(
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish',
                                                                'meta_query' => array(
                                                                    array(
                                                                        'key' => 'wpcf-post-id',
                                                                        'value' => $post_id,
                                                                        'compare' => '=',
                                                                    ),
                                                                )
                                                            );
                                                $query_rate_admin = new WP_Query($admin_rate);
                                                $count_user_admin = $query_rate_admin->post_count;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }

                                                $j=0;

                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading"> Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                               $args_rate = array(
                                                        'post_parent' => $post_id,
                                                        'post_type' => 'review',
                                                        'post_status' => 'publish'
                                                    );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
                                                if ($query_rate->have_posts()) {
                                                        while ($query_rate->have_posts()) {
                                                            $query_rate->the_post();
                                                            $post_id_rate = get_the_ID();
                                                            $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                            $total = $total + $post_rate;
                                                        }
                                                        $total_rating = $total / $count_user;
                                                        $final_rating = $total_rating * 20;
                                                        $html .= '<span>' . round($final_rating) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                               $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading"> USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                            } else {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                        }


                        $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }
            if ($u == 0) {
                $html .= 'No posts found';
            }

            echo $html;
        } else if ($pref_search_game_txt == "" && $main_cat != "" && $sub_cats == "") {
//echo "only main cat";
            $html = '';

            $args = array(
                'post_type' => 'game-univer',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-universe-category',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-universe-category', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                            </span>';
                    }

                    $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5>' . get_the_title($post_id) . '</h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                                $admin_rate = array(
                                                            'post_type' => 'review',
                                                            'post_status' => 'publish',
                                                            'meta_query' => array(
                                                                array(
                                                                    'key' => 'wpcf-post-id',
                                                                    'value' => $post_id,
                                                                    'compare' => '=',
                                                                ),
                                                            )
                                                        );
                                                        $query_rate_admin = new WP_Query($admin_rate);

                                                        $count_user_admin = $query_rate_admin->post_count;


                                                        $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                            $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                             $args_rate = array(
                                                                'post_parent' => $post_id,
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish'
                                                            );
                                                            $query_rate = new WP_Query($args_rate);
                                                            $count_user = $query_rate->post_count;
                                                            $total = '';
                                                            $total_rating = '';
                                                            $final_rating = '';
                                            if ($query_rate->have_posts()) {
                                                                while ($query_rate->have_posts()) {
                                                                    $query_rate->the_post();
                                                                    $post_id_rate = get_the_ID();
                                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                    $total = $total + $post_rate;
                                                                }
                                                                $total_rating = $total / $count_user;
                                                                $final_rating = $total_rating * 20;
                                                                $html .= '<span>' . round($final_rating) . '</span>';
                                                            } else {
                                                                $html .= '<span>0</span>';
                                                            }   
                                           $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>Dislike</h6>
                                                        </a>
                                                        </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>like</h6>
                                                        </a>
                                                        </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->
                            </div>
                        </div>';
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else if ($pref_search_game_txt == "" && $main_cat != "" && $sub_cats != "") {
            $args = array(
                'post_type' => 'game-univer',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-universe-category',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-universe-category', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    if ($term_ids == $sub_cats) {
                        $content = get_the_content($post_id);
                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }

                        $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                        }

                        $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                    $admin_rate = array(
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish',
                                                                'meta_query' => array(
                                                                    array(
                                                                        'key' => 'wpcf-post-id',
                                                                        'value' => $post_id,
                                                                        'compare' => '=',
                                                                    ),
                                                                )
                                                            );
                                                        $query_rate_admin = new WP_Query($admin_rate);

                                                        $count_user_admin = $query_rate_admin->post_count;


                                                    $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                        'post_parent' => $post_id,
                                                        'post_type' => 'review',
                                                        'post_status' => 'publish'
                                                    );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
                                                    if ($query_rate->have_posts()) {
                                                        while ($query_rate->have_posts()) {
                                                            $query_rate->the_post();
                                                            $post_id_rate = get_the_ID();
                                                            $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                            $total = $total + $post_rate;
                                                        }
                                                        $total_rating = $total / $count_user;
                                                        $final_rating = $total_rating * 20;
                                                        $html .= '<span>' . round($final_rating) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                            } else {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                        }
                        $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else {
            
        }
        die();
        
    }
    function games_sorting_cat_game_univers(){
        $sorting_type = $_POST["sorting_type"];
        $html = '';
        if ($sorting_type == "id") {
            $args = array(
                'post_type' => 'game-univer',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'ID',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title($post_id);
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-universe-category', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                    }
                    $args_rate = array(
                        'post_parent' => $post_id,
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
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . substr($title, 0, 20) . '...</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                    $html .= '<span>' . round($final_rating1) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                            if ($query_rate->have_posts()) {
                                                while ($query_rate->have_posts()) {
                                                    $query_rate->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user;
                                                $final_rating = $total_rating * 20;
                                                $html .= '<span>' . round($final_rating) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '...
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        } else {

            $args = array(
                'post_type' => 'game-univer',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title($post_id);
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-universe-category', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                    }
                    $args_rate = array(
                        'post_parent' => $post_id,
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
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . substr($title, 0, 20) . '...</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                    $html .= '<span>' . round($final_rating1) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                if ($query_rate->have_posts()) {
                                                    while ($query_rate->have_posts()) {
                                                        $query_rate->the_post();
                                                        $post_id_rate = get_the_ID();
                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                        $total = $total + $post_rate;
                                                    }
                                                    $total_rating = $total / $count_user;
                                                    $final_rating = $total_rating * 20;
                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '...
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        }
        die();
    }
    function show_posts_games_image_pref(){
        $pref_search_game_txt = $_POST["pref_search_game_txt"];
        $main_cat = $_POST["main_cat"];
        $sub_cats = $_POST["sub_cats"];
        $html = '';
        if ($pref_search_game_txt != "" && $main_cat != "" && $sub_cats != "") {

            $args = array(
                'post_type' => 'peripheral',
                'post_title' => $pref_search_game_txt,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-cat',
                        'field' => 'id',
                        'terms' => peripherals-caterory
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'peripherals-caterory', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    if ($term_ids == $sub_cats) {
                        $content = get_the_content($post_id);

                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }
                        $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                        }
                        $admin_rate = array(
                        'post_type' => 'review',
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => 'wpcf-post-id',
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                        $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                    $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                                    'post_parent' => $post_id,
                                                                    'post_type' => 'review',
                                                                    'post_status' => 'publish'
                                                                );
                                                                $query_rate = new WP_Query($args_rate);
                                                                $count_user = $query_rate->post_count;
                                                                $total = '';
                                                                $total_rating = '';
                                                                $final_rating = '';
                                                if ($query_rate->have_posts()) {
                                                                    while ($query_rate->have_posts()) {
                                                                        $query_rate->the_post();
                                                                        $post_id_rate = get_the_ID();
                                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                        $total = $total + $post_rate;
                                                                    }
                                                                    $total_rating = $total / $count_user;
                                                                    $final_rating = $total_rating * 20;
                                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                                } else {
                                                                    $html .= '<span>0</span>';
                                                                }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                            } else {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                        }


                        $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        } else if ($pref_search_game_txt != "" && $main_cat == "" && $sub_cats == "") {
//echo "only title";

            $args = array(
                'post_type' => 'peripheral',
                's' => $pref_search_game_txt,
                'post_status' => 'publish',
                'orderby' => 'title',
                'posts_per_page' => -1,
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;

                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                       <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                                                if (!empty($term_list)) {
                                                    $html .= '<span class="cat_name">
                                                                                <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                                            </span>';
                                                }
                                                $admin_rate = array(
                                                    'post_type' => 'review',
                                                    'post_status' => 'publish',
                                                    'meta_query' => array(
                                                        array(
                                                            'key' => 'wpcf-post-id',
                                                            'value' => $post_id,
                                                            'compare' => '=',
                                                        ),
                                                    )
                                                );
                                                $query_rate_admin = new WP_Query($admin_rate);

                                                $count_user_admin = $query_rate_admin->post_count;


                                                 $j=0;
                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                                'post_parent' => $post_id,
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish'
                                                            );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
                                                    if ($query_rate->have_posts()) {
                                                            while ($query_rate->have_posts()) {
                                                                $query_rate->the_post();
                                                                $post_id_rate = get_the_ID();
                                                                $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                $total = $total + $post_rate;
                                                            }
                                                            $total_rating = $total / $count_user;
                                                            $final_rating = $total_rating * 20;
                                                            $html .= '<span>' . round($final_rating) . '</span>';
                                                        } else {
                                                            $html .= '<span>0</span>';
                                                        }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else if ($pref_search_game_txt != "" && $main_cat != "" && $sub_cats == "") {
            $u = 0;

            $args = array(
                'post_type' => 'peripheral',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'peripherals-caterory',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $post_title = mb_strtoupper(get_the_title($post_id));
                    $titles = mb_strtoupper($pref_search_game_txt);
                    if (strpos($post_title, $titles) !== false) {
                        $u = 1;
                        $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                        $term_list = wp_get_post_terms($post_id, 'peripherals-caterory', array("fields" => "all"));
                        $term_ids = $term_list[0]->term_id;
                        $content = get_the_content($post_id);
                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }
                        $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                        }

                        $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                               $admin_rate = array(
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish',
                                                                'meta_query' => array(
                                                                    array(
                                                                        'key' => 'wpcf-post-id',
                                                                        'value' => $post_id,
                                                                        'compare' => '=',
                                                                    ),
                                                                )
                                                            );
                                                $query_rate_admin = new WP_Query($admin_rate);
                                                $count_user_admin = $query_rate_admin->post_count;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }

                                                $j=0;

                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading"> Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                               $args_rate = array(
                                                        'post_parent' => $post_id,
                                                        'post_type' => 'review',
                                                        'post_status' => 'publish'
                                                    );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
                                                if ($query_rate->have_posts()) {
                                                        while ($query_rate->have_posts()) {
                                                            $query_rate->the_post();
                                                            $post_id_rate = get_the_ID();
                                                            $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                            $total = $total + $post_rate;
                                                        }
                                                        $total_rating = $total / $count_user;
                                                        $final_rating = $total_rating * 20;
                                                        $html .= '<span>' . round($final_rating) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                               $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading"> USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                            } else {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                        }


                        $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }
            if ($u == 0) {
                $html .= 'No posts found';
            }

            echo $html;
        } else if ($pref_search_game_txt == "" && $main_cat != "" && $sub_cats == "") {
//echo "only main cat";
            $html = '';

            $args = array(
                'post_type' => 'peripheral',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'peripherals-caterory',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'peripherals-caterory', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                            </span>';
                    }

                    $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5>' . get_the_title($post_id) . '</h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                                $admin_rate = array(
                                                            'post_type' => 'review',
                                                            'post_status' => 'publish',
                                                            'meta_query' => array(
                                                                array(
                                                                    'key' => 'wpcf-post-id',
                                                                    'value' => $post_id,
                                                                    'compare' => '=',
                                                                ),
                                                            )
                                                        );
                                                        $query_rate_admin = new WP_Query($admin_rate);

                                                        $count_user_admin = $query_rate_admin->post_count;


                                                        $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                            $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                             $args_rate = array(
                                                                'post_parent' => $post_id,
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish'
                                                            );
                                                            $query_rate = new WP_Query($args_rate);
                                                            $count_user = $query_rate->post_count;
                                                            $total = '';
                                                            $total_rating = '';
                                                            $final_rating = '';
                                            if ($query_rate->have_posts()) {
                                                                while ($query_rate->have_posts()) {
                                                                    $query_rate->the_post();
                                                                    $post_id_rate = get_the_ID();
                                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                    $total = $total + $post_rate;
                                                                }
                                                                $total_rating = $total / $count_user;
                                                                $final_rating = $total_rating * 20;
                                                                $html .= '<span>' . round($final_rating) . '</span>';
                                                            } else {
                                                                $html .= '<span>0</span>';
                                                            }   
                                           $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>Dislike</h6>
                                                        </a>
                                                        </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>like</h6>
                                                        </a>
                                                        </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->
                            </div>
                        </div>';
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else if ($pref_search_game_txt == "" && $main_cat != "" && $sub_cats != "") {
            $args = array(
                'post_type' => 'peripheral',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'peripherals-caterory',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'peripherals-caterory', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    if ($term_ids == $sub_cats) {
                        $content = get_the_content($post_id);
                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }

                        $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                        }

                        $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . get_the_title($post_id) . '</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                    $admin_rate = array(
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish',
                                                                'meta_query' => array(
                                                                    array(
                                                                        'key' => 'wpcf-post-id',
                                                                        'value' => $post_id,
                                                                        'compare' => '=',
                                                                    ),
                                                                )
                                                            );
                                                        $query_rate_admin = new WP_Query($admin_rate);

                                                        $count_user_admin = $query_rate_admin->post_count;


                                                    $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                        'post_parent' => $post_id,
                                                        'post_type' => 'review',
                                                        'post_status' => 'publish'
                                                    );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
                                                    if ($query_rate->have_posts()) {
                                                        while ($query_rate->have_posts()) {
                                                            $query_rate->the_post();
                                                            $post_id_rate = get_the_ID();
                                                            $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                            $total = $total + $post_rate;
                                                        }
                                                        $total_rating = $total / $count_user;
                                                        $final_rating = $total_rating * 20;
                                                        $html .= '<span>' . round($final_rating) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                                $html .='</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                            } else {
                                $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                        }
                        $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else {
            
        }
        die();
    }
    function games_sorting_cat_pref(){
        $sorting_type = $_POST["sorting_type"];
        $html = '';
        if ($sorting_type == "id") {
            $args = array(
                'post_type' => 'peripheral',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'ID',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title($post_id);
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'peripherals-caterory', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                    }
                    $args_rate = array(
                        'post_parent' => $post_id,
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
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . substr($title, 0, 20) . '...</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                    $html .= '<span>' . round($final_rating1) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                            if ($query_rate->have_posts()) {
                                                while ($query_rate->have_posts()) {
                                                    $query_rate->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user;
                                                $final_rating = $total_rating * 20;
                                                $html .= '<span>' . round($final_rating) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '...
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        } else {

            $args = array(
                'post_type' => 'peripheral',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title($post_id);
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'peripherals-caterory', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                    }
                    $args_rate = array(
                        'post_parent' => $post_id,
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
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . substr($title, 0, 20) . '...</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                    $html .= '<span>' . round($final_rating1) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                if ($query_rate->have_posts()) {
                                                    while ($query_rate->have_posts()) {
                                                        $query_rate->the_post();
                                                        $post_id_rate = get_the_ID();
                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                        $total = $total + $post_rate;
                                                    }
                                                    $total_rating = $total / $count_user;
                                                    $final_rating = $total_rating * 20;
                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '...
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        }
        die();
    }
    function show_cats_related_posts(){
        $post_types_name = $_POST["post_types_name"];
        $taxonomy_name = $_POST["taxonomy_name"];
        $term_id = $_POST["term_id"];
        
        $html = '';

        $args = array(
            'post_type' => $post_types_name,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy_name,
                    'field' => 'id',
                    'terms' => $term_id
                )
            )
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {

            function getUserIPS() {
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

            $user_ip = getUserIPS();
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                $term_ids = $term_list[0]->term_id;
                $content = get_the_content($post_id);

                $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                if (empty($post_counts)) {
                    $counts = 0;
                } else {
                    $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                }

                $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                if (!empty($term_list)) {
                    $html .= '<span class="cat_name">
                                                <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                            </span>';
                }

                $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5><a href="'.get_the_permalink($post_id).'">' . get_the_title($post_id) . '</a></h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                            $admin_rate = array(
                                                'post_type' => 'review',
                                                'post_status' => 'publish',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'wpcf-post-id',
                                                        'value' => $post_id,
                                                        'compare' => '=',
                                                    ),
                                                )
                                            );
                                            $query_rate_admin = new WP_Query($admin_rate);

                                            $count_user_admin = $query_rate_admin->post_count;
                                            $j=0;
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
                                                $html .= '<span>' . round($final_rating1) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }                                                
                                            $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                            $args_rate = array(
                                                    'post_parent' => $post_id,
                                                    'post_type' => 'review',
                                                    'post_status' => 'publish'
                                                );
                                                $query_rate = new WP_Query($args_rate);
                                                $count_user = $query_rate->post_count;
                                                $total = '';
                                                $total_rating = '';
                                                $final_rating = '';
                                            if ($query_rate->have_posts()) {
                                                    while ($query_rate->have_posts()) {
                                                        $query_rate->the_post();
                                                        $post_id_rate = get_the_ID();
                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                        $total = $total + $post_rate;
                                                    }
                                                    $total_rating = $total / $count_user;
                                                    $final_rating = $total_rating * 20;
                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                } 
                                            $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                if (!empty($post_counts)) {

                    if (in_array($user_ip, $post_counts)) {
                        $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>Dislike</h6>
                                                        </a>
                                                        </div>';
                    } else {
                        $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>like</h6>
                                                        </a>
                                                        </div>';
                    }
                } else {
                    $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                }


                $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->

                            </div>
                        </div>';
            }
        } else {
            $html .= 'No posts found';
        }


        echo $html;
        die();
    }
    function show_post_type_terms($atts = array(), $content = null, $tag){
        shortcode_atts(array(
        'var1' => 'default var1',
        'taxonomy-name' => false,
        'post-type-name' => false
            ), $atts);
        $html ='';
        if(!empty($atts["taxonomy-name"])){
            $taxonomy = $atts["taxonomy-name"];
            $parents = get_terms($taxonomy, array('hide_empty' => false, 'orderby' => 'id'));

            if (!empty($parents)) {
                foreach ($parents as $parent_link) {

                    $html .= '<a href="#' . $parent_link->slug . '" class="list-group-item list-group-item-success strong type-inner show-results-type" data-post-name ="'.$atts["post-type-name"].'" data-taxonomy="'.$atts["taxonomy-name"].'" data-toggle="collapse" data-parent="#MainMenu" id="' . $parent_link->term_id . '">' . $parent_link->name . '</a>';
    
                }
            }
        }
        return $html;
    }
    function show_game_universal_all(){
        $html = '';

        $args = array(
            'post_type' => 'game-univer',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {

            function getUserIPS() {
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

            $user_ip = getUserIPS();
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $title = get_the_title($post_id);
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                $term_ids = $term_list[0]->term_id;
                $content = get_the_content($post_id);

                $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                if (empty($post_counts)) {
                    $counts = 0;
                } else {
                    $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                }

                $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                                        if (!empty($term_list)) {
                                            $html .= '<span class="cat_name">
                                                                        <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                                    </span>';
                                        }
                                        $args_rate = array(
                                            'post_parent' => $post_id,
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
                                                    'value' => $post_id,
                                                    'compare' => '=',
                                                ),
                                            )
                                        );
                                        $query_rate_admin = new WP_Query($admin_rate);

                                        $count_user_admin = $query_rate_admin->post_count;

                            $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5><a href="' . get_the_permalink($post_id) . '">' . substr($title, 0, 20) . '...</a></h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
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
                                                $html .= '<span>' . round($final_rating1) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                            if ($query_rate->have_posts()) {
                                                while ($query_rate->have_posts()) {
                                                    $query_rate->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user;
                                                $final_rating = $total_rating * 20;
                                                $html .= '<span>' . round($final_rating) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '...
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                                            if (!empty($post_counts)) {

                                                if (in_array($user_ip, $post_counts)) {
                                                    $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>Dislike</h6>
                                                        </a>
                                                        </div>';
                                                    } else {
                                                        $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>like</h6>
                                                        </a>
                                                        </div>';
                    }
                } else {
                    $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                }


                $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->
                            </div>
                        </div>';
            }
        } else {
            $html .= 'No posts found';
        }


        echo $html;
    }
    function show_posts_recents_classified() {
        $recent_posts = wp_get_recent_posts(array('post_type' => 'guides', 'posts_per_page' => 3));
        foreach ($recent_posts as $recent) {
            ?>
            <ul id = "buying-guide-side">
                <li>
                    <div>
                        <span><img src = "http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                        <div>
                            <h3 class="name-title"><a href="<?php echo get_permalink($recent["ID"]); ?>" <?php echo $recent["post_title"]; ?> ><?php echo $recent["post_title"]; ?></a></h3>
                            <span></span>
                        </div>
                    </div>
                    <p></p>
                </li>
            </ul>
            <?php
//            echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look ' . esc_attr($recent["post_title"]) . '" >' . $recent["post_title"] . '</a> </li> ';
        }
    }

    function games_new_relatd_show() {
        $new_id_post_id = $_POST["new_id"];
        global $wpdb;
        $t = wp_get_post_tags($new_id_post_id);
        $arr = array();
        foreach ($t as $term_like) {
            $args = array(
                'post_type' => 'magazine',
                'post_status' => 'publish',
                'posts_per_page' => 10
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                while ($query->have_posts()) {
                    $query->the_post();
                    $post_ids = get_the_ID();
                    $ts = wp_get_post_tags($post_ids);
                    foreach ($ts as $trm_like) {
                        if ($trm_like->name == $term_like->name) {
                            $arr[] = $post_ids;
                        }
                    }
                }
            }
        }
        $ars = array_unique($arr);
        ?>
        <ul class="media-list result_list">
            <?php
            foreach ($ars as $rss) {
                //echo $rss;
                $featured_img_url = get_the_post_thumbnail_url($rss, 'full');
                ?>
                <li class="media">
                    <div class="col-xs-3">
                        <a href="#">
                            <img class="media-object" src="<?php echo $featured_img_url; ?>" alt="..." style="width:200px; height:200px;" >
                        </a>
                    </div>
                    <div class="col-xs-8">
                        <h4 class="media-heading"><?php echo get_the_title(); ?></h4>
                        <h5>
                            <?php
                            $categories = get_terms('magazine-category', array(
                                'orderby' => 'count',
                                'hide_empty' => 0
                            ));
                            $term_list = wp_get_post_terms($rss, 'magazine-category', array("fields" => "all"));
                            if (!empty($term_list)) {
                                foreach ($term_list as $cats) {
                                    echo $cats->name . ",";
                                }
                            }
                            ?>
                        </h5>
                        <p><?php echo substr(get_the_content(), 200, 400); ?></p>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
        die();
    }

    function games_sorting_cat() {
        $sorting_type = $_POST["sorting_type"];
        $html = '';
        if ($sorting_type == "id") {
            $args = array(
                'post_type' => 'game',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'ID',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title($post_id);
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                    }
                    $args_rate = array(
                        'post_parent' => $post_id,
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
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . substr($title, 0, 20) . '...</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                    $html .= '<span>' . round($final_rating1) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                            if ($query_rate->have_posts()) {
                                                while ($query_rate->have_posts()) {
                                                    $query_rate->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user;
                                                $final_rating = $total_rating * 20;
                                                $html .= '<span>' . round($final_rating) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '...
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        } else {

            $args = array(
                'post_type' => 'game',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title($post_id);
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                                <div class="game_box">
                                    <div class="img-box">
                                        <a href="' . get_the_permalink($post_id) . '">
                                            <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                            <span class="hover-img">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                                <p>Read More</p>
                                            </span>
                                        </a>
                                        <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                                    <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                </span>';
                    }
                    $args_rate = array(
                        'post_parent' => $post_id,
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
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                    $html .= '</div><!--./End Img-box here-->
                                    <div class="game_detailing">
                                        <h5>' . substr($title, 0, 20) . '...</h5>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
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
                                                    $html .= '<span>' . round($final_rating1) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">Expert Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="pull-left rating-bg">';
                                                if ($query_rate->have_posts()) {
                                                    while ($query_rate->have_posts()) {
                                                        $query_rate->the_post();
                                                        $post_id_rate = get_the_ID();
                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                        $total = $total + $post_rate;
                                                    }
                                                    $total_rating = $total / $count_user;
                                                    $final_rating = $total_rating * 20;
                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                }

                                                $html .= '</div>
                                                <div class="media-body rating-text">
                                                    <p class="media-heading">USer Rating</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p class="rating-description">
                                                    ' . substr($content, 0, 200) . '...
                                                </p>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                        <h6>Compare</h6>
                                                    </a>
                                                </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>Dislike</h6>
                                                            </a>
                                                            </div>';
                        } else {
                            $html .= '<div class="col-xs-4">
                                                            <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                                <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                                <h6>like</h6>
                                                            </a>
                                                            </div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                    <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                        <h6>like</h6>
                                                    </a>
                                                </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                    <a href="#" class="user_attach_box">
                                                        <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                        <h6>share</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--./End game_detailing Here-->
                                </div>
                            </div>';
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        }



        die();
    }

    function similar_product_magazine() {
        $actual_link = "$_SERVER[REQUEST_URI]";
        $exp = explode("/", $actual_link);
        // print_r($exp);
        $reverse = array_reverse($exp);

        $z = $reverse[1];
        if ($post = get_page_by_path($z, OBJECT, 'game'))
            $id = $post->ID;
        else
            $id = 0;
        $post_id = $id;
        $term_list = wp_get_post_terms($post_id, 'post_tag', array("fields" => "all"));

        $args = array(
            'post_type' => 'magazine',
            'post_status' => 'publish',
            'posts_per_page' => 10
        );
        $total = '';
        ?>
        <div class="similar-products">
            <h3>SIMILAR PRODUCTS</h3>
            <ul class="clearfix">
                <?php
                $arr = array();
                if (!empty($term_list)) {
                    foreach ($term_list as $terms) {

                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_ids = get_the_ID();
                                $term_lists = wp_get_post_terms($post_ids, 'post_tag', array("fields" => "all"));
                                if (!empty($term_lists)) {
                                    foreach ($term_lists as $term) {
                                        if ($terms->name == $term->name) {

                                            $arr[] = $post_ids;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                // print_r($arr);

                if (!empty($arr)) {
                    $arr = array_unique($arr);
                    global $wpdb;
                    foreach ($arr as $val) {
                        $slect_query = "SELECT $wpdb->posts.* from $wpdb->posts where $wpdb->posts.ID='" . $val . "'";
                        $query_res = $wpdb->get_results($slect_query, OBJECT);

                        foreach ($query_res as $res) {
                            ?>
                            <li>
                                <div>
                                    <span><?php echo $res->post_date; ?></span>
                                    <h4><a href="<?php echo get_the_permalink($res->ID); ?>"> <?php echo $res->post_title; ?></a></h4>
                                </div>
                                <span>
                                    <?php
                                    $slect_querys = "SELECT $wpdb->posts.* from $wpdb->posts where $wpdb->posts.post_parent='" . $res->ID . "'";
                                    $query_res_rate = $wpdb->get_results($slect_querys, OBJECT);
                                    $count_rate = count($query_res_rate);
                                    ?>
                                    <span>
                                        <?php
                                        $slect_querys = "SELECT $wpdb->posts.* from $wpdb->posts where $wpdb->posts.post_parent='" . $res->ID . "'";
                                        $query_res_rate = $wpdb->get_results($slect_querys, OBJECT);
                                        $count_user = count($query_res_rate);
                                        $total_rate = '';

                                        foreach ($query_res_rate as $res_rate) {
                                            $rates = get_post_meta($res_rate->ID, 'wpcf-rating', true);

                                            $total_rate = $total_rate + $rates;
                                        }
                                        ?>
                                        <div class="text"><?php echo $total_rate / $count_rate; ?></div>

                                    </span>
                                </span>
                            </li>
                            <?php
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <?php
    }

    function similar_product_games() {
        $post_id = get_the_ID();
        $term_list = wp_get_post_terms($post_id, 'post_tag', array("fields" => "all"));

        $args = array(
            'post_type' => 'game',
            'post_status' => 'publish',
            'posts_per_page' => 10
        );
        $total = '';
        ?>
        <div class="similar-products">
            <h3>SIMILAR PRODUCTS</h3>
            <ul class="clearfix">
                <?php
                $arr = array();
                if (!empty($term_list)) {
                    foreach ($term_list as $terms) {

                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_ids = get_the_ID();
                                $term_lists = wp_get_post_terms($post_ids, 'post_tag', array("fields" => "all"));
                                if (!empty($term_lists)) {
                                    foreach ($term_lists as $term) {
                                        if ($terms->name == $term->name) {

                                            $arr[] = $post_ids;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }


                if (!empty($arr)) {
                    $arr = array_unique($arr);
                    global $wpdb;
                    foreach ($arr as $val) {
                        $slect_query = "SELECT $wpdb->posts.* from $wpdb->posts where $wpdb->posts.ID='" . $val . "'";
                        $query_res = $wpdb->get_results($slect_query, OBJECT);

                        foreach ($query_res as $res) {
                            ?>
                            <li>
                                <div>
                                    <span><?php echo $res->post_date; ?></span>
                                    <h4><a href="<?php echo get_the_permalink($res->ID); ?>"> <?php echo $res->post_title; ?></a></h4>
                                </div>
                                <span>
                                    <?php
                                    $slect_querys = "SELECT $wpdb->posts.* from $wpdb->posts where $wpdb->posts.post_parent='" . $res->ID . "'";
                                    $query_res_rate = $wpdb->get_results($slect_querys, OBJECT);
                                    $count_rate = count($query_res_rate);
                                    ?>
                                    <span>
                                        <?php
                                        $slect_querys = "SELECT $wpdb->posts.* from $wpdb->posts where $wpdb->posts.post_parent='" . $res->ID . "'";
                                        $query_res_rate = $wpdb->get_results($slect_querys, OBJECT);
                                        $count_user = count($query_res_rate);
                                        $total_rate = '';

                                        foreach ($query_res_rate as $res_rate) {
                                            $rates = get_post_meta($res_rate->ID, 'wpcf-rating', true);

                                            $total_rate = $total_rate + $rates;
                                        }
                                        ?>
                                        <div class="text"><?php //echo $total_rate / $count_rate;                       ?></div>

                                    </span>
                                </span>
                            </li>
                            <?php
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <?php
    }

    function games_cat_shows_always($atts = array(), $content = null, $tags) {
        $html = '';


        shortcode_atts(array(
            'var1' => 'default v0r1',
            'series' => false,
            'category' => false,
            'style' => false,
            'quantity' => false,
            'class' => false
                ), $atts);
        $exp = explode('-', $atts['series']);

        if (!empty($exp[1])) {
            $limit = $exp[1];
        } else if (!empty($atts['quantity'])) {
            $limit = $atts['quantity'];
        }
        $args = array('post_type' => 'game-cat', 'posts_per_page' => $limit, 'offset' => $exp[0], 'category' => $atts['category'], 'orderby' => 'id', 'order' => 'DESC');
        $custom_query = new WP_Query($args);


        if (!empty($atts['series']) && !empty($atts['category']) && empty($atts['quantity']) && empty($atts['style'])) {

            $html = '';
            $i = 0;

            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();


                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));

                $term_lists_id = $term_lists[0]->slug;
                if ($term_lists[0]->term_id == $atts["category"]) {
                    if ($i == 0) {

                        $html .= '<div class="mag-hom-image ' . $atts["class"] . '">

                                <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignleft wp-image-33 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="863" height="355" /></a></div>
                                <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/magazine-category/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                                <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                                <div class="img-icns img-icns-first"><i class="fa fa-share-alt" aria-hidden="true"></i> 20</div>
                                <div class="img-icns"><i class="fa fa-heart" aria-hidden="true"></i> 179</div>
                            </div>';

                        $i = 1;
                    } else {
                        if ($i == 2) {
                            $html .= '<div class="magazine-news">';
                            $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/game-cat/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                        } else {
                            $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/game-cat/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                        }

                        if ($i == 5) {
                            $html .= '</div>';
                        }
                    }
                }

                $i++;
            endwhile;
            echo $html;
        } else if (!empty($atts["series"]) && empty($atts["quantity"]) && empty($atts["category"]) && empty($atts['style'])) {
            $html = '';
            $i = 0;

            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();

                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));

                $term_lists_id = $term_lists[0]->slug;

                if ($i == 0) {

                    $html .= '<div class="mag-hom-image ' . $atts["class"] . '">

                                <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignleft wp-image-33 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="863" height="355" /></a></div>
                                <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/magazine-category/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                                <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                                <div class="img-icns img-icns-first"><i class="fa fa-share-alt" aria-hidden="true"></i> 20</div>
                                <div class="img-icns"><i class="fa fa-heart" aria-hidden="true"></i> 179</div>
                            </div>';

                    $i = 1;
                } else {
                    if ($i == 2) {
                        $html .= '<div class="magazine-news">';
                        $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/game-cat/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                    } else {
                        $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/game-cat/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                    }

                    if ($i == 5) {
                        $html .= '</div>';
                    }
                }


                $i++;
            endwhile;

            echo $html;
        } else if (!empty($atts["series"]) && !empty($atts["style"]) && empty($atts["quantity"]) && empty($atts["category"])) {

            $html = '';
            $html .= '<div class="magazine-news">';
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));

                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');


                $term_lists_id = $term_lists[0]->slug;
                $html .= '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">
                            <p>
                                ';

                $html .= '<div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . $featured_img_url . '" alt="" width="425" height="271" srcset="' . $featured_img_url . ' 300w" sizes="(max-width: 425px) 100vw, 425px">
                                </a></div>';

                $html .= '</p>
                            <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/game-cat/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                            <h2><a href="#">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                    </div>';


            endwhile;
            $html .= '</div>';
            wp_reset_postdata();
            return $html;
        }
        else if (!empty($atts['quantity']) && !empty($atts['category'])) {
            $html = '';
            $html .= '<div class="magazine-news">';
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                if ($term_lists[0]->term_id == $atts['category']) {
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');


                    $term_lists_id = $term_lists[0]->slug;
                    $html .= '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">
                            <p>
                                ';

                    $html .= '<div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . $featured_img_url . '" alt="" width="425" height="271" srcset="' . $featured_img_url . ' 300w" sizes="(max-width: 425px) 100vw, 425px">
                                </a></div>';

                    $html .= '</p>
                            <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/game-cat/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                            <h2><a href="#">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                    </div>';
                }

            endwhile;
            $html .= '</div>';
            wp_reset_postdata();
            echo $html;
        } else if (!empty($atts['quantity']) && empty($atts["category"]) && empty($atts["series"]) && empty($atts["style"])) {
            $html = '';
            $html .= '<div class="magazine-news">';
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));

                $term_lists_id = $term_lists[0]->slug;
                $html .= '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">
                            <p>
                                ';

                $html .= '<div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . $featured_img_url . '" alt="" width="425" height="271" srcset="' . $featured_img_url . ' 300w" sizes="(max-width: 425px) 100vw, 425px">
                                </a></div>';

                $html .= '</p>
                            <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/game-cat/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                            <h2><a href="#">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                    </div>';

            endwhile;
            $html .= '</div>';

            echo $html;
        }
    }

    function buying_cat_shows_always($atts = array(), $content = null, $tags) {
        /* shortcode_atts(array(
          'var1' => 'default var1',
          'title' => false,
          'contents' => false,
          'content' => false,
          'link' => false,
          'about' => false
          ), $atts); */
        $html = '';


        shortcode_atts(array(
            'var1' => 'default v0r1',
            'series' => false,
            'category' => false,
            'style' => false,
            'quantity' => false,
            'class' => false
                ), $atts);
        $exp = explode('-', $atts['series']);

        if (!empty($exp[1])) {
            $limit = $exp[1];
        } else if (!empty($atts['quantity'])) {
            $limit = $atts['quantity'];
        }
        $args = array('post_type' => 'guides', 'posts_per_page' => $limit, 'offset' => $exp[0], 'category' => $atts['category'], 'orderby' => 'id', 'order' => 'DESC');
        $custom_query = new WP_Query($args);


        if (!empty($atts['series']) && !empty($atts['category']) && empty($atts['quantity']) && empty($atts['style'])) {

            $html = '';
            $i = 0;

            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();


                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "all"));

                $term_lists_id = $term_lists[0]->slug;
                if ($term_lists[0]->term_id == $atts["category"]) {
                    if ($i == 0) {

                        $html .= '<div class="mag-hom-image ' . $atts["class"] . '">

                                <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignleft wp-image-33 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="863" height="355" /></a></div>
                                <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/magazine-category/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                                <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                                <div class="img-icns img-icns-first"><i class="fa fa-share-alt" aria-hidden="true"></i> </div>
                                <div class="img-icns"><i class="fa fa-heart" aria-hidden="true"></i> 179</div>
                            </div>';

                        $i = 1;
                    } else {
                        if ($i == 2) {
                            $html .= '<div class="magazine-news">';
                            $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                        } else {
                            $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                        }

                        if ($i == 5) {
                            $html .= '</div>';
                        }
                    }
                }

                $i++;
            endwhile;
            echo $html;
        } else if (!empty($atts["series"]) && empty($atts["quantity"]) && empty($atts["category"]) && empty($atts['style'])) {
            $html = '';
            $i = 0;

            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();

                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "all"));

                $term_lists_id = $term_lists[0]->slug;
                $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                $counts = count($post_counts);
                if ($i == 0) {

                    $html .= '<div class="mag-hom-image ' . $atts["class"] . '">

                                <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignleft wp-image-33 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="863" height="355" /></a></div>
                                <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                                <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                                <div class="img-icns img-icns-first"><i class="fa fa-share-alt" aria-hidden="true"></i> 20</div>
                                <div class="img-icns"><i class="fa fa-heart" aria-hidden="true"></i>' . $counts . ' </div>
                            </div>';

                    $i = 1;
                } else {
                    if ($i == 2) {
                        $html .= '<div class="magazine-news">';
                        $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                    } else {
                        $html .= '
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">

                        <div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . esc_url($featured_img_url) . '" alt="" width="425" height="271" /></a></div>
                        <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                        <h2><a href="' . get_the_permalink($post_id) . '">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                        </div>
                        ';
                    }

                    if ($i == 5) {
                        $html .= '</div>';
                    }
                }


                $i++;
            endwhile;

            echo $html;
        } else if (!empty($atts["series"]) && !empty($atts["style"]) && empty($atts["quantity"]) && empty($atts["category"])) {

            $html = '';
            $html .= '<div class="magazine-news">';
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();
                $term_list = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "all"));

                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');


                $term_lists_id = $term_lists[0]->slug;
                $html .= '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">
                            <p>
                                ';

                $html .= '<div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . $featured_img_url . '" alt="" width="425" height="271" srcset="' . $featured_img_url . ' 300w" sizes="(max-width: 425px) 100vw, 425px">
                                </a></div>';

                $html .= '</p>
                            <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                            <h2><a href="#">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                    </div>';


            endwhile;
            $html .= '</div>';
            wp_reset_postdata();
            return $html;
        }
        else if (!empty($atts['quantity']) && !empty($atts['category'])) {
            $html = '';
            $html .= '<div class="magazine-news">';
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();
                $term_list = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "all"));
                if ($term_lists[0]->term_id == $atts['category']) {
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');


                    $term_lists_id = $term_lists[0]->slug;
                    $html .= '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">
                            <p>
                                ';

                    $html .= '<div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . $featured_img_url . '" alt="" width="425" height="271" srcset="' . $featured_img_url . ' 300w" sizes="(max-width: 425px) 100vw, 425px">
                                </a></div>';

                    $html .= '</p>
                            <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                            <h2><a href="#">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                    </div>';
                }

            endwhile;
            $html .= '</div>';
            wp_reset_postdata();
            echo $html;
        } else if (!empty($atts['quantity']) && empty($atts["category"]) && empty($atts["series"]) && empty($atts["style"])) {
            $html = '';
            $html .= '<div class="magazine-news">';
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                $post_id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $term_list = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "names"));
                $term_lists = wp_get_post_terms($post_id, 'buying-guide', array("fields" => "all"));

                $term_lists_id = $term_lists[0]->slug;
                $html .= '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="news-grids">
                            <p>
                                ';

                $html .= '<div class="magazines-images"><a href="' . get_the_permalink($post_id) . '"><img class="alignnone wp-image-40 size-full" src="' . $featured_img_url . '" alt="" width="425" height="271" srcset="' . $featured_img_url . ' 300w" sizes="(max-width: 425px) 100vw, 425px">
                                </a></div>';

                $html .= '</p>
                            <div class="magazines-titles-bar"><h4><a href="' . site_url() . '/buying-guide/' . $term_lists_id . '">' . $term_list[0] . '</a></h4>
                            <h2><a href="#">' . get_the_title($post_id) . '</a></h2></div>
                        </div>
                    </div>';

            endwhile;
            $html .= '</div>';

            echo $html;
        }
        else if (empty($atts['quantity']) && !empty($atts["category"]) && empty($atts["series"]) && empty($atts["style"])) {
            
        }
    }

    function top_ten_rating_game_show() {
        Global $rate;
        $args = array(
            'post_type' => 'game',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $args_rate_arg = array(
                    'post_parent' => $post_id,
                    'post_type' => 'review',
                    'post_status' => 'publish',
                    'posts_per_page' => -1
                );
                $args_rate_full = new WP_Query($args_rate_arg);
                $post_count = $args_rate_full->post_count;
                while ($args_rate_full->have_posts()) {
                    $args_rate_full->the_post();

                    $review_id = get_the_ID();
                    $rate += get_post_meta($review_id, 'wpcf-rating', true);
                    
                }
                if (!empty($rate)) {
                    $rate_array[$post_id] = round($rate / $post_count);
                }
                $rate = 0;
            }
        }
        $html = '';


        $rate_array = array_reverse($rate_array, true);

        $html .= '
                <div class="col-xs-12 r-m-p">
                    <section id="custom_html-20" class="widget_text widget widget_custom_html">
                        <div class="textwidget custom-html-widget similar-product">
                            <div class="similar-products">
                                <h3>Top 10 of Month</h3>
                                <ul class="clearfix">
                ';
        foreach ($rate_array as $key => $val) {

            $html .= '<li>
                                                    <div>
                                                        <span>' . get_the_date() . '</span>
                                                        <h4><a href="' . get_the_permalink($key) . '"> ' . get_the_title($key) . ' </a></h4>
                                                    </div>
                                                    <span>
                                                        <div class="text">' . $val . '</div>
                                                    </span>
                                                 </li>';
        }

        $html .= '               </ul>
                                </div>
                            </div>
                        </section>
                    </div>';
        return $html;
    }

    function ads_banner_image($atts = array(), $content = null, $tag) {
        shortcode_atts(array(
            'var1' => 'default var1',
            'link' => false
                ), $atts);

        $html = '';
        $html .= '<div class="add_sens_box">
                        <a href="#">
                            <img src="' . $atts["link"] . '" class="img-responsive">
                        </a>
                    </div>';
        return $html;
    }

    function show_posts_games_image() {
        $pref_search_game_txt = $_POST["pref_search_game_txt"];
        $main_cat = $_POST["main_cat"];
        $sub_cats = $_POST["sub_cats"];
        $html = '';
        if ($pref_search_game_txt != "" && $main_cat != "" && $sub_cats != "") {

            $args = array(
                'post_type' => 'game',
                'post_title' => $pref_search_game_txt,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-cat',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    if ($term_ids == $sub_cats) {
                        $content = get_the_content($post_id);

                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }
                        $html .= '<div class="col-xs-4">
	                            <div class="game_box">
	                                <div class="img-box">
	                                    <a href="' . get_the_permalink($post_id) . '">
	                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
	                                        <span class="hover-img">
	                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
	                                            <p>Read More</p>
	                                        </span>
	                                    </a>
	                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
	                                				<a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
	                                			</span>';
                        }
                        $admin_rate = array(
                        'post_type' => 'review',
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => 'wpcf-post-id',
                                'value' => $post_id,
                                'compare' => '=',
                            ),
                        )
                    );
                    $query_rate_admin = new WP_Query($admin_rate);

                    $count_user_admin = $query_rate_admin->post_count;

                        $html .= '</div><!--./End Img-box here-->
	                                <div class="game_detailing">
	                                    <h5>' . get_the_title($post_id) . '</h5>
	                                    <div class="row">
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
	                                                $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
	                                            $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                                    'post_parent' => $post_id,
                                                                    'post_type' => 'review',
                                                                    'post_status' => 'publish'
                                                                );
                                                                $query_rate = new WP_Query($args_rate);
                                                                $count_user = $query_rate->post_count;
                                                                $total = '';
                                                                $total_rating = '';
                                                                $final_rating = '';
                                                if ($query_rate->have_posts()) {
                                                                    while ($query_rate->have_posts()) {
                                                                        $query_rate->the_post();
                                                                        $post_id_rate = get_the_ID();
                                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                        $total = $total + $post_rate;
                                                                    }
                                                                    $total_rating = $total / $count_user;
                                                                    $final_rating = $total_rating * 20;
                                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                                } else {
                                                                    $html .= '<span>0</span>';
                                                                }
	                                            $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">USer Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <p class="rating-description">
	                                                ' . substr($content, 0, 200) . '
	                                            </p>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
	                                                    <h6>Compare</h6>
	                                                </a>
	                                            </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>Dislike</h6>
			                                                </a>
	                                            			</div>';
                            } else {
                                $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>like</h6>
			                                                </a>
	                                            			</div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
	                                                    <h6>like</h6>
	                                                </a>
	                                            </div>';
                        }


                        $html .= '<div class="col-xs-4">
	                                                <a href="#" class="user_attach_box">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
	                                                    <h6>share</h6>
	                                                </a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div><!--./End game_detailing Here-->
	                            </div>
	                        </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }
            echo $html;
        } else if ($pref_search_game_txt != "" && $main_cat == "" && $sub_cats == "") {
//echo "only title";

            $args = array(
                'post_type' => 'game',
                's' => $pref_search_game_txt,
                'post_status' => 'publish',
                'orderby' => 'title',
                'posts_per_page' => -1,
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;

                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
	                            <div class="game_box">
	                                <div class="img-box">
	                                    <a href="' . get_the_permalink($post_id) . '">
	                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
	                                        <span class="hover-img">
	                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
	                                            <p>Read More</p>
	                                        </span>
	                                    </a>
            	                       <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                                                if (!empty($term_list)) {
                                                    $html .= '<span class="cat_name">
                            	                                				<a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                            	                                			</span>';
                                                }
                                                $admin_rate = array(
                                                    'post_type' => 'review',
                                                    'post_status' => 'publish',
                                                    'meta_query' => array(
                                                        array(
                                                            'key' => 'wpcf-post-id',
                                                            'value' => $post_id,
                                                            'compare' => '=',
                                                        ),
                                                    )
                                                );
                                                $query_rate_admin = new WP_Query($admin_rate);

                                                $count_user_admin = $query_rate_admin->post_count;


                                                 $j=0;
                    $html .= '</div><!--./End Img-box here-->
	                                <div class="game_detailing">
	                                    <h5>' . get_the_title($post_id) . '</h5>
	                                    <div class="row">
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
	                                            $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                                'post_parent' => $post_id,
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish'
                                                            );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
	                                                if ($query_rate->have_posts()) {
                                                            while ($query_rate->have_posts()) {
                                                                $query_rate->the_post();
                                                                $post_id_rate = get_the_ID();
                                                                $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                $total = $total + $post_rate;
                                                            }
                                                            $total_rating = $total / $count_user;
                                                            $final_rating = $total_rating * 20;
                                                            $html .= '<span>' . round($final_rating) . '</span>';
                                                        } else {
                                                            $html .= '<span>0</span>';
                                                        }
	                                            $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">USer Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <p class="rating-description">
	                                                ' . substr($content, 0, 200) . '
	                                            </p>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
	                                                    <h6>Compare</h6>
	                                                </a>
	                                            </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>Dislike</h6>
			                                                </a>
	                                            			</div>';
                        } else {
                            $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>like</h6>
			                                                </a>
	                                            			</div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
	                                                    <h6>like</h6>
	                                                </a>
	                                            </div>';
                    }


                    $html .= '<div class="col-xs-4">
	                                                <a href="#" class="user_attach_box">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
	                                                    <h6>share</h6>
	                                                </a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div><!--./End game_detailing Here-->
	                            </div>
	                        </div>';
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else if ($pref_search_game_txt != "" && $main_cat != "" && $sub_cats == "") {
            $u = 0;

            $args = array(
                'post_type' => 'game',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-cat',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $post_title = mb_strtoupper(get_the_title($post_id));
                    $titles = mb_strtoupper($pref_search_game_txt);
                    if (strpos($post_title, $titles) !== false) {
                        $u = 1;
                        $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                        $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                        $term_ids = $term_list[0]->term_id;
                        $content = get_the_content($post_id);
                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }
                        $html .= '<div class="col-xs-4">
	                            <div class="game_box">
	                                <div class="img-box">
	                                    <a href="' . get_the_permalink($post_id) . '">
	                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
	                                        <span class="hover-img">
	                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
	                                            <p>Read More</p>
	                                        </span>
	                                    </a>
	                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
	                                				<a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
	                                			</span>';
                        }

                        $html .= '</div><!--./End Img-box here-->
	                                <div class="game_detailing">
	                                    <h5>' . get_the_title($post_id) . '</h5>
	                                    <div class="row">
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
	                                           $admin_rate = array(
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish',
                                                                'meta_query' => array(
                                                                    array(
                                                                        'key' => 'wpcf-post-id',
                                                                        'value' => $post_id,
                                                                        'compare' => '=',
                                                                    ),
                                                                )
                                                            );
                                                $query_rate_admin = new WP_Query($admin_rate);
                                                $count_user_admin = $query_rate_admin->post_count;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }

                                                $j=0;

	                                            $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading"> Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
	                                           $args_rate = array(
                                                        'post_parent' => $post_id,
                                                        'post_type' => 'review',
                                                        'post_status' => 'publish'
                                                    );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
                                                if ($query_rate->have_posts()) {
                                                        while ($query_rate->have_posts()) {
                                                            $query_rate->the_post();
                                                            $post_id_rate = get_the_ID();
                                                            $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                            $total = $total + $post_rate;
                                                        }
                                                        $total_rating = $total / $count_user;
                                                        $final_rating = $total_rating * 20;
                                                        $html .= '<span>' . round($final_rating) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
	                                           $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading"> USer Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <p class="rating-description">
	                                                ' . substr($content, 0, 200) . '
	                                            </p>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
	                                                    <h6>Compare</h6>
	                                                </a>
	                                            </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>Dislike</h6>
			                                                </a>
	                                            			</div>';
                            } else {
                                $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>like</h6>
			                                                </a>
	                                            			</div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
	                                                    <h6>like</h6>
	                                                </a>
	                                            </div>';
                        }


                        $html .= '<div class="col-xs-4">
	                                                <a href="#" class="user_attach_box">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
	                                                    <h6>share</h6>
	                                                </a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div><!--./End game_detailing Here-->
	                            </div>
	                        </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }
            if ($u == 0) {
                $html .= 'No posts found';
            }

            echo $html;
        } else if ($pref_search_game_txt == "" && $main_cat != "" && $sub_cats == "") {
//echo "only main cat";
            $html = '';

            $args = array(
                'post_type' => 'game',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-cat',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    $content = get_the_content($post_id);

                    $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                    if (empty($post_counts)) {
                        $counts = 0;
                    } else {
                        $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                    }

                    $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                    if (!empty($term_list)) {
                        $html .= '<span class="cat_name">
                                				<a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                			</span>';
                    }

                    $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5>' . get_the_title($post_id) . '</h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                                $admin_rate = array(
                                                            'post_type' => 'review',
                                                            'post_status' => 'publish',
                                                            'meta_query' => array(
                                                                array(
                                                                    'key' => 'wpcf-post-id',
                                                                    'value' => $post_id,
                                                                    'compare' => '=',
                                                                ),
                                                            )
                                                        );
                                                        $query_rate_admin = new WP_Query($admin_rate);

                                                        $count_user_admin = $query_rate_admin->post_count;


                                                        $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
                                            $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                             $args_rate = array(
                                                                'post_parent' => $post_id,
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish'
                                                            );
                                                            $query_rate = new WP_Query($args_rate);
                                                            $count_user = $query_rate->post_count;
                                                            $total = '';
                                                            $total_rating = '';
                                                            $final_rating = '';
                                            if ($query_rate->have_posts()) {
                                                                while ($query_rate->have_posts()) {
                                                                    $query_rate->the_post();
                                                                    $post_id_rate = get_the_ID();
                                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                                    $total = $total + $post_rate;
                                                                }
                                                                $total_rating = $total / $count_user;
                                                                $final_rating = $total_rating * 20;
                                                                $html .= '<span>' . round($final_rating) . '</span>';
                                                            } else {
                                                                $html .= '<span>0</span>';
                                                            }   
                                           $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                    if (!empty($post_counts)) {

                        if (in_array($user_ip, $post_counts)) {
                            $html .= '<div class="col-xs-4">
		                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
		                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
		                                                    <h6>Dislike</h6>
		                                                </a>
                                            			</div>';
                        } else {
                            $html .= '<div class="col-xs-4">
		                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
		                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
		                                                    <h6>like</h6>
		                                                </a>
                                            			</div>';
                        }
                    } else {
                        $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                    }


                    $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->
                            </div>
                        </div>';
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else if ($pref_search_game_txt == "" && $main_cat != "" && $sub_cats != "") {
            $args = array(
                'post_type' => 'game',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'game-cat',
                        'field' => 'id',
                        'terms' => $main_cat
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                function getUserIPS() {
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

                $user_ip = getUserIPS();
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                    $term_ids = $term_list[0]->term_id;
                    if ($term_ids == $sub_cats) {
                        $content = get_the_content($post_id);
                        $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                        if (empty($post_counts)) {
                            $counts = 0;
                        } else {
                            $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                        }

                        $html .= '<div class="col-xs-4">
	                            <div class="game_box">
	                                <div class="img-box">
	                                    <a href="' . get_the_permalink($post_id) . '">
	                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
	                                        <span class="hover-img">
	                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
	                                            <p>Read More</p>
	                                        </span>
	                                    </a>
	                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                        if (!empty($term_list)) {
                            $html .= '<span class="cat_name">
	                                				<a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
	                                			</span>';
                        }

                        $html .= '</div><!--./End Img-box here-->
	                                <div class="game_detailing">
	                                    <h5>' . get_the_title($post_id) . '</h5>
	                                    <div class="row">
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
	                                                $admin_rate = array(
                                                                'post_type' => 'review',
                                                                'post_status' => 'publish',
                                                                'meta_query' => array(
                                                                    array(
                                                                        'key' => 'wpcf-post-id',
                                                                        'value' => $post_id,
                                                                        'compare' => '=',
                                                                    ),
                                                                )
                                                            );
                                                        $query_rate_admin = new WP_Query($admin_rate);

                                                        $count_user_admin = $query_rate_admin->post_count;


                                                    $j=0;
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
                                                        $html .= '<span>' . round($final_rating1) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
	                                            $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">';
                                                $args_rate = array(
                                                        'post_parent' => $post_id,
                                                        'post_type' => 'review',
                                                        'post_status' => 'publish'
                                                    );
                                                    $query_rate = new WP_Query($args_rate);
                                                    $count_user = $query_rate->post_count;
                                                    $total = '';
                                                    $total_rating = '';
                                                    $final_rating = '';
	                                                if ($query_rate->have_posts()) {
                                                        while ($query_rate->have_posts()) {
                                                            $query_rate->the_post();
                                                            $post_id_rate = get_the_ID();
                                                            $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                            $total = $total + $post_rate;
                                                        }
                                                        $total_rating = $total / $count_user;
                                                        $final_rating = $total_rating * 20;
                                                        $html .= '<span>' . round($final_rating) . '</span>';
                                                    } else {
                                                        $html .= '<span>0</span>';
                                                    }
	                                            $html .='</div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">USer Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <p class="rating-description">
	                                                ' . substr($content, 0, 200) . '
	                                            </p>
	                                        </div>
	                                        <div class="col-xs-12">
	                                            <div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
	                                                    <h6>Compare</h6>
	                                                </a>
	                                            </div>';
                        if (!empty($post_counts)) {

                            if (in_array($user_ip, $post_counts)) {
                                $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>Dislike</h6>
			                                                </a>
	                                            			</div>';
                            } else {
                                $html .= '<div class="col-xs-4">
			                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
			                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
			                                                    <h6>like</h6>
			                                                </a>
	                                            			</div>';
                            }
                        } else {
                            $html .= '<div class="col-xs-4">
	                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
	                                                    <h6>like</h6>
	                                                </a>
	                                            </div>';
                        }
                        $html .= '<div class="col-xs-4">
	                                                <a href="#" class="user_attach_box">
	                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
	                                                    <h6>share</h6>
	                                                </a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div><!--./End game_detailing Here-->
	                            </div>
	                        </div>';
                    }
                }
            } else {
                $html .= 'No posts found';
            }


            echo $html;
        } else {
            
        }
        die();
    }

    function show_cats_games_posts_shows() {
        $cats_ids = $_POST["cats_ids"];
        $html = '';

        $args = array(
            'post_type' => 'game',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'game-cat',
                    'field' => 'id',
                    'terms' => $cats_ids
                )
            )
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {

            function getUserIPS() {
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

            $user_ip = getUserIPS();
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                $term_ids = $term_list[0]->term_id;
                $content = get_the_content($post_id);

                $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                if (empty($post_counts)) {
                    $counts = 0;
                } else {
                    $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                }

                $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                if (!empty($term_list)) {
                    $html .= '<span class="cat_name">
                                				<a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                			</span>';
                }

                $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5><a href="'.get_the_permalink($post_id).'">' . get_the_title($post_id) . '</a></h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                            $admin_rate = array(
                                                'post_type' => 'review',
                                                'post_status' => 'publish',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'wpcf-post-id',
                                                        'value' => $post_id,
                                                        'compare' => '=',
                                                    ),
                                                )
                                            );
                                            $query_rate_admin = new WP_Query($admin_rate);

                                            $count_user_admin = $query_rate_admin->post_count;
                                            $j=0;
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
                                                $html .= '<span>' . round($final_rating1) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }                                                
                                            $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                            $args_rate = array(
                                                    'post_parent' => $post_id,
                                                    'post_type' => 'review',
                                                    'post_status' => 'publish'
                                                );
                                                $query_rate = new WP_Query($args_rate);
                                                $count_user = $query_rate->post_count;
                                                $total = '';
                                                $total_rating = '';
                                                $final_rating = '';
                                            if ($query_rate->have_posts()) {
                                                    while ($query_rate->have_posts()) {
                                                        $query_rate->the_post();
                                                        $post_id_rate = get_the_ID();
                                                        $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                        $total = $total + $post_rate;
                                                    }
                                                    $total_rating = $total / $count_user;
                                                    $final_rating = $total_rating * 20;
                                                    $html .= '<span>' . round($final_rating) . '</span>';
                                                } else {
                                                    $html .= '<span>0</span>';
                                                } 
                                            $html .='</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                if (!empty($post_counts)) {

                    if (in_array($user_ip, $post_counts)) {
                        $html .= '<div class="col-xs-4">
		                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
		                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
		                                                    <h6>Dislike</h6>
		                                                </a>
                                            			</div>';
                    } else {
                        $html .= '<div class="col-xs-4">
		                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
		                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
		                                                    <h6>like</h6>
		                                                </a>
                                            			</div>';
                    }
                } else {
                    $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                }


                $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->

                            </div>
                        </div>';
            }
        } else {
            $html .= 'No posts found';
        }


        echo $html;
        die();
    }

    function search_likes_actives_dis() {
        $post_ids = $_POST["counter"];
        $user_id = $_POST["user_id"];
        $arr = array();
        $likes_post_meta = get_post_meta($post_ids, 'post_likes_more', true);
        if (!empty($likes_post_meta)) {
            foreach ($likes_post_meta as $dislike) {
                if ($dislike != $user_id) {
                    $arr[] = $dislike;
                } else {
                    continue;
                }
            }
            update_post_meta($post_ids, 'post_likes_more', $arr);
            echo count(get_post_meta($post_ids, 'post_likes_more', true));
        }
        die();
    }

    function show_database_games_cats() {
        $html = '';
        $taxonomy = 'game-cat';
        $parents = get_terms($taxonomy, array('hide_empty' => false, 'orderby' => 'id'));

        if (!empty($parents)) {
            foreach ($parents as $parent_link) {

//echo "<br>";
                $html .= '<a href="#' . $parent_link->slug . '" class="list-group-item list-group-item-success strong type-inner show-results" data-toggle="collapse" data-parent="#MainMenu" id="' . $parent_link->term_id . '">' . $parent_link->name . '</a>';
//echo $parent_link->name;
            }
        }

        return $html;
    }

    function search_likes_chartes_dislikes_compare() {
        $post_ids = $_POST["counter"];

        $user_id = $_POST["user_id"];
        $compare = $_COOKIE['compare'];

        $savedCardArray = json_decode($compare, true);
        /* echo "<pre>";
          print_r($savedCardArray);
          echo "</pre>"; */
        if (!empty($compare)) {
            $compare[] = $post_ids;
        } else {
            $arr = array();
            $arr[] = $post_ids;
            $json_encode = json_encode($arr);
            setcookie('compare', $json_encode);
        }


        die();
    }

    function search_likes_chartes_likes_actives() {
        $post_ids = $_POST["counter"];
        $user_id = $_POST["user_id"];

        $arr = array();
        $likes_post_meta = get_post_meta($post_ids, 'post_likes_more', true);
        if (!empty($likes_post_meta)) {
            $likes_post_meta[] = $user_id;
            update_post_meta($post_ids, 'post_likes_more', $likes_post_meta);
            echo count(get_post_meta($post_ids, 'post_likes_more', true));
        } else {
            $arr[] = $user_id;
            update_post_meta($post_ids, 'post_likes_more', $arr);
            echo count(get_post_meta($post_ids, 'post_likes_more', true));
        }

        die();
    }

    function show_database_games() {

        $html = '';

        $args = array(
            'post_type' => 'game',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {

            function getUserIPS() {
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

            $user_ip = getUserIPS();
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $title = get_the_title($post_id);
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                $term_ids = $term_list[0]->term_id;
                $content = get_the_content($post_id);

                $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                if (empty($post_counts)) {
                    $counts = 0;
                } else {
                    $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                }

                $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                if (!empty($term_list)) {
                    $html .= '<span class="cat_name">
                                				<a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                			</span>';
                }
                $args_rate = array(
                    'post_parent' => $post_id,
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
                            'value' => $post_id,
                            'compare' => '=',
                        ),
                    )
                );
                $query_rate_admin = new WP_Query($admin_rate);

                $count_user_admin = $query_rate_admin->post_count;

                $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5><a href="' . get_the_permalink($post_id) . '">' . substr($title, 0, 20) . '...</a></h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
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
                                            $html .= '<span>' . round($final_rating1) . '</span>';
                                        } else {
                                            $html .= '<span>0</span>';
                                        }

                                        $html .= '</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                            if ($query_rate->have_posts()) {
                                                while ($query_rate->have_posts()) {
                                                    $query_rate->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user;
                                                $final_rating = $total_rating * 20;
                                                $html .= '<span>' . round($final_rating) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '...
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                if (!empty($post_counts)) {

                    if (in_array($user_ip, $post_counts)) {
                        $html .= '<div class="col-xs-4">
		                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
		                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
		                                                    <h6>Dislike</h6>
		                                                </a>
                                            			</div>';
                    } else {
                        $html .= '<div class="col-xs-4">
		                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
		                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
		                                                    <h6>like</h6>
		                                                </a>
                                            			</div>';
                    }
                } else {
                    $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                }


                $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->
                            </div>
                        </div>';
            }
        } else {
            $html .= 'No posts found';
        }


        echo $html;
    }

    function search_likes_chartes_dislikes() {
        $post_ids = $_POST["counter"];
        $user_id = $_POST["user_id"];
        $arr = array();
        $likes_post_meta = get_post_meta($post_ids, 'post_likes_more', true);
        if (!empty($likes_post_meta)) {
            foreach ($likes_post_meta as $dislike) {
                if ($dislike != $user_id) {
                    $arr[] = $dislike;
                } else {
                    continue;
                }
            }
            update_post_meta($post_ids, 'post_likes_more', $arr);
            echo count(get_post_meta($post_ids, 'post_likes_more', true));
        }
        die();
    }

    function show_games_all() {
        $html = '';
        $args = array(
            'post_type' => 'game',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {

            while ($query->have_posts()) {
                $query->the_post();
                $posts = $query->posts;

                $contents = substr($posts[0]->post_content, 0, 80);
                $post_id = get_the_ID();
                $title = get_the_title($post_id);
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');

                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));

                $html .= '
							<li class="media">
                            <div class="pull-left">
                                <a href="' . get_the_permalink($post_id) . '">
                                    <img class="media-object" src="' . $featured_img_url . '" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">' . $title . '</h4>';
                if (!empty($term_list)) {
                    $i = 0;
                    foreach ($term_list as $list) {

                        $html .= $list->name . ' > ';

                        $i++;
                    }
                }

                $html .= '<p>' . $contents . '</p>
                            </div>
                        </li>
							';
            }
        }
        return $html;
    }

    /* ================================================================= */
    /* ==========Show All Peripheral Function Page Here ========================= */
    /* ================================================================= */

    function show_peripheral_all() {
        $html = '';

        $args = array(
            'post_type' => 'peripheral',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {

            function getUserIPS() {
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

            $user_ip = getUserIPS();
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $title = get_the_title($post_id);
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                $term_ids = $term_list[0]->term_id;
                $content = get_the_content($post_id);

                $post_counts = get_post_meta($post_id, 'post_likes_more', true);
                if (empty($post_counts)) {
                    $counts = 0;
                } else {
                    $counts = count(get_post_meta($post_id, 'post_likes_more', true));
                }

                $html .= '<div class="col-xs-4">
                            <div class="game_box">
                                <div class="img-box">
                                    <a href="' . get_the_permalink($post_id) . '">
                                        <img src="' . $featured_img_url . '" class="center-block" width="100%">
                                        <span class="hover-img">
                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/hover-bg.png" class="center-block" width="100%">
                                            <p>Read More</p>
                                        </span>
                                    </a>
                                    <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> <span class="counter_list_page">' . $counts . '</span></span>';
                                        if (!empty($term_list)) {
                                            $html .= '<span class="cat_name">
                                                                        <a href="' . get_term_link($term_ids) . '">' . $term_list[0]->name . '</a>
                                                                    </span>';
                                        }
                                        $args_rate = array(
                                            'post_parent' => $post_id,
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
                                                    'value' => $post_id,
                                                    'compare' => '=',
                                                ),
                                            )
                                        );
                                        $query_rate_admin = new WP_Query($admin_rate);

                                        $count_user_admin = $query_rate_admin->post_count;

                            $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5><a href="' . get_the_permalink($post_id) . '">' . substr($title, 0, 20) . '...</a></h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
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
                                                $html .= '<span>' . round($final_rating1) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">';
                                            if ($query_rate->have_posts()) {
                                                while ($query_rate->have_posts()) {
                                                    $query_rate->the_post();
                                                    $post_id_rate = get_the_ID();
                                                    $post_rate = get_post_meta($post_id_rate, 'wpcf-rating', true);
                                                    $total = $total + $post_rate;
                                                }
                                                $total_rating = $total / $count_user;
                                                $final_rating = $total_rating * 20;
                                                $html .= '<span>' . round($final_rating) . '</span>';
                                            } else {
                                                $html .= '<span>0</span>';
                                            }

                                            $html .= '</div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">USer Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class="rating-description">
                                                ' . substr($content, 0, 200) . '...
                                            </p>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box compare_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/like.png" class="center-block img-responsive"></h6>
                                                    <h6>Compare</h6>
                                                </a>
                                            </div>';
                                            if (!empty($post_counts)) {

                                                if (in_array($user_ip, $post_counts)) {
                                                    $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives_dis">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>Dislike</h6>
                                                        </a>
                                                        </div>';
                                                    } else {
                                                        $html .= '<div class="col-xs-4">
                                                        <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                            <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                            <h6>like</h6>
                                                        </a>
                                                        </div>';
                    }
                } else {
                    $html .= '<div class="col-xs-4">
                                                <a href="javascript:void(0);" data-post-id="' . $post_id . '" id="' . $user_ip . '" class="user_attach_box likes_actives">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/compare.png" class="center-block img-responsive"></h6>
                                                    <h6>like</h6>
                                                </a>
                                            </div>';
                }


                $html .= '<div class="col-xs-4">
                                                <a href="#" class="user_attach_box">
                                                    <h6><img src="http://site.startupbug.net:6999/thegamers/wp-content/themes/the-gamerz-child/assets/img/shaere.png" class="center-block img-responsive"></h6>
                                                    <h6>share</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./End game_detailing Here-->
                            </div>
                        </div>';
            }
        } else {
            $html .= 'No posts found';
        }


        echo $html;
    }

    /* ==========End All Perpherals Function Here ========================= */

    function search_likes_chartes() {
        $post_ids = $_POST["counter"];
        $user_id = $_POST["user_id"];

        $arr = array();
        $likes_post_meta = get_post_meta($post_ids, 'post_likes_more', true);
        if (!empty($likes_post_meta)) {
            $likes_post_meta[] = $user_id;
            update_post_meta($post_ids, 'post_likes_more', $likes_post_meta);
            echo count(get_post_meta($post_ids, 'post_likes_more', true));
        } else {
            $arr[] = $user_id;
            update_post_meta($post_ids, 'post_likes_more', $arr);
            echo count(get_post_meta($post_ids, 'post_likes_more', true));
        }
        die();
    }

    function search_video_based_on_character_by_cat() {
        $terms = $_POST["favorite"];

        if (!empty($terms)) {
            $args = array(
                'post_type' => 'video',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'video-cat',
                        'field' => 'id',
                        'terms' => $terms
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {

                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $video_url = get_post_meta($post_id, 'video_url', true);
                    $timming = get_post_meta($post_id, 'video_time', true);
                    $term_list = wp_get_post_terms($post_id, 'video-cat', array("fields" => "all"));
                    $html .= '<div class="col-xs-3">
		                    	<div class="video-box">
		                        	<iframe width="100%" height="150" src="' . $video_url . '" frameborder="0" allowfullscreen=""></iframe>
		                        	<h2>' . get_the_title($post_id) . '</h2>
		                        	<div class="video-description">
		                            	<h6>' . $timming . '</h6>
		                            	<h6>' . $term_list[0]->name . '</h6>
		                        	</div>
		                   		</div>
		                	</div>';
                }
            } else {
                $html .= 'No video found';
            }
        } else {
            $html .= '';
        }
        echo $html;
        die();
    }

    function gamming_show_cats() {
        $html = '';
        $taxonomy = 'video-cat';
        $parents = get_terms($taxonomy, array('parent' => 0, 'hide_empty' => false, 'orderby' => 'id'));

        if (!empty($parents)) {
            foreach ($parents as $term) {
                $term_id = $term->term_id;
                $ages = get_terms($taxonomy, array(
                    'hide_empty' => 0,
                    'parent' => $term_id,
                ));
                $html .= '
						<a href="#demo' . $term_id . '" class="list-group-item list-group-item-success strong type-inner" data-toggle="collapse" data-parent="#MainMenu">' . $term->name . '<i class="fa fa-caret-down"></i></a>';
                $html .= '<div class="collapse list-group-submenu" id="demo' . $term_id . '">';
                foreach ($ages as $child) {
                    $html .= '<a href="javascript:void(0);" class="list-group-item search_list_feature" id="' . $child->term_id . '"><input type="checkbox" name="filter_term[]" id="filter_term[]" class="filter_terms_child"  value="' . $child->term_id . '"> ' . $child->name . '</a>';
                }


                $html .= '</div>';

                $termchildrens = get_term_children($term_id, $taxonomy);
            }
        }

        return $html;
    }

    function footer_scriptss_muy() {
        $html = '<script>
    				jQuery(document).ready(function(){
                        var name = localStorage.getItem("name");
                        console.log(name);
    					jQuery(document).on("click",".search_btn",function(){
    						var search_flds = jQuery("#search_flds").val();

                            jQuery(".loader_ajax").show();
    						jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_video_based_on_character",
									search_flds : search_flds
									},
									success : function( response ) {

									//console.log(response);

									jQuery(".show_cats_vido").html(response);
									jQuery(".loader_ajax").hide();
									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});
    					});
    					jQuery(document).on("click",".filter_terms_child",function(){

    						var favorite = [];

				            jQuery.each(jQuery("input[type=checkbox]:checked"), function(){
				                favorite.push(jQuery(this).val());
				            });

				            jQuery(".loader_ajax").show();
				            jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_video_based_on_character_by_cat",
									favorite : favorite
									},
									success : function( response ) {

									//console.log(response);
									jQuery(".show_cats_vido").html(response);
									jQuery(".loader_ajax").hide();
									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
							});
    					});
    					jQuery(document).on("click",".likes_btn",function(){
    						var counter_ids = jQuery(this).attr("id");
    						var user_ids = jQuery(this).attr("data-user-id");
    							jQuery(".loader_show").show();
    							jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_likes_chartes",
									counter : counter_ids,
									user_id : user_ids
									},
									success : function( response ) {

									//jQuery(".counter_likes").html(response);
									jQuery(".likes h4 span").html(response);
									jQuery(".loader_show").hide();
									location.reload();

									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});
    					});
    					jQuery(document).on("click",".dislikes",function(){
    						var counter_ids = jQuery(this).attr("id");
    						var user_ids = jQuery(this).attr("data-user-id");
								jQuery(".loader_show").show();
    							jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_likes_chartes_dislikes",
									counter : counter_ids,
									user_id : user_ids
									},
									success : function( response ) {

									//jQuery(".counter_likes").html(response);
									jQuery(".likes h4 span").html(response);
									jQuery(".loader_show").hide();
									location.reload();

									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});
    					});
    					jQuery(document).on("click",".compare_actives",function(){
    						var posts_ids = jQuery(this).attr("data-post-id");
    						var user_ids = jQuery(this).attr("id");
								//jQuery(".loader_show").show();
                                var name = localStorage.getItem("name");
                                console.log(name);
                                var arr = [];

                               // arr arr.push(name);
                                if(name!="null"){
                                  //  console.log(name);
                                    if(name==null){

                                    }else{
                                        var arr = name.split(",");
                                    }


                                var i = arr.indexOf(posts_ids);
                                  if(i > -1){
                                   alert("your are compared");
                                  }
                                  else{

                                    arr.push(posts_ids);
                                  }

                                }else{
                                    arr.push(posts_ids);
                                }

                                if (localStorage) {
                                    arr.push(posts_ids);
                                    localStorage.setItem("name", arr);
                                } else {

                                    alert("sorry");
                                }
                                var plannerID;
                            var cartItem = 0;



                                gameID = posts_ids;
                                console.log(jQuery.cookie("compareArray"));
                                if (jQuery.cookie("compareArray") === undefined) {
                                    // have cookie
                                    jQuery.cookie("compareArray", gameID, {
                                        path: "/"
                                    });
                                    console.log(jQuery.cookie("compareArray"));
                                } else {
                                    tripPlanner = jQuery.cookie("compareArray").split(",");
                                    tripPlanner.push(gameID);
                                    jQuery.cookie("compareArray", tripPlanner, {
                                        path: "/"
                                    });
                                    console.log(jQuery.cookie("compareArray").split(","));
                                }

    							/*jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_likes_chartes_dislikes_compare",
									counter : posts_ids,
									user_id : user_ids
									},
									success : function( response ) {

									//jQuery(".counter_likes").html(response);
									//jQuery(".likes h4 span").html(response);
									//jQuery(".loader_show").hide();
									//location.reload();

									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});*/
    					});
    					jQuery(document).on("click",".likes_actives",function(){
    						var posts_ids = jQuery(this).attr("data-post-id");
    						var user_ids = jQuery(this).attr("id");
								jQuery(".loader_show").show();
    							jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_likes_chartes_likes_actives",
									counter : posts_ids,
									user_id : user_ids
									},
									success : function( response ) {

									//jQuery(".counter_likes").html(response);
									//jQuery(".likes h4 span").html(response);
									//jQuery(".loader_show").hide();
									//location.reload();

									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});
    					});
    					jQuery(document).on("click",".likes_actives_dis",function(){
    						var posts_ids = jQuery(this).attr("data-post-id");
    						var user_ids = jQuery(this).attr("id");
								jQuery(".loader_show").show();
    							jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_likes_actives_dis",
									counter : posts_ids,
									user_id : user_ids
									},
									success : function( response ) {

									//jQuery(".counter_likes").html(response);
									//jQuery(".likes h4 span").html(response);
									//jQuery(".loader_show").hide();
									//location.reload();

									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});
    					});
    					jQuery(document).on("click",".show-results",function(){
    						var cats_ids = jQuery(this).attr("id");
    						//var user_ids = jQuery(this).attr("data-user-id");
    							jQuery(".ajax_loader").show();
    							jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "show_cats_games_posts_shows",
									cats_ids : cats_ids,
									},
									success : function( response ) {

									jQuery(".main-game-wrapper").html(response);
                                    jQuery(".ajax_loader").hide();
									/*jQuery(".likes h4 span").html(response);
									
									location.reload();*/

									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});
    					});
                        jQuery(document).on("click",".community_sect",function(){
                            var cats_ids = jQuery(this).attr("id");
                            //var user_ids = jQuery(this).attr("data-user-id");
                                jQuery(".ajax_loader").show();
                                jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "show_cats_games_posts_shows_filters",
                                    cats_ids : cats_ids,
                                    },
                                    success : function( response ) {

                                    jQuery("#settings").html(response);
                                    jQuery(".ajax_loader").hide();
                                    /*jQuery(".likes h4 span").html(response);
                                    
                                    location.reload();*/

                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                                });
                        });
    					jQuery(document).on("click",".search_game_btn",function(e){
    						e.preventDefault();
    						var pref_search_game_txt = jQuery("#pref_search_game_txt").val();
    						var main_cat = jQuery(".main_cat").val();
    						var sub_cats = jQuery(".sub_cats").val();
    						jQuery(".loader_show").show();
    							jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "show_posts_games_image",
									pref_search_game_txt : pref_search_game_txt,
									main_cat : main_cat,
									sub_cats : sub_cats
									},
									success : function( response ) {

									jQuery(".main-game-wrapper").html(response);
                                    jQuery(".loader_show").hide();
									/*jQuery(".likes h4 span").html(response);
									jQuery(".loader_show").hide();
									location.reload();*/

									},
									 error: function(errorThrown){

									console.log(errorThrown);
									}
								});
    					});
                        jQuery(document).on("click",".search_game_btn_fld_game",function(e){
                            e.preventDefault();
                            var pref_search_game_txt = jQuery("#pref_search_game_txt_game_fld").val();
                            var main_cat = jQuery(".main_cat_game_fld").val();
                            var sub_cats = jQuery(".sub_cats_game_fld").val();
                            jQuery(".loader_show").show();
                                jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "games_sorting_cat_univ",
                                    pref_search_game_txt : pref_search_game_txt,
                                    main_cat : main_cat,
                                    sub_cats : sub_cats
                                    },
                                    success : function( response ) {

                                    jQuery(".main-game-wrapper").html(response);
                                    jQuery(".loader_show").hide();
                                    /*jQuery(".likes h4 span").html(response);
                                    jQuery(".loader_show").hide();
                                    location.reload();*/

                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                                });
                        });
                        jQuery(document).on("click",".search_game_btn_peref",function(e){
                            e.preventDefault();
                            var pref_search_game_txt = jQuery("#pref_search_game_txt").val();
                            var main_cat = jQuery(".main_cat_per").val();
                            var sub_cats = jQuery(".sub_cats_pere").val();
                            jQuery(".loader_show").show();
                                jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "show_posts_games_image_pref",
                                    pref_search_game_txt : pref_search_game_txt,
                                    main_cat : main_cat,
                                    sub_cats : sub_cats
                                    },
                                    success : function( response ) {

                                    jQuery(".main-game-wrapper").html(response);
                                    jQuery(".loader_show").hide();
                                    /*jQuery(".likes h4 span").html(response);
                                    jQuery(".loader_show").hide();
                                    location.reload();*/

                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                                });
                        });
                        jQuery(document).on("change","#pref-orderby",function(){
                            //alert("work");
                            var sorting_type = jQuery(this).val();
                            jQuery(".ajax_loader").show();
                            jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "games_sorting_cat",
                                    sorting_type : sorting_type
                                    },
                                    success : function( response ) {

                                    //console.log(response);
                                    jQuery(".main-game-wrapper").html(response);
                                    jQuery(".ajax_loader").hide();
                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                            });
                        });
                        jQuery(document).on("change","#pref-orderby-game-univers",function(){
                            //alert("work");
                            var sorting_type = jQuery(this).val();
                            jQuery(".ajax_loader").show();
                            jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "games_sorting_cat_game_univers",
                                    sorting_type : sorting_type
                                    },
                                    success : function( response ) {

                                    //console.log(response);
                                    jQuery(".main-game-wrapper").html(response);
                                    jQuery(".ajax_loader").hide();
                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                            });
                        });
                        jQuery(document).on("change","#pref-orderby-pref",function(){
                            //alert("work");
                            var sorting_type = jQuery(this).val();
                            jQuery(".ajax_loader").show();
                            jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "games_sorting_cat_pref",
                                    sorting_type : sorting_type
                                    },
                                    success : function( response ) {

                                    //console.log(response);
                                    jQuery(".main-game-wrapper").html(response);
                                    jQuery(".ajax_loader").hide();
                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                            });
                        });
                        jQuery(document).on("click",".nav-tabs li a",function(){
                            var new_id = jQuery(this).attr("data-post-id");
                            //alert(new_id);
                            if(new_id!=""){
                                jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "games_new_relatd_show",
                                    new_id : new_id
                                    },
                                    success : function( response ) {

                                    //console.log(response);
                                    jQuery("#news").html(response);
                                    jQuery(".ajax_loader").hide();
                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                                });
                            }
                            
                        });
                        jQuery(document).on("click",".show-results-type",function(){
                            var taxonomy_name = jQuery(this).attr("data-taxonomy");
                            var post_types_name = jQuery(this).attr("data-post-name");
                            var term_id = jQuery(this).attr("id");
                            jQuery(".loader_ajax").show();
                            jQuery.ajax({
                                    url : "' . site_url() . '/wp-admin/admin-ajax.php",
                                    type : "post",
                                    data : {
                                    action : "show_cats_related_posts",
                                    post_types_name : post_types_name,
                                    taxonomy_name : taxonomy_name,
                                    term_id : term_id
                                    },
                                    success : function( response ) {

                                    //console.log(response);

                                    jQuery(".main-game-wrapper").html(response);
                                    jQuery(".loader_ajax").hide();
                                    },
                                     error: function(errorThrown){

                                    console.log(errorThrown);
                                    }
                                });
                        });
    				});
    			</script>';
        echo $html;
    }

    function search_video_based_on_character() {
        $search_title = $_POST["search_flds"];
        $html = '';
        $args = array(
            'post_type' => 'video',
            's' => $search_title,
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC'
        );
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {

            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                $post_id = get_the_ID();
                $video_url = get_post_meta($post_id, 'video_url', true);
                $timming = get_post_meta($post_id, 'video_time', true);
                $term_list = wp_get_post_terms($post_id, 'video-cat', array("fields" => "all"));
                $html .= '<div class="col-xs-3">
	                    	<div class="video-box">
	                        	<iframe width="100%" height="150" src="' . $video_url . '" frameborder="0" allowfullscreen=""></iframe>
	                        	<h2>' . get_the_title($post_id) . '</h2>
	                        	<div class="video-description">
	                            	<h6>' . $timming . '</h6>
	                            	<h6>' . $term_list[0]->name . '</h6>
	                        	</div>
	                   		</div>
	                	</div>';
            }
        } else {
            $html .= 'No video found';
        }
        echo $html;
        die();
    }

    function gamming_videos() {
        $html = '';
        $args = array(
            'post_type' => 'video',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {

            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $video_url = get_post_meta($post_id, 'video_url', true);
                $timming = get_post_meta($post_id, 'video_time', true);
                $term_list = wp_get_post_terms($post_id, 'video-cat', array("fields" => "all"));

                $html .= '<div class="col-xs-3">
	                    	<div class="video-box">
	                        	<iframe width="100%" height="150" src="' . $video_url . '" frameborder="0" allowfullscreen=""></iframe>
	                        	<h2>' . get_the_title() . '</h2>
	                        	<div class="video-description">
	                            	<h6>' . $timming . '</h6>
	                            	<h6>' . $term_list[0]->name . '</h6>
	                        	</div>
	                   		</div>
	                	</div>';
            }


            wp_reset_postdata();
        }


        return $html;
    }

//buying guide page shortcodes slider start
    function buying_guide_slider_shower($atts = array(), $content = null, $tag) {

        shortcode_atts(array(
            'var1' => 'default var1',
            'slug' => false,), $atts);
        $html = '';
        $post_slug = $atts["slug"];
        $args = array(
            'post_type' => 'guides',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'buying-guide',
                    'field' => 'slug',
                    'terms' => $post_slug,
                ),
            ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $i = 0;
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');

                if ($i == 0) {
                    $html = '<div class="item active">
								<div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
									<a href="#"><img src="' . $featured_img_url . '" alt="slider 01"></a>
									<div class="team_columns_item_caption">
                                         <h4>' . get_post_meta($post_id, 'buying_guides_price', true) . '</h4>
                                    </div>
                                    <div class="list-colums">';
                    if (have_rows('buying_guides_features')):

                        while (have_rows('buying_guides_features')) : the_row();

                            $html .= '<h4>
									    <i class="fa fa-arrow-circle-o-right" aria-hidden="true">
									    </i>' . get_sub_field('features') . '</h4>';

                        endwhile;

                    endif;
                    $html .= '</div>
                                    <div class="color-red">
                                        <h4>' . get_the_title($post_id) . '</h4>
                                    </div>
                                    <div class="row">';
                    if (have_rows('buying_guides_description')):

                        while (have_rows('buying_guides_description')) : the_row();

                            $html .= '<div class="col-md-4 remove_padding">
				<p>' . get_sub_field('features_description') . '</p>
									        		</div>';
                        endwhile;
                    endif;
                    $html .= '</div>
								</div>
							</div>
							';
                }
                else {
                    $html = '<div class="item">
								<div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
									<a href="#"><img src="' . $featured_img_url . '" alt="slider 01"></a>
									<div class="team_columns_item_caption">
                                         <h4>' . get_post_meta($post_id, 'buying_guides_price', true) . '</h4>
                                    </div>
                                    <div class="list-colums">';
                    if (have_rows('buying_guides_features')):

                        while (have_rows('buying_guides_features')) : the_row();

                            $html .= '<h4>
									        			<i class="fa fa-arrow-circle-o-right" aria-hidden="true">
									        		</i>' . get_sub_field('features') . '</h4>';

                        endwhile;

                    endif;
                    $html .= '</div>
                                    <div class="color-red">
                                        <h4>' . get_the_title($post_id) . '</h4>
                                    </div>
                                    <div class="row">';
                    if (have_rows('buying_guides_description')):

                        while (have_rows('buying_guides_description')) : the_row();

                            $html .= '<div class="col-md-4 remove_padding">
									         			<p>' . get_sub_field('features_description') . '</p>
									        		</div>';
                        endwhile;
                    endif;
                    $html .= '</div>
								</div>
							</div>
							';
                }
                $i++;
            }


            wp_reset_postdata();
        } else {
// no posts found
        }
        return $html;
    }

//buying guides page shortcodes slider end
}
?>
