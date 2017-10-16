<?php
/* Template Name: game video */
get_header();
global $post;
?>
<div class="container-fluid r-m-p">
    <div id="owl-demo-3" class="owl-carousel owl-theme">
        <div class="item">
            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/banner-top.png" alt="The Last of us">
        </div>
        <div class="item">
            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/banner-top.png" alt="The Last of us">
        </div>
        <div class="item">
            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/banner-top.png" alt="The Last of us">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-5 col-center">
                <div class="search search-bar">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_flds" id="search_flds" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default search_btn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <div class="video-pge-left-side">
                    <div class="col-xs-12">
                        <div>
                            <div class="list-group panel">
                                <a class="list-group-item list-group-item strong text-center type-box" data-toggle="collapse"> Type <i class="fa fa-caret-down"></i></a>
                                <?php echo do_shortcode('[show-side-bar-video-filter]'); ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="add_sens_box">
                            <a href="#">
                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/Gamers_Video-PAge.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="add_sens_box">
                            <a href="#">
                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/ad_red.png"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--./Left Side Here-->
            <div class="col-xs-8">
                <div class="video-main">
                    <div class="row">
                        <div class="show_cats_vido clear">
                        <?php 
                        echo do_shortcode('[gammer-videos]');
                        
                        ?>
                        </div>
                        <img src="<?php echo site_url(); ?>/ajax-loader.gif" class="loader_ajax" style="display:none;">
                    </div>
                </div<!--./Video Main Here-->
            </div><!--./video Right Side Here-->
        </div>
    </div>
</div>
<?php
get_footer();
