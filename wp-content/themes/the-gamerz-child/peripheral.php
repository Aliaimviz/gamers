<?php
/**
 * Template Name:Peripheral
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
<div class="container-fluid r-m-p">
    <?php
    if (have_posts()) {
        while (have_posts()):the_post();
            $Featured_Image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            ?>
            <img src="<?php echo $Featured_Image[0]; ?>"/>
            <?php
        endwhile;
    }
    ?>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 pull-right">
                <div class="new_form">
                    <div id="filter-panel" class="filter-panel header-panel">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-inline pull-right" role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm change_width" id="pref_search_game_txt" placeholder="search">
                                        </div>
                                        <div class="form-group header-select">
                                            <select id="pref-orderbys" class="form-control sml-select main_cat_per">
                                                <option value="">Choose</option>
                                                <?php
                                                $taxonomy = 'peripherals-caterory';
                                                $parents = get_terms($taxonomy, array('parent' => 0, 'hide_empty' => false, 'orderby' => 'id'));
                                                if (!empty($parents)) {
                                                    foreach ($parents as $parent_link) {
                                                        ?>
                                                        <option value="<?php echo $parent_link->term_id; ?>"><?php echo $parent_link->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group header-select">
                                            <select id="pref-orderby" class="form-control sml-select sub_cats_pere">

                                            </select>
                                        </div>
                                        <div class="form-group btn-group-right">
                                            <button type="submit" class="btn btn-default filter-col header-btn-icon search_game_btn_peref">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sort-select pull-right mar-none">
                                            <div class="form-group">
                                                <label class="">Sort By</label>
                                            </div>
                                            <div class="form-group header-select">
                                                <select id="pref-orderby-pref" class="form-control sml-select">
                                                    <option>MAIN CATEGORY</option>
                                                    <option value="id">ID</option>
                                                    <option value="Date">DATE</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row r-m-p">
            <div class="col-xs-3 r-m-p">
                <div class="video-pge-left-side">
                    <div class="col-xs-12 r-m-p">
                        <div>
                            <div class="list-group panel">
                                <?php echo do_shortcode('[post-type-terms-get taxonomy-name="peripherals-caterory" post-type-name="peripheral"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo do_shortcode('[top-ten-rating-games]'); ?>
                <div class="col-xs-12 r-m-p">
                    <div class="add_sens_box">
                        <a href="#">
                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/Gamers_Video-PAge.png" class="img-responsive"/>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 r-m-p">
                    <div class="add_sens_box">
                        <a href="#">
                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/ad_red.png" class="img-responsive"/>
                        </a>
                    </div>
                </div>
            </div><!--./End left side Game database-->
            <div class="col-xs-9">
                <img src="<?php echo site_url(); ?>/ajax-loader.gif" class="ajax_loader" style="display:none;">
                <div class="main-game-wrapper">
                    <?php
                    echo do_shortcode('[show-peripheral-all]');
                    ?>
                </div>
            </div><!--./End -->
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();
