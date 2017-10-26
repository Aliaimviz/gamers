<?php
/**
 * Template Name:User Admin Review
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Gamerz
 */
get_header();

$Post_ID = $_GET['post_ID'];
$User_ID = get_current_user_id();
$args = array(
    'post_parent' => $Post_ID,
    'post_type' => 'review',
    'author' => $User_ID,
);
$query = new WP_Query($args);
if ($query->post->ID) {
    ?>
    <style>

        #user-review{
            display: none;
        }
        .shows{
            display:block!important;
        }
    </style>
    <?php
}
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-12 col-xs-12 col-xs-12">
                <div class="write-a-review">
                    <h2><i class="fa fa-comments" aria-hidden="true"></i> Write A Review</h2>
                    <h6>
                        <span>Tap a star to rate </span>
                        <div class="row lead">
                            <div id="stars" class="starrr"></div>
                        </div>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="media review-form">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/user-img.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <form class="form" id="review_form" method="post" onsubmit="review_validation()">
                            <input type="hidden" name="star_value" id="count" data-error="requid star field">
                            <input type="hidden" name="post_ID" value="<?php echo $Post_ID; ?>">
                            <input type="hidden" name="User_ID" value="<?php echo $User_ID; ?>">
                            <div class="form-group">
                                <textarea class="form-control" rows="10" name="msg"></textarea>
                            </div>
                            <div class="form-group">
                                <?php
                                ?>
                                <button type="submit" id="user-review" class="btn btn-default">Sumbit</button>
                                <?php
                                ?>
                                <div class="alert alert-danger shows">
                                    <a href="#" class="" data-dismiss="alert">&times;</a>
                                    <strong>Alert!</strong> You have reviewd this game
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="critic_reviews">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">critic reviews</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="reviews_box">
                                        <ul id="buying-guide-side">
                                            <?php 
                                                $post_ids = $_GET["post_ID"];
                                                       
                                                        $admin_rate2 = array(
                                                                        'post_type' => 'review',
                                                                        'post_status' => 'publish',
                                                                        'posts_per_page' => 12,
                                                                        'meta_query' => array(
                                                                            array(
                                                                                'key' => 'wpcf-post-id',
                                                                                'value' =>  $post_ids,
                                                                                'compare' => '=',
                                                                            ),
                                                                        )

                                                                    );
                                                        $query_rate_admin2 = new WP_Query($admin_rate2);
                                                            $i=0;
                                                              while ($query_rate_admin2->have_posts()) {
                                                                    $query_rate_admin2->the_post();
                                                                    
                                                                    $post_id = get_the_ID();
                                                                    $author_id = get_the_author($post_id);
                                                                     $user = get_user_by( 'id', $author_id );
                                                                 ?>
                                                                    <li>
                                                                        <div>
                                                                            <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                            <div>
                                                                                <h3 class="name-title"><?php echo $author_id; ?></h3>
                                                                                <span><?php echo get_post_meta($post_id,'wpcf-rating',true); ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <p>
                                                                           <?php echo get_the_content(); ?>
                                                                        </p>
                                                                        <a href="<?php echo get_the_permalink(); ?>" class="btn brn-default">ReaD FULL REVIEWS</a>
                                                                    </li>
                                                                <?php 
                                                                if($i==5){
                                                                    ?>
                                                                    </ul>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <div class="reviews_box">
                                                                            <ul id="buying-guide-side" class="border-right">
                                                                    <?php
                                                                }
                                                                $i++;
                                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="col-xs-6">
                                    <div class="reviews_box">
                                        <ul id="buying-guide-side" class="border-right">

                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="user_review">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">user reviews</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="user_reviews_box">
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
                                                        if($query->have_posts()){
                                                            while ($query->have_posts()){
                                                            $query->the_post();
                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                                            $post_id = get_the_ID();

                                             ?>
                                                <li>
                                                    <div>
                                                        <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                        <div>
                                                            <h3 class="name-title"><?php the_title(); ?></h3>
                                                            <span><?php echo get_post_meta($post_id,'wpcf-rating',true); ?></span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <?php echo get_the_content(); ?>
                                                    </p>
                                                    <a href="<?php echo get_the_permalink(); ?>" class="btn brn-default">ReaD FULL REVIEWS</a>
                                                </li>
                                            <?php } 
                                                }else{

                                                    $args = array(
                                                            'post_type' => 'review',
                                                            'posts_per_page' => 3,
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
                                                        if($query->have_posts()){
                                                            while ($query->have_posts()){
                                                            $query->the_post();
                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                                            $post_id = get_the_ID();
                                                            
                                             ?>
                                                <li>
                                                    <div>
                                                        <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                        <div>
                                                            <h3 class="name-title"><?php the_title(); ?></h3>
                                                            <span><?php echo get_post_meta($post_id,'wpcf-rating',true); ?></span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <?php echo get_the_content(); ?>
                                                    </p>
                                                    <a href="<?php echo get_the_permalink(); ?>" class="btn brn-default">ReaD FULL REVIEWS</a>
                                                </li>
                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="user_reviews_box">
                                        <ul id="buying-guide-side" class="border-right">
                                            <?php /*for ($a = 1; $a < 4; $a++) { ?>
                                                <li>
                                                    <div>
                                                        <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                        <div>
                                                            <h3 class="name-title">john smith</h3>
                                                            <span>9.5/10.0 (ps4) 
                                                                &nbsp; <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                                                    </p>
                                                </li>
                                            <?php }*/ ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
    <div class="row">
        <a href="#">
            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/add-sens-img.png" width="100%"/>
        </a>
    </div> 
</div>

<?php
get_sidebar();
get_footer();
