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


<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/libraries/bootstrap/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function () {
	  var trigger = $('.hamburger'),
	      overlay = $('.overlay'),
	     isClosed = false;

	    trigger.click(function () {
	      hamburger_cross();      
	    });

	    function hamburger_cross() {

	      if (isClosed == true) {          
	        overlay.hide();
	        trigger.removeClass('is-open');
	        trigger.addClass('is-closed');
	        isClosed = false;
	      } else {   
	        overlay.show();
	        trigger.removeClass('is-closed');
	        trigger.addClass('is-open');
	        isClosed = true;
	      }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
	        $('#wrapper').toggleClass('toggled');
	  });  
	});


	$(document).ready(function () {
		$(".sidebar-menu .menu-item-has-children").hover(function() {
			$(this).children('.sub-menu').slideDown();
		}, function() {
			$(this).children('.sub-menu').slideUp();
		});
	});


	function openCity(evt, cityName) {
	    // Declare all variables
	    var i, tabcontent, tablinks;

	    // Get all elements with class="tabcontent" and hide them
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    tablinks = document.getElementsByClassName("tablinks");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].className = tablinks[i].className.replace(" active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById(cityName).style.display = "block";
	    evt.currentTarget.className += " active";
	}


</script>

<?php wp_footer(); ?>

</body>
</html>
