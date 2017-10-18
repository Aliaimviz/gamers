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

                        $html .= '</div><!--./End Img-box here-->
	                                <div class="game_detailing">
	                                    <h5>' . get_the_title($post_id) . '</h5>
	                                    <div class="row">
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">
	                                                <span>70</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">5 Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">
	                                                <span>68</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">13 USer Rating</p>
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

                    $html .= '</div><!--./End Img-box here-->
	                                <div class="game_detailing">
	                                    <h5>' . get_the_title($post_id) . '</h5>
	                                    <div class="row">
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">
	                                                <span>70</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">5 Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">
	                                                <span>68</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">13 USer Rating</p>
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
	                                            <div class="pull-left rating-bg">
	                                                <span>70</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">5 Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">
	                                                <span>68</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">13 USer Rating</p>
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
                                            <div class="pull-left rating-bg">
                                                <span>70</span>
                                            </div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">5 Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">
                                                <span>68</span>
                                            </div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">13 USer Rating</p>
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
	                                            <div class="pull-left rating-bg">
	                                                <span>70</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">5 Expert Rating</p>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="pull-left rating-bg">
	                                                <span>68</span>
	                                            </div>
	                                            <div class="media-body rating-text">
	                                                <p class="media-heading">13 USer Rating</p>
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
                                    <h5>' . substr(get_the_title($post_id), 10) . '</h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">
                                                <span>70</span>
                                            </div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">5 Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">
                                                <span>68</span>
                                            </div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">13 USer Rating</p>
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

                $html .= '</div><!--./End Img-box here-->
                                <div class="game_detailing">
                                    <h5>' . substr($title, 20) . '</h5>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">
                                                <span>70</span>
                                            </div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">5 Expert Rating</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="pull-left rating-bg">
                                                <span>68</span>
                                            </div>
                                            <div class="media-body rating-text">
                                                <p class="media-heading">13 USer Rating</p>
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
								jQuery(".loader_show").show();
    							jQuery.ajax({
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
								});
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
    							jQuery(".loader_show").show();
    							jQuery.ajax({
									url : "' . site_url() . '/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "show_cats_games_posts_shows",
									cats_ids : cats_ids,
									},
									success : function( response ) {
									    
									jQuery(".main-game-wrapper").html(response);
									/*jQuery(".likes h4 span").html(response);
									jQuery(".loader_show").hide(); 
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
									/*jQuery(".likes h4 span").html(response);
									jQuery(".loader_show").hide(); 
									location.reload();*/

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