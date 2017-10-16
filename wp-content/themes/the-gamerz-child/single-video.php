<?php
get_header();
global $post;
?>
<script type="text/javascript">
    window.location="<?php echo site_url(); ?>/game-video/";
</script>
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
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
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
                                <a href="#demo1" class="list-group-item list-group-item-success strong type-inner" data-toggle="collapse" data-parent="#MainMenu">cable length <i class="fa fa-caret-down"></i></a>
                                <div class="collapse list-group-submenu" id="demo1">
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-2m <span>[50]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-4m <span>[50]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-6m <span>[90]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-6m <span>[880]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 2-10m <span>[60]</span></a>
                                </div> 
                                <a href="#demo2" class="list-group-item list-group-item-success strong type-inner" data-toggle="collapse" data-parent="#MainMenu">Dpi <i class="fa fa-caret-down"></i></a>
                                <div class="collapse list-group-submenu" id="demo2">
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-2m <span>[50]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-4m <span>[50]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-6m <span>[90]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 1-6m <span>[880]</span></a>
                                    <a href="#" class="list-group-item"><input type="checkbox"> 2-10m <span>[60]</span></a>
                                </div> 

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
                        <?php for ($a = 0; $a <= 11; $a++) { ?>
                            <div class="col-xs-3">
                                <div class="video-box">
                                    <iframe width="100%" height="150" src="https://www.youtube.com/embed/r8kE7rSzfQs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    <h2>this is video title</h2>
                                    <div class="video-description">
                                        <h6>doh bros</h6>
                                        <h6>32 min visul</h6>
                                        <h6>1 anno fa</h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div<!--./Video Main Here-->
            </div><!--./video Right Side Here-->
        </div>
    </div>
</div>
<?php
get_footer();
