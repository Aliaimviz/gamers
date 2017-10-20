<?php
/**
 * Template Name:Game Upload
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="account-system">
                    <h2 class="float-left">Create new Account</h2>
                    <h3 class="float-left"><a href="#">Already have an account?</a></h3>
                    <div class="clear-fix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10">
                <div class="registration-form">
                    <form id="register_user" method="post">
                        <div class="form-group">
                            <label>User Name*</label>
                            <input type="text" class="form-control validate[required]" data-errormessage-value-missing="User Name is required!"  id="user_name" name="u_name">
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" class="form-control validate[required]" data-errormessage-value-missing="Email is required!" id="user_email" name="u_email">
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" class="form-control validate[required]" data-errormessage-value-missing="Password is required!" id="user_pass" name="u_pass">
                        </div>
                        <div class="form-group">
                            <label>Retype password*</label>
                            <input type="password" class="form-control validate[required]" data-errormessage-value-missing="Retype password is required!" id="retype_pass" name="re_pass">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" id="smt_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">successfully</h4>
            </div>
            <div class="modal-body">
                <p>User Has Been Register</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
get_sidebar();
get_footer();
