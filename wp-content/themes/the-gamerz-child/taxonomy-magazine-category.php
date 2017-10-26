<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Gamerz
 */
get_header();
$actual_link = "$_SERVER[REQUEST_URI]";
$exps = explode("/", $actual_link);
//print_r($exps);
end($exps);
$z = prev($exps);
$category = get_term_by('slug', $z, 'magazine-category');
?>
<link rel='stylesheet' id='js_composer_front-css'  href='<?= content_url(); ?>/uploads/js_composer/js_composer_front_custom.css?ver=5.2.1' type='text/css' media='all' />
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <article id="post-166" class="post-166 page type-page status-publish hentry">
                <header class="entry-header">
                    <h1 class="entry-title">Archieve</h1>
                </header>
                <div class="entry-content">
                    <div class="vc_row wpb_row vc_row-fluid home-page container archive-page mar">
                        <div class="wpb_column vc_column_container vc_col-sm-8 vc_col-lg-8 vc_col-md-8 vc_col-xs-12">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element ">
                                        <div class="wpb_wrapper">
                                            <?php the_archive_title('<h1 class="archieve-heading"><strong>', '</strong></h1>'); ?>
                                        </div>
                                    </div>
                                    <div class="vc_row wpb_row vc_inner vc_row-fluid mar">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper ">
                                                            <?php echo do_shortcode("[Magazine series='0-5' category='" . $category->term_id . "']"); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_row wpb_row vc_inner vc_row-fluid mg-content-ad mar">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <?php the_ad(229); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_row wpb_row vc_inner vc_row-fluid mar">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper row"><?php //echo $category->name;           ?>
                                                            <?php echo do_shortcode("[Magazine series='6-10' category='" . $category->term_id . "']"); ?>
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
                    <div class="sidebar-magazine wpb_column vc_column_container vc_col-sm-4 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="wpb_widgetised_column wpb_content_element magazine-sidebar-wrapper">
                                    <div class="wpb_wrapper">
                                        <?php dynamic_sidebar('Magazine Archieve Page Sidebar'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->
<script type='text/javascript' src='<?= plugins_url(); ?>/js_composer/assets/js/dist/js_composer_front.min.js?ver=5.2.1'></script>
<?php
get_footer();
