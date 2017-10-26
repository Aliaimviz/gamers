<?php
/**
 * Template Name:Game Result
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
<div class="container-fluid bg-color">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="inner_form">
                    <div id="filter-panel" class="filter-panel header-panel">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="" role="form">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm change_width" id="pref-search" placeholder="search">
                                    </div>
                                    <div class="form-group header-select">
                                        <select id="pref-orderby" class="form-control sml-select">
                                            <option>MAIN CATEGORY</option>
                                            <option>first</option>
                                            <option>second</option>
                                        </select>
                                    </div>
                                    <div class="form-group header-select">
                                        <select id="pref-orderby" class="form-control sml-select">
                                            <option>SUB CATEGORY</option>
                                            <option>first sub</option>
                                            <option>second sub</option>
                                        </select>
                                    </div>
                                    <div class="form-group btn-group-right">
                                        <button type="submit" class="btn btn-default filter-col header-btn-icon">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>  
                                        <button type="submit" class="btn btn-default filter-col header-btn-search">
                                            Search <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="result_title">
                    <h6>About 1000 Games results</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="media-list result_list">
                    <?php
                    if(isset($_POST["search_btns"])){
                        $game_name = $_POST["home_search_fld"];
                         $args = array(
                                'post_type' => 'game',
                                's' => $game_name,
                                'post_status' => 'publish',
                                'orderby' => 'title',
                                'posts_per_page' => -1,
                                'order' => 'ASC'
                            );
                            $query = new WP_Query($args);
                        //print_r($query);
                        ?>
                        <ul>
                        <?php
                        if($query->have_posts()){
                            while ($query->have_posts()) {
                            $query->the_post();
                                $posts = $query->posts;
                                $post_id = get_the_ID();
                                $content = get_the_content($post_id);
                                $contents = substr($content, 0, 80);
                                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                                $title = get_the_title($post_id);
                                ?>
                                <ul class="media-list result_list">
                    
                            <li class="media">
                            <div class="pull-left">
                                <a href="<?php echo  get_the_permalink($post_id) ; ?>">
                                    <img class="media-object" src="<?php echo $featured_img_url; ?>" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $title; ?></h4>
                                <?php
                                    $term_list = wp_get_post_terms($post_id, 'game-cat', array("fields" => "all"));
                                    if (!empty($term_list)) {
                                       
                                        foreach ($term_list as $list) {

                                            $html .= $list->name . ' > ';

                                           
                                        }
                                    }
                                ?>
                                <p>
                                    <?php 
                                    echo $contents;
                                    ?>
                                </p>
                            </div>
                        </li>
                            
                                <?php
                            }
                        }  
                        ?>
                        </ul>
                        <?php
           
                    }else{
                        echo do_shortcode('[show-all-games]');
                    }
                    
                    /* for ($a = 1; $a <= 10; $a++) { ?>
                      <li class="media">
                      <div class="pull-left">
                      <a href="#">
                      <img class="media-object" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/game-img.png" alt="...">
                      </a>
                      </div>
                      <div class="media-body">
                      <h4 class="media-heading">Driving Games</h4>
                      <h5>DATABASE > VIDEO GAMES > PC VIDEO GAMES</h5>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                      </div>
                      </li>
                      <?php
                      } */
                    ?>

                </ul>
            </div>
           <!--  <div class="col-xs-12">
                <div class="xee-pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> -->
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();
