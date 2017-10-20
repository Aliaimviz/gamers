<?php
/**
 * Template Name:Game Database
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
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 pull-right">
                <div class="new_form">
                    <div id="filter-panel" class="filter-panel header-panel">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-inline" role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm change_width" id="pref_search_game_txt" placeholder="search">
                                        </div>
                                        <div class="form-group header-select">
                                            <select id="pref-orderby" class="form-control sml-select main_cat">
                                                <option value="">Choose</option>
                                                <?php
                                                $taxonomy = 'game-cat';
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
                                            <select id="pref-orderby" class="form-control sml-select sub_cats">
                                                
                                            </select>
                                        </div>
                                        <div class="form-group btn-group-right">
                                            <button type="submit" class="btn btn-default filter-col header-btn-icon search_game_btn">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sort-select pull-right">
                                            <div class="form-group">
                                                <label class="">Sort By</label>
                                            </div>
                                            <div class="form-group header-select">
                                                <select id="pref-orderby" class="form-control sml-select">
                                                    <option>MAIN CATEGORY</option>
                                                    <option>first</option>
                                                    <option>second</option>
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
        <!--./End FIrst Row-->
        <div class="row r-m-p">
            <div class="col-xs-3 r-m-p">
                <div class="video-pge-left-side">
                    <div class="col-xs-12 r-m-p">
                        <div>
                            <div class="list-group panel">
                                <?php echo do_shortcode('[game-database-cats]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="col-xs-12 r-m-p">
                                    <section id="custom_html-20" class="widget_text widget widget_custom_html">
                                        <div class="textwidget custom-html-widget similar-product">
                                            <div class="similar-products">
                                                <h3>Top 10 of Month</h3>
                                                <ul class="clearfix">
                                                    <li>
                                                        <div>
                                                            <span>COMING 2017</span>
                                                            <h4><a href="#"> HORIZON: ZERO DAWN THE FROZEN</a></h4>
                                                        </div>
                                                        <span>
                                                            <div class="text">8.5</div>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <span>COMING 2017</span>
                                                            <h4><a href="#"> HORIZON: ZERO DAWN THE FROZEN</a></h4>
                                                        </div>
                                                        <span>
                                                            <div class="text">8.5</div>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <span>COMING 2017</span>
                                                            <h4><a href="#"> HORIZON: ZERO DAWN THE FROZEN</a></h4>
                                                        </div>
                                                        <span>
                                                            <div class="text">8.5</div>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <span>COMING 2017</span>
                                                            <h4><a href="#"> HORIZON: ZERO DAWN THE FROZEN</a></h4>
                                                        </div>
                                                        <span>
                                                            <div class="text">8.5</div>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <span>COMING 2017</span>
                                                            <h4><a href="#"> HORIZON: ZERO DAWN THE FROZEN</a></h4>
                                                        </div>
                                                        <span>
                                                            <div class="text">8.5</div>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                
                                        </div>
                                    </section>
                                </div>-->
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
                <div class="main-game-wrapper">
                    <?php
                    echo do_shortcode('[game-database]');
                    ?>
                </div>
            </div><!--./End -->
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();
