<?php
/**
 * Template Name: Game Comparision
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
//global $id;
?>
<?php
if (have_posts()) {
    while (have_posts()):the_post();
        $Featured_Image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        ?>
        <div class="container-fluid tops-banner" style="background:url(<?php echo $Featured_Image[0]; ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>top <strong>player</strong> top <strong>choice</strong></h1>
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
            <div class="col-xs-12">
                <div class="compare-top-row clear">
                    <div class="heading-compair pull-left">
                        <h2>Compare</h2>
                    </div>
                    <div class="add_remove_btn_groups pull-right">
                        <a href="#" class="btn btn-default btn-danger">add</a>
                        <a href="#" class="btn btn-default btn-black">remove</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive custom-table">
                    <div class="col-xs-3 r-m-p">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>
                                        <div>
                                            <a href="#">
                                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/Untitled-6.png" width="100%" class="center-block img-responsive"/>
                                                <h2>Product 1  title</h2>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="top-pad">
                                    <td></td>
                                </tr>
                                <tr class="heaings-row">
                                    <td><span>reviews</span></td>
                                </tr>
                                <tr class="second-row">
                                    <td><h6>Expert rating</h6></td>

                                </tr>
                                <tr class="second-row">
                                    <td><h6>Expert rating</h6></td>
                                </tr>
                                <tr class="top-pad">
                                    <td></td>
                                </tr>
                                <tr class="price_blk">
                                    <td><span>price</span></td>
                                </tr>
                                <tr class="second-row">
                                    <td><h6>Price</h6></td>
                                </tr>
                                <tr class="top-pad">
                                    <td></td>
                                </tr>
                                <tr class="product_red">
                                    <td><span>product specification</span>
                                        <a href="#demo-1" id="tog_one" data-toggle="collapse" data-target="slide-1" data-expand="false" class="down-caret"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <tr class="second-row collapse slide-1" aria-expanded="false" id="demo-1">
                                    <td class="no-padding">
                                        <?php for ($a = 1; $a <= 10; $a++) { ?>
                                            <h5><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Waranty Terms Parts</h5>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr class="top-pad">
                                    <td></td>
                                </tr>
                                <tr class="product_red">
                                    <td><span>product specification</span> <a href="#demo-2" id="tog_two" data-expand="false" data-target="slide-2" data-toggle="collapse" class="down-caret"><i class="fa fa-caret-down" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr class="second-row collapse slide-2" aria-expanded="false" id="demo-2">
                                    <td colspan="4" class="no-padding">
                                        <?php for ($a = 1; $a <= 10; $a++) { ?>
                                            <h5><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Waranty Terms Parts</h5>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr class="top-pad">
                                    <td></td>
                                </tr>
                                <tr class="product_red">
                                    <td><span>product specification</span><a href="#demo-3" id="tog_three" data-target="slide-3" data-expand="false" data-toggle="collapse" class="down-caret"><i class="fa fa-caret-down" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr class="second-row collapse slide-3" aria-expanded="false" id="demo-3">
                                    <td colspan="4" class="no-padding">
                                        <?php for ($a = 1; $a <= 10; $a++) { ?>
                                            <h5><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Waranty Terms Parts</h5>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-9 r-m-p">
                        <div id="table-slider" class="owl-carousel owl-theme">
                            <?php
                            // if(!empty($counts)){
                            $game_id = $_COOKIE['compareArray'];
                            $ids = explode(',', $game_id);
                            $id = array_unique($ids);
                           /// print_r($id);
                            $counts = count($id);
                            if (!empty($id[0])) {
                                
                                foreach ($id as $keys) {
                                    //echo $keys;
                                    //echo $val;
                                    $featured_img_url = get_the_post_thumbnail_url($keys, 'full');
                                    $title = get_the_title($keys);
                                    ?>
                                    <div class="item">
                                        <div class="col-xs-12 r-m-p">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="<?php echo $featured_img_url; ?>" width="100%" class="center-block img-responsive" style="display: block"/>
                                                                <h2><center><?php echo substr($title, 0, 11); ?></center></h2>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="top-pad">
                                                        <td></td>
                                                    </tr>
                                                    <tr class="heaings-row">
                                                        <td></td>
                                                    </tr>
                                                    <tr class="second-row">
                                                        <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                                                    </tr>
                                                    <tr class="second-row">
                                                        <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                                                    </tr>
                                                    <tr class="top-pad">
                                                        <td></td>
                                                    </tr>
                                                    <tr class="price_blk">
                                                        <td></td>
                                                    </tr>
                                                    <tr class="second-row">
                                                        <td><p class="clear"><span class="text-paras">185€-link</span></p></td>
                                                    </tr>
                                                    <tr class="top-pad">
                                                        <td></td>
                                                    </tr>
                                                    <tr class="product_red">
                                                        <td><a href="#demo-1" data-toggle="collapse" class="down-caret" ></a></td>
                                                    </tr>
                                                    <tr class="second-row collapse slide-1 slide-1" aria-expanded="false" id="demo-1">
                                                        <td class="no-padding">
                                                            <?php for ($a = 1; $a <= 10; $a++) { ?>
                                                                <h5> Not Available</h5>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr class="top-pad">
                                                        <td></td>
                                                    </tr>
                                                    <tr class="product_red">
                                                        <td><a href="" class="down-caret"></a></td>
                                                    </tr>
                                                    <tr class="second-row collapse slide-2" aria-expanded="false" id="demo-2">
                                                        <td colspan="4" class="no-padding">
                                                            <?php for ($a = 1; $a <= 10; $a++) { ?>
                                                                <h5> Not Available</h5>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr class="top-pad">
                                                        <td></td>
                                                    </tr>
                                                    <tr class="product_red">
                                                        <td><a href="" data-toggle="collapse" class="down-caret"></a></td>
                                                    </tr>
                                                    <tr class="second-row collapse slide-3" aria-expanded="false" id="demo-3">
                                                        <td colspan="4" class="no-padding">
                                                            <?php for ($a = 1; $a <= 10; $a++) { ?>
                                                                <h5> Not Available</h5>
                                                                <?php
                                                            }
                                                            ?>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="compare-top-row clear">
                        <div class="add_remove_btn_groups pull-right">
                            <a href="#" class="btn btn-default btn-danger">Buy</a>
                            <a href="#" class="btn btn-default btn-black">Buy</a>
                            <a href="#" class="btn btn-default btn-black">Buy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div></div></div>

</div>
<?php
get_sidebar();
get_footer();
