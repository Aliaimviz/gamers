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
                                                <!-- 
                                                <option>first</option>
                                                <option>second</option> -->
                                            </select>
                                        </div>
                                        <div class="form-group header-select">
                                            <select id="pref-orderby" class="form-control sml-select sub_cats">
                                                <!-- <option>SUB CATEGORY</option>
                                                <option>first sub</option>
                                                <option>second sub</option> -->
                                            </select>
                                        </div>
                                        <div class="form-group btn-group-right">
                                            <button type="submit" class="btn btn-default filter-col header-btn-icon search_game_btn">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>  
                                            <!-- <button type="submit" class="btn btn-default filter-col header-btn-search">
                                                Search <span class="glyphicon glyphicon-search"></span>
                                            </button> -->
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
                                <!-- <a class="list-group-item list-group-item strong text-center type-box reg-color" data-toggle="collapse"> Catagorie</a>
                                <a href="#demo1" class="list-group-item list-group-item-success strong type-inner" data-toggle="collapse" data-parent="#MainMenu">Hardware</i></a>
                                <div class="collapse list-group-submenu" id="demo1">
                                    <a href="#" class="list-group-item">Mouse</a>
                                    <a href="#" class="list-group-item">Tasterie</a>
                                    <a href="#" class="list-group-item">Cuffie	</a>
                                    <a href="#" class="list-group-item">Monitors</a>
                                    <a href="#" class="list-group-item">Tappetni</a>
                                    <a href="#" class="list-group-item">Sedie Da Gaming</a>
                                </div> 
                                <a href="#demo2" class="list-group-item list-group-item-success strong type-inner" data-toggle="collapse" data-parent="#MainMenu">Giochie <i class="fa fa-caret-down"></i></a>
                                <div class="collapse list-group-submenu" id="demo2">
                                    <a href="#" class="list-group-item">Gieochi PC</a>
                                </div>  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 r-m-p">
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
                </div>
                <div class="col-xs-12 r-m-p">
                    <div class="add_sens_box">
                        <a href="#">
                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/Gamers_Video-PAge.png"/>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 r-m-p">
                    <div class="add_sens_box">
                        <a href="#">
                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/ad_red.png"/>
                        </a>
                    </div>
                </div>
            </div><!--./End left side Game database-->
            <div class="col-xs-9">
                <div class="main-game-wrapper">
                    <?php
                    echo do_shortcode('[game-database]');
                    /* for ($a = 1; $a <= 9; $a++) { ?>
                      <div class="col-xs-4">
                      <div class="game_box">
                      <div class="img-box">
                      <a href="#">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/game-db-img.png" class="center-block" width="100%"/>
                      <span class="hover-img">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/hover-bg.png" class="center-block" width="100%"/>
                      <p>Read More</p>
                      </span>
                      </a>
                      <span class="gm_like"><i class="fa fa-heart" aria-hidden="true"></i> 123</span>
                      <span class="cat_name">Category</span>
                      </div><!--./End Img-box here-->
                      <div class="game_detailing">
                      <h5>call of  duty</h5>
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
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                      </div>
                      <div class="col-xs-12">
                      <div class="col-xs-4">
                      <a href="#" class="user_attach_box">
                      <h6><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/like.png" class="center-block img-responsive"/></h6>
                      <h6>Compare</h6>
                      </a>
                      </div>
                      <div class="col-xs-4">
                      <a href="#" class="user_attach_box">
                      <h6><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/compare.png" class="center-block img-responsive"/></h6>
                      <h6>like</h6>
                      </a>
                      </div>
                      <div class="col-xs-4">
                      <a href="#" class="user_attach_box">
                      <h6><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shaere.png" class="center-block img-responsive"/></h6>
                      <h6>share</h6>
                      </a>
                      </div>
                      </div>
                      </div>
                      </div><!--./End game_detailing Here-->
                      </div>
                      </div>
                      <?php } */
                    ?>
                </div>
            </div><!--./End -->
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();
