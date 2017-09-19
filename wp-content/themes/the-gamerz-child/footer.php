<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Gamerz
 */

?>

	</div><!-- #content -->

	<footer>
			<div class="footer-ads-area clearfix">
					<div class="widget-first-image">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 paragraph-area">
							<?php dynamic_sidebar( 'Footer widget 1' ); ?>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 buying-guides">
						<?php dynamic_sidebar( 'Footer widget 2' ); ?>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 head-phones">
						<?php dynamic_sidebar( 'Footer widget 3' ); ?>
					</div>
			</div>
			<div style="clear: both;"></div>
			<div class="container">
				<div class="footer-widgets widget-heading clearfix">
					<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'Footer widget 4' ); ?>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'Footer widget 5' ); ?>
					</div>
					<div style="clear: both;" class="on-xs"></div>
					<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'Footer widget 6' ); ?>
						<?php dynamic_sidebar( 'Footer Social Media' ); ?>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
						<?php dynamic_sidebar( 'Footer widget 7' ); ?>
					</div>
				</div>
			</div>
			<div class="copyright">
				<?php dynamic_sidebar( 'Footer widget 8' ); ?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
	<script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery-1.12.4.min.js"></script>
 	<script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/libraries/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery.iframetracker.js"></script>
	<script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>
