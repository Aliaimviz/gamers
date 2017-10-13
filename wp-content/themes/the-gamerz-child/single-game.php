<?php
get_header();
global $post;
?>
<div id="primary buying" class="content-area">
    <main id="main" class="site-main">
        <div class="magazine-single-page buying-guides-page">
            <?php
            if (have_posts()) {
                while (have_posts()):the_post();
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    ?> 
                    <div class="magazine-guides-banner" style='background:url("<?php echo $featured_image[0]; ?>");'>
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <?php
                endwhile;
            }
            ?>
            <div id="sticky-anchor"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-12 pad-r19-l17 content-single-magazine" style="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-xs-12">
                                            <div id="owl-demo" class="owl-carousel owl-theme">
                                                <?php
                                                if (have_rows('images')):
                                                    while (have_rows('images')): the_row();
                                                        $image_1 = get_sub_field('images_1');
                                                        $image_2 = get_sub_field('images_2');
                                                        $image_3 = get_sub_field('images_3');
                                                        $image_4 = get_sub_field('images_4');
                                                        $image_5 = get_sub_field('images_5');
                                                        ?>
                                                        <div class="item"><img src="<?php echo $image_1['url']; ?>" alt="The Last of us"></div>
                                                        <div class="item"><img src="<?php echo $image_2['url']; ?>" alt="The Last of us"></div>
                                                        <div class="item"><img src="<?php echo $image_3['url']; ?>" alt="The Last of us"></div>
                                                        <div class="item"><img src="<?php echo $image_4['url']; ?>" alt="The Last of us"></div>
                                                        <div class="item"><img src="<?php echo $image_5['url']; ?>" alt="The Last of us"></div>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div id="owl-video" class="owl-carousel owl-theme">
                                                <?php
                                                $video = get_post_meta($post->ID, 'video', true);
                                                ?>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="item">
                                                    <iframe width="100%" height="214" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 btns-groups">
                                            <div class="col-xs-6">
                                                <a href="#" class="simple-content-readmore glr">Images Gallery <i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="#" class="simple-content-readmore glr btn-blk">Video Gallery <i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 game-para">
                                        <div class="row">
                                            <div class = "col-md-3 col-xs-6">
                                                <h2 class = "title-game"> Piattafarma </h2>
                                                <p>
                                                    <?php
                                                    $piattaforma = get_post_meta($post->ID, 'status', true);
                                                    foreach ($piattaforma as $platform) {
                                                        ?>
                                                        <?php echo $platform . '</br>'; ?>
                                                        <?php
                                                    }
                                                    ?>  
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <h2 class="title-game"> Produttore </h2>
                                                <p>
                                                    <?php
                                                    $piattaforma = get_post_meta($post->ID, 'status', true);
                                                    foreach ($piattaforma as $platform) {
                                                        ?>
                                                        <?php echo $platform . '</br>'; ?>
                                                        <?php
                                                    }
                                                    ?> 
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <h2 class="title-game"> GENRE </h2>
                                                <?php
                                                $generes = get_post_meta($post->ID, 'genere', true);
                                                $a = 0;
                                                foreach ($generes as $key => $genere) {
                                                    ?>
                                                    <?php
                                                    $a;
                                                    if ($a == 5) {
                                                        break;
                                                    } else {
                                                        echo $genere . "</br>";
                                                    }
                                                    $a++;
                                                    ?>
                                                    <?php
                                                }
                                                ?> 

                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <h2 class="title-game"> SPEEDIZONE </h2>
                                                <?php
                                                $generes = get_post_meta($post->ID, 'genere', true);
                                                $a = 0;
                                                foreach ($generes as $key => $genere) {
                                                    ?>
                                                    <?php
                                                    $a;
                                                    if ($a == 5) {
                                                        break;
                                                    } else {
                                                        echo $genere . "</br>";
                                                    }
                                                    $a++;
                                                    ?>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="top-bottum-border">
                                                <?php
                                                if (have_rows('buy_it_here')):
                                                    while (have_rows('buy_it_here')) : the_row();
                                                        ?>
                                                        <div class="col-md-3 col-xs-6">
                                                            <img src="<?php echo get_sub_field('images_logo'); ?>" alt="">
                                                        </div>
                                                        <?php
                                                    endwhile;
                                                else :
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row tag-padding">
                                                <div class="col-md-6">
                                                    <?php
                                                    $status = get_post_meta($post->ID, 'status', true);
                                                    ?>
                                                    <h6 class="title-game">Status</h6>
                                                    <?php if (!empty($status[0])) { ?>
                                                        <p><?php echo $status[0] ?></p>
                                                        <?php
                                                    } else {
                                                        
                                                    }
                                                    ?>
                                                    <h6 class="title-game">plattaforma</h6>
                                                    <?php
                                                    if (!empty($status[1])) {
                                                        ?>
                                                        <p><?php echo $status[1]; ?></p>
                                                        <?php
                                                    } else {
                                                        
                                                    }

                                                    if (!empty($status[2])) {
                                                        ?>
                                                        <p><?php echo $status[2]; ?> </p>
                                                        <?php
                                                    } else {
                                                        
                                                    }
                                                    ?>


                                                    <h6 class="title-game">SYSTEMA DI PAGAMENTO</h6>
                                                    <?php
                                                    if (!empty($status[3])) {
                                                        ?>
                                                        <p><?php echo $status[3]; ?> </p>
                                                        <?php
                                                    } else {
                                                        
                                                    }
                                                    if (!empty($status[4])) {
                                                        ?>
                                                        <p><?php echo $status[4]; ?> </p>
                                                        <?php
                                                    } else {
                                                        
                                                    }
                                                    ?>

                                                </div>
                                                <div class="col-md-6">
                                                    <?php ?>
                                                    <h6 class="title-game">DATA DI USCITA</h6>
                                                    <p>or TBA (To Be Announced)</p>
                                                    <h6 class="title-game">MULTIPLAYER</h6>
                                                    <p>PC</p>
                                                    <p>MAC</p>
                                                    <p>PS4</p>
                                                    <p>XBOX ONE</p>
                                                    <h6 class="title-game">AMBIENTAZIONE</h6>
                                                    <p>GUERRA</p>
                                                    <p>FANTASY</p>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 50px;">
                                                <div class="col-md-12">
                                                    <div style="text-align: center;margin-top: 10px;">
                                                        <a href="#" class="simple-content-readmore black-bg nf">
                                                            View all the specs
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="title-game bottom-border">editors Don't like</h4>
                                                    <div class="text-icons">
                                                        <p>
                                                            <i class="fa fa-minus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_didnt_like', true); ?>
                                                        </p>
                                                        <p><i class="fa fa-minus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_didnt_like_1', true); ?>
                                                        </p>
                                                        <p>
                                                            <i class="fa fa-minus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_didnt_like_2', true); ?>
                                                        </p>
                                                        <p>
                                                            <i class="fa fa-minus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_didnt_like_3', true); ?>
                                                        </p>
                                                        <p>
                                                            <i class="fa fa-minus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_didnt_like_4', true); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="title-game bottom-border">editors like</h4>
                                                    <div class="text-icons">
                                                        <p><i class="fa fa-plus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_liked', true); ?>
                                                        </p>
                                                        <p><i class="fa fa-plus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'landrush_quickly', true); ?>
                                                        </p>
                                                        <p><i class="fa fa-plus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_liked_2', true); ?>
                                                        </p>
                                                        <p><i class="fa fa-plus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_liked3', true); ?>
                                                        </p>
                                                        <p><i class="fa fa-plus-square" aria-hidden="true"></i>
                                                            <?php echo get_post_meta($post->ID, 'editors_liked4', true); ?>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="simple-heading-para-content">
                                    <h1>Description</h1>
                                    <?php
                                    if (have_posts()) {
                                        while (have_posts()):the_post();
                                            ?>
                                            <p><?php the_content(); ?></p>
                                            <?php
                                        endwhile;
                                    }
                                    ?>
                                    <a href="#" class="simple-content-readmore wdt">Read More</a>
                                    <a href="#" class="simple-content-readmore wdt btn-blk">Visit Officiall Website</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="image-text-quote">
                                <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/banner.png" class="img-responsive center-block" style="width:100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tabination_all">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Summary</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Specs</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Critic Review</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">News</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Comments</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Communities</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <section id="custom_html-19" class="widget_text widget widgets widget_custom_html">
                                                <div class="textwidget custom-html-widget">
                                                    <h2>critic reviews</h2>
                                                    <ul id="buying-guide-side">
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </section>
                                            <a href="#" class="simple-content-readmore">View All The Critic Review</a>
                                        </div><!--./End First Colum-->
                                        <div class="col-xs-4">
                                            <section id="custom_html-19" class="widget_text widget widgets widget_custom_html">
                                                <div class="textwidget custom-html-widget black-colum">
                                                    <div class="two-third">
                                                        <h2>user reviews <span><a href="#">Write A Review</a></span></h2>
                                                    </div>
                                                    <ul id="buying-guide-side">
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                                <div>
                                                                    <h3 class="name-title">john smith</h3>
                                                                    <span>9.5/10.0 (ps4)</span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                lorem Ipsum is simply dummy text of the printing and typesetting...
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </section>
                                            <a href="#" class="simple-content-readmore btn-blk">View All User Reviews</a>
                                        </div><!--./End Second Colum-->
                                        <div class="col-xs-4">
                                            <section id="custom_html-19" class="widget_text widget widgets widget_custom_html">
                                                <div class="textwidget custom-html-widget black-colum">
                                                    <div class="two-third black-box">
                                                        <h2>help us to create our database submit a game</h2>
                                                    </div>
                                                    <div class="img-section">
                                                        <a href="#">
                                                            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/robort-img.png" class="img-responsive center-block" width="100%"/>
                                                        </a>
                                                    </div>
                                                    <div class="red-section clear">
                                                        <ul>
                                                            <li>
                                                                <span>Your</span>
                                                            </li>
                                                            <li>
                                                                <span>G2A Score</span>
                                                            </li>
                                                            <li>
                                                                <span>USers</span>
                                                            </li>
                                                        </ul>
                                                        <ul>
                                                            <li>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/rate.png"/></span>
                                                            </li>
                                                            <li>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/hexagon.png"/></span>
                                                            </li>
                                                            <li>
                                                                <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/hexgaon1.png"/></span>
                                                            </li>
                                                        </ul>
                                                        <h4>For Honor</h4>
                                                        <h5><i class="fa fa-gamepad" aria-hidden="true"></i> Action, hack and slash</h5>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-6">
                                                                <div class="pc-btn">
                                                                    <p>pc</p> <p>PS4</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <div class="date-releas">
                                                                    <h6>Relaeas Date:</h6>
                                                                    <h6>14 Feb 2017</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="text-red-section">
                                                                <p>
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="center-btn">
                                                                <a href="#" class="simple-content-readmore btn-blk">Find Lowest Price</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="widget start-widget"><a href="http://test.com"><img width="458" height="345" src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/Untitled-2-1.png" alt="" title="Untitled-2"></a></section>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">2</div>
                                <div role="tabpanel" class="tab-pane" id="messages">3</div>
                                <div role="tabpanel" class="tab-pane" id="settings">...</div>
                            </div>
                        </div><!--./End Tabs-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="looking-for-clan clear">
                            <h3>looking for clan?</h3>
                            <h4>checkout these communities</h4>
                            <div class="col-xs-10 col-center">
                                <ul class="btn-ul clear">
                                    <li>
                                        <div class="input-group margin-bottom-sm btn-groups-xee">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </span>
                                            <a href="#" class="btn btn-default btn-xee">Community 1</a>
                                        </div>
                                    </li> 
                                    <li>
                                        <div class="input-group margin-bottom-sm btn-groups-xee">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </span>
                                            <a href="#" class="btn btn-default btn-xee">Community 1</a>
                                        </div>
                                    </li> 
                                    <li>
                                        <div class="input-group margin-bottom-sm btn-groups-xee">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </span>
                                            <a href="#" class="btn btn-default btn-xee">Community 1</a>
                                        </div>
                                    </li> 
                                    <li>
                                        <div class="input-group margin-bottom-sm btn-groups-xee">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </span>
                                            <a href="#" class="btn btn-default btn-xee">Community 1</a>
                                        </div>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 comminucation-banner2"></div>
                        <div class="row comment">
                            <div class="col-md-1" style="float: left;margin-bottom: 15px;">
                                <img alt="" src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="40" width="40"></div>
                            <div class="col-md-10">
                                <div id="comment_form">
                                    <div><h4><i class="fa fa-comments" aria-hidden="true"></i>Comment</h4></div>
                                    <div>
                                        <textarea rows="10" name="comment" id="comment" class="textarea" placeholder="Enter Your Comment Here"></textarea>
                                    </div>
                                    <div>
                                        <input type="text" name="name" id="name" value="" class="textbox" placeholder="Name">
                                    </div>
                                    <div>
                                        <input type="email" name="email" id="email" value="" class="textbox" placeholder="Email">
                                    </div>
                                    <div class="comment-footer">
                                        <ul class="comments_ul">
                                            <li><img alt="" src="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=32&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/37c9fb2d6896e6dd97b1d46b08fd68ba?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32" style="border-radius: 15px;"></li>
                                            <li><i class="fa fa-user-o" aria-hidden="true"></i>JS</li>
                                            <li><i class="fa fa-user-o" aria-hidden="true"></i>Apri 13th, 2017 12:26
                                            </li>
                                        </ul>
                                        <p class="comment_para">Any1 played it ready? Is it worth buying?</p>
                                        <ul class="comments_rate_ul">
                                            <li>Rate this comment</li>
                                            <li>0 <i class="fa fa-thumbs-up" aria-hidden="true"></i></li>
                                            <li>0 <i class="fa fa-thumbs-down" aria-hidden="true"></i></li>
                                            <li><a href="#" class="comment-reply">Reply</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <section id="custom_html-20" class="widget_text widget widget_custom_html"><div class="textwidget custom-html-widget"><div class="similar-products">
                                    <h3>SIMILAR PRODUCTS</h3>
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
                </div>
                <!--End Zain css here-->
            </div>
        </div>
</div>
</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
