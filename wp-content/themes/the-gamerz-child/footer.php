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


<?php /* <!-- 
<script>
if(!window.jQuery)
{
   var script = document.createElement('script');
   script.type = "text/javascript";
   script.src = "<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery-1.12.4.min.js";
   document.getElementsByTagName('footer')[0].appendChild(script);
}
</script> --> */ ?>

<script>
	if (typeof jQuery == 'undefined') {  
    	  
    	var jq = document.createElement('script'); jq.type = 'text/javascript';
		jq.src = "<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery-1.12.4.min.js";
		document.getElementsByTagName('footer')[0].appendChild(jq);

	}
</script>

 	<script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/libraries/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery.iframetracker.js"></script>
	<script src="<?= get_bloginfo( 'stylesheet_directory' ); ?>/assets/js/main.js"></script>
<script>


    jQuery(function($){ // document ready
        if ($('.right-sidebar-gadget').length) { // make sure "#sticky" element exists
            var el = $('.right-sidebar-gadget');
            var stickyTop = $('.right-sidebar-gadget').offset().top; // returns number
            var stickyHeight = $('.right-sidebar-gadget').height();

            $(window).scroll(function(){ // scroll event
                var limit = $('footer').offset().top - stickyHeight - 20;

                var windowTop = $(window).scrollTop(); // returns number

                if (stickyTop < windowTop){
                    el.css({ position: 'fixed', top: 0 });
                }
                else {
                    el.css('position','static');
                }

                if (limit < windowTop) {
                    var diff = limit - windowTop;
                    el.css({top: diff});
                }
            });
        }
    });

   /* function sticky_relocate() {
        var window_top = jQuery(window).scrollTop();
        var footer_top = jQuery(".footer-ads-area").offset().top;
        var div_top = jQuery('#sticky-anchor').offset().top;
        var div_height = jQuery(".right-sidebar-gadget").height();

        if (jQuery(window).scrollTop() + jQuery(window).height() > jQuery('.footer-ads-area').position().top){
            jQuery('.right-sidebar-gadget').removeClass('fixed');
        }
        else if (window_top > div_top) {
            jQuery('.right-sidebar-gadget').addClass('fixed');
        } else {
            jQuery('.right-sidebar-gadget').removeClass('fixed');
        }
    }

            jQuery(window).scroll(function () {

                sticky_relocate();

        });


*/





 jQuery('#itemslider').carousel({
    pause: true,
    interval: false
		
  });
  jQuery('.carousel-showmanymoveone .item').each(function(){
        var itemToClone = jQuery(this);

for (var i=1;i<4;i++) {
itemToClone = itemToClone.next();

if (!itemToClone.length) {
itemToClone = jQuery(this).siblings(':first');
}

itemToClone.children(':first-child').clone()
.addClass("cloneditem-"+(i))
.appendTo(jQuery(this));
}
});
		
</script>
<?php wp_footer(); ?>

</body>
</html>
