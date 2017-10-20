<?php
/**
 * Template Name:login
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
    <a href="#">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/register-login.png" width="100%"/>
    </a>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-5">
                <div class="form-heading">
                    <h2>Create new Account</h2>
                </div>
                <div class="registration-form">
                    <form id="register_user" method="post">
                        <div class="form-group">
                            <label>User Name<span>*</span></label>
                            <input type="text" class="form-control validate[required]" data-errormessage-value-missing="User Name is required!"  id="user_name" name="u_name">
                        </div>
                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="email" class="form-control validate[required]" data-errormessage-value-missing="Email is required!" id="user_email" name="u_email">
                        </div>
                        <div class="form-group">
                            <label>Password<span>*</span></label>
                            <input type="password" class="form-control validate[required]" data-errormessage-value-missing="Password is required!" id="user_pass" name="u_pass">
                        </div>
                        <div class="form-group">
                            <label>Retype password<span>*</span></label>
                            <input type="password" class="form-control validate[required]" data-errormessage-value-missing="Retype password is required!" id="retype_pass" name="re_pass">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" id="smt_btn">Signup</button>
                            <span class="have_an_account"><a href="#">Already have an account?</a></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-5">
                <div class="form-heading">
                    <h2>Login</h2>
                </div>
                <div class="login_form">
                    <form name="loginform" id="loginform" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post">
                        <div class="form-group">
                            <label>Email address <span>*</span></label>
                            <input type="text" name="log" id="user_login" aria-describedby="login_error" class="input form-control" value="" size="20">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password <span>*</span></label>
                            <input type="password" name="pwd" id="user_pass" aria-describedby="login_error" class="input form-control" value="" size="20">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large btn btn-primary new-btn" value="Login">
                            <span class="have_an_account"><a href="#">Forgot Your Password?</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--.register-login form end-->
        <div class="row">
            <div class="col-xs-12">
                <div class="user-login-area clear-fix">
                    <div class="user-img-left">
                        <img src="http://site.startupbug.net:6999/thegamers/wp-content/uploads/2017/10/user-img.png" width="100%">
                    </div>
                    <div class="user-content">
                        <h4><span>You are currently signed in as</span> <span class="user-name"><a href="">John Smith,</a></span> <span class="user-sign"><a href="#">sign out</a></span> <span>or continue below and start submission.</span> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_sidebar();
get_footer();
