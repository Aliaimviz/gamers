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
        <div class="row">
            <div class="col-xs-4">

            </div><!--./End left side Game database-->
            <div class="col-xs-8">
                <div class="main-game-wrapper">
                    <div class="col-xs-3">
                        <span class="">
                            
                        </span>
                    </div>
                </div>
            </div><!--./End -->
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();
