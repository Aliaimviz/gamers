<?php
/**
 * Template Name:User Admin Review
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

$Post_ID = $_GET['post_ID'];
$User_ID = get_current_user_id();
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-12 col-xs-12 col-xs-12">
                <div class="write-a-review">
                    <h2><i class="fa fa-comments" aria-hidden="true"></i> Write A Review</h2>
                    <h6><span>Tap a star to rate </span>
                        <span class="stare-likes">
                            <i class="fa fa-star-o" aria-hidden="true"></i> 
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="media review-form">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/user-img.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <form class="form" id="review_form" method="post">
                            <input type="hidden" name="post_ID" value="<?php echo $Post_ID; ?>">
                            <input type="hidden" name="User_ID" value="<?php echo $User_ID; ?>">
                            <div class="form-group">
                                <textarea class="form-control" rows="10" name="msg"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="user-review" class="btn btn-default">Sumbit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="critic_reviews">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">critic reviews</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="reviews_box">
                                        <ul id="buying-guide-side">
                                            <?php for ($a = 1; $a < 4; $a++) { ?>
                                                <li>
                                                    <div>
                                                        <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                        <div>
                                                            <h3 class="name-title">john smith</h3>
                                                            <span>9.5/10.0 (ps4)</span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                                                    </p>
                                                    <a href="#" class="btn brn-default">ReaD FULL REVIEWS</a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="reviews_box">
                                        <ul id="buying-guide-side" class="border-right">
                                            <?php for ($a = 1; $a < 4; $a++) { ?>
                                                <li>
                                                    <div>
                                                        <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                        <div>
                                                            <h3 class="name-title">john smith</h3>
                                                            <span>9.5/10.0 (ps4)</span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                                                    </p>
                                                    <a href="#" class="btn brn-default">ReaD FULL REVIEWS</a>
                                                </li>
                                            <?php } ?>
                                        </ul>
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
                <div class="user_review">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">user reviews</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="user_reviews_box">
                                        <ul id="buying-guide-side">
                                            <?php for ($a = 1; $a < 4; $a++) { ?>
                                                <li>
                                                    <div>
                                                        <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                        <div>
                                                            <h3 class="name-title">john smith</h3>
                                                            <span>9.5/10.0 (ps4)
                                                                &nbsp; <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                                                    </p>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="user_reviews_box">
                                        <ul id="buying-guide-side" class="border-right">
                                            <?php for ($a = 1; $a < 4; $a++) { ?>
                                                <li>
                                                    <div>
                                                        <span><img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/09/author.png"></span>
                                                        <div>
                                                            <h3 class="name-title">john smith</h3>
                                                            <span>9.5/10.0 (ps4) 
                                                                &nbsp; <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                                                    </p>
                                                </li>
                                            <?php } ?>
                                        </ul>
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
</div>
<div class="container-fluid">
    <div class="row">
        <a href="#">
            <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/add-sens-img.png" width="100%"/>
        </a>
    </div> 
</div>

<?php
get_sidebar();
get_footer();
