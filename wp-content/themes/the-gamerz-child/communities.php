<?php
/**
 * Template Name: communities
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
?>
<?php
if (have_posts()) {
    while (have_posts()):the_post();
        $featured_Img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        ?>
        <div class="container-fluid banner-communities" style="background:url(<?php echo $featured_Img[0]; ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="banner-heading">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endwhile;
}
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <?php
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'community-type',
                'posts_per_page' => 6,
                'paged' => $paged
            );
            $query = new WP_Query($args);
            while ($query->have_posts()):$query->the_post();
                $Featured_Image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $com_link = get_post_meta($post->ID, 'wpcf-link', true);
                ?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="community-main-box">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo $Featured_Image[0]; ?>" alt="community logo">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php the_title(); ?></h4>
                                <p>
                                    <?php echo get_the_content(); ?>
                                </p>
                                <a href="<?php echo $com_link; ?>" target="_blank">Community link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            ?>
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();
