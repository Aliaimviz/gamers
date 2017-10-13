jQuery(document).ready(function ($) {

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

    /*$('.product_red td a').on('click', function () {
     var ID = $(this).attr('aria-expanded');
     if (ID == 'true') {
     alert('hello');
     var cls = $(this).parent().attr('class');
     console.log(cls);
     $('.table tbody tr.product_red td').css({'background-color': 'c32a30'});
     }
     });*/
    jQuery(document).on("click", ".product_red td a", function () {
        var attrs_get = jQuery(this).attr("aria-expanded");
        if (attrs_get == "true") {
            //alert("work");
            var ID = jQuery(this).parent().parent().attr("class");
            console.log(ID);
        }
    });
});


jQuery(document).ready(function ($) {


    // for show sub items on sidebar menu in responsive
    $(".sidebar-menu .menu-item-has-children").hover(function () {
        $(this).children('.sub-menu').slideDown();
    }, function () {
        $(this).children('.sub-menu').slideUp();
    });

    // hide title on iframe when playing video
    $('.youtube-tabs iframe').iframeTracker({
        blurCallback: function () {
            $('.iframe-overlay').hide();
        }
    });

    // placeholder in subscribe box
    $("#es_txt_name").attr('placeholder', 'Name');
    $("#es_txt_email").attr('placeholder', 'Email');



    // for fixed sidebar 
    // var bannerHeight = $('.magazine-single-banner').outerHeight(true);
    // var headerHeight = $('header').outerHeight(true); // true value, adds margins to the total height
    // var totalTopHeight = bannerHeight + headerHeight;
    // var footerHeight = $('footer').outerHeight();

    // if ($(window).width() > 991) {
    // 	$('.right-sidebar-gadget').affix({
    // 	    offset: {
    // 	        top: totalTopHeight,
    // 	        bottom: footerHeight
    // 	    }

    // 	}).on('affix.bs.affix', function () { // before affix

    // 	    $(this).css({
    // 	        'top': 20
    // 	    });

    // 	    $('.for-affix').show();

    // 	    $(this).css({
    // 	        'width': $(this).innerWidth() // variable widths
    // 	    });

    // 	    console.log('affix.bs.affix');


    // 	}).on('affix-top.bs.affix', function(){

    // 	    $('.for-affix').hide();
    // 	    $(this).css('top', 'auto');

    // 	    console.log('affix-top.bs.affix');

    // 	   }).on('affix-bottom.bs.affix', function () { // before affix-bottom

    // 	   	console.log('affix-bottom.bs.affix');

    // 	    $('.for-affix').hide();
    // 	    $(this).css('bottom', 'auto'); // THIS is what makes the jumping 

    // 	});
    // }

});


// for carousel 
jQuery(document).ready(function ($) {

    $('#myCarousel').carousel({
        interval: 5000
    });

    $('#carousel-text').html($('#slide-content-0').html());

    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click(function () {
        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
        var id = parseInt(id);
        $('#myCarousel').carousel(id);
    });

    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function (e) {
        var id = $('.item.active').data('slide-number');
        $('#carousel-text').html($('#slide-content-' + id).html());
    });



    $('.side_menu').css('display', 'none');

    $('li.side_menu').each(function (index, el) {
        $(el).appendTo('ul#navigation-ul');
    });



    // scrol to div	
    $(".single-side-content ul li a").click(function (e) {
        e.preventDefault();

        var divId = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(divId).offset().top
        }, 500);
    });


});
jQuery(document).ready(function ($) {
    $('input#author').attr('placeholder', 'User');
    $('input#email').attr('placeholder', 'Email');
    $('textarea#comment').attr('placeholder', 'Enter Your Comment Here');
    $('p.comment-notes').html('<i class="fa fa-comments" aria-hidden="true"></i><span class="com-tit">Comments</span>');
});

jQuery(document).ready(function ($) {
    $("#owl-demo").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: false,
        navigationText: ['<i class="fa fa-2x fa-arrow-circle-o-left" aria-hidden="true"></i>', '<i class="fa fa-2x fa-arrow-circle-o-right" aria-hidden="true"></i>']


    });
    $("#owl-video").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: false,
        navigationText: ['<i class="fa fa-2x fa-arrow-circle-o-left" aria-hidden="true"></i>', '<i class="fa fa-2x fa-arrow-circle-o-right" aria-hidden="true"></i>']
    });
    $("#owl-demo-3").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

});


