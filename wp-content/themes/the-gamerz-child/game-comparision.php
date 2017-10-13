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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>
                                    <div>
                                        <a href="#">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thumnail-img-1.png" width="100%" class="center-block img-responsive"/>
                                            <h2>Product 1  title</h2>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="#">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thumnail-img-1.png" width="100%" class="center-block img-responsive"/>
                                            <h2>Product 1  title</h2>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="#">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thumnail-img-1.png" width="100%" class="center-block img-responsive"/>
                                            <h2>Product 1  title</h2>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="#">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thumnail-img-1.png" width="100%" class="center-block img-responsive"/>
                                            <h2>Product 1  title</h2>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="top-pad">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="heaings-row">
                                <td><span>reviews</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="second-row">
                                <td><h6>Expert rating</h6></td>
                                <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                                <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                                <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                            </tr>
                            <tr class="second-row">
                                <td><h6>Expert rating</h6></td>
                                <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                                <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                                <td><p class="clear"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/rating-icon.png" class="img-responsive"/></span> <span class="text-paras">15 votes</span></p></td>
                            </tr>
                            <tr class="top-pad">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="price_blk">
                                <td><span>price</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="second-row">
                                <td><h6>Price</h6></td>
                                <td><p class="clear"><span class="text-paras">185€-link</span></p></td>
                                <td><p class="clear"><span class="text-paras">185€-link</span></p></td>
                                <td><p class="clear"><span class="text-paras">185€-link</span></p></td>
                            </tr>
                            <tr class="top-pad">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="product_red">
                                <td><span>product specification</span></td>
                                <td></td>
                                <td></td>
                                <td><a href="#demo-1" data-toggle="collapse" class="down-caret"><i class="fa fa-caret-down" aria-hidden="true"></i></a></td>
                            </tr>
                            <tr class="second-row collapse in" aria-expanded="false" id="demo-1">
                                <td colspan="4" class="no-padding">
                                    <?php for ($a = 1; $a <= 10; $a++) { ?>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Waranty Terms Parts</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5>Not Available</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5> Not Available</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5> Not Available</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr class="top-pad">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="product_red">
                                <td><span>product specification</span></td>
                                <td></td>
                                <td></td>
                                <td><a href="#demo-2" data-toggle="collapse" class="down-caret"><i class="fa fa-caret-down" aria-hidden="true"></i></a></td>
                            </tr>
                            <tr class="second-row collapse" aria-expanded="false" id="demo-2">
                                <td colspan="4" class="no-padding">
                                    <?php for ($a = 1; $a <= 10; $a++) { ?>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Waranty Terms Parts</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5>Not Available</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5> Not Available</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5> Not Available</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr class="top-pad">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="product_red">
                                <td><span>product specification</span></td>
                                <td></td>
                                <td></td>
                                <td><a href="#demo-3" data-toggle="collapse" class="down-caret"><i class="fa fa-caret-down" aria-hidden="true"></i></a></td>
                            </tr>
                            <tr class="second-row collapse" aria-expanded="false" id="demo-3">
                                <td colspan="4" class="no-padding">
                                    <?php for ($a = 1; $a <= 10; $a++) { ?>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Waranty Terms Parts</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5>Not Available</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5> Not Available</h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="inner_text">
                                                    <h5> Not Available</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    </div><!--./Container
</div>
    <?php
    get_sidebar();
    get_footer();
    