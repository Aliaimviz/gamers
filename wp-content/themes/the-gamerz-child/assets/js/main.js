$(document).ready(function () {
	 
	 // for sidebar on responsive
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

		// for show sub items on sidebar menu in responsive
		$(".sidebar-menu .menu-item-has-children").hover(function() {
			$(this).children('.sub-menu').slideDown();
		}, function() {
			$(this).children('.sub-menu').slideUp();
		});

		// hide title on iframe when playing video
		$('.youtube-tabs iframe').iframeTracker({
			blurCallback: function(){
			  	$('.iframe-overlay').hide();
			}
		});

		// placeholder in subscribe box
		$("#es_txt_name").attr('placeholder', 'Name');
		$("#es_txt_email").attr('placeholder', 'Email');

		


		// scrol to div
		var e=window.location.hash;
		e && $('.side-content ul li a[href="'+e+'"]').tab("show");

		$(".side-content ul li a").click(function(e) {
			e.preventDefault();

			var divId = $(this).attr('href');

		    $('html, body').animate({
		        scrollTop: $(divId).offset().top
		    }, 500);


		});



		// for fixed sidebar 
		// var bannerHeight = $('.magazine-single-banner').outerHeight(true);
		// var headerHeight = $('header').outerHeight(true); // true value, adds margins to the total height
		// var totalTopHeight = bannerHeight + headerHeight;
		// console.log(totalTopHeight);

		// var footerHeight = $('footer').innerHeight();
		
		// $('.right-sidebar-gadget').affix({
		    
		//     offset: {
		//         top: function() { return totalTopHeight; },
		//         bottom: function() { return footerHeight; }
		//     }

		// }).on('affix.bs.affix', function () { // before affix

		//     $(this).css({
		//         'top': 20,   // for fixed height
		//         'width': $(this).outerWidth()  // variable widths
		//     });
		//     $('.for-affix').show();

		//     console.log('affix.bs.affix');

		// }).on('affix-top.bs.affix', function(){
		    
		//     $('.for-affix').hide();
		//     $(this).css('top', 'auto');
		    
		//     console.log('affix-top.bs.affix');

	 //    }).on('affix-bottom.bs.affix', function () { // before affix-bottom

		//     $('.for-affix').hide();
		//     $(this).css('bottom', 'auto'); // THIS is what makes the jumping 
		//     console.log('affix-bottom.bs.affix');

		// });



		// function sticky_relocate() {
		//     var window_top = $(window).scrollTop();
		//     var footer_top = $("footer").offset().top;
		//     var div_top = $('#sticky-anchor').offset().top;
		//     var div_height = $(".right-sidebar-gadget").height();

		//     var padding = 20;


		//     if (window_top + div_height > footer_top) {

		//     	$('.for-affix').hide();
		//         $('.right-sidebar-gadget').removeClass('fixed');
		//     }

		//     else if (window_top > div_top) {
		    	
		//     	$('.for-affix').show();
		//         $('.right-sidebar-gadget').addClass('fixed');
		    
		//     } else {
		    	
		//     	$('.for-affix').hide();
		//         $('.right-sidebar-gadget').removeClass('fixed');
		    
		//     }
		// }

	

		// function sticky_relocate() {
		//     var window_top = $(window).scrollTop();
		//     var footer_top = $("footer").offset().top;
		//     var div_top = $('#sticky-anchor').offset().top;
		//     var div_height = $(".right-sidebar-gadget").height();
		    
		//     var padding = 20;  // tweak here or get from margins etc
		    
		//     if (window_top + div_height > footer_top - padding)
		//         $('.right-sidebar-gadget').css({top: (window_top + div_height - footer_top + padding) * -1})
		//     else if (window_top > div_top) {
		    	
		//     	$('.for-affix').show();
		//         $('.right-sidebar-gadget').addClass('fixed');
		//         $('.right-sidebar-gadget').css({top: 0})
		//     } else {
		//     	$('.for-affix').hide();
		//         $('.right-sidebar-gadget').removeClass('fixed');
		//     }
		// }

		// $(function () {
		//     $(window).scroll(sticky_relocate);
		//     sticky_relocate();
		// });






	});


// for carousel 
$(document).ready(function() { 
    $('#myCarousel').carousel({
            interval: 5000
    });

    $('#carousel-text').html($('#slide-content-0').html());

    //Handles the carousel thumbnails
   $('[id^=carousel-selector-]').click( function(){
        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
        var id = parseInt(id);
        $('#myCarousel').carousel(id);
    });


    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function (e) {
             var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-'+id).html());
    });
});
