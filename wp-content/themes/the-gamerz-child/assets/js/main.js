jQuery(document).ready(function ($) {
    $("area[rel^='prettyPhoto']").prettyPhoto();


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
    $("#table-slider").owlCarousel({
        navigation: true,
        items: 1,
        slideSpeed: 300,
        paginationSpeed: 400
    });

    $("#game-slider").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

    });


    var fixOwl = function () {
        var $stage = $('.owl-stage'),
                stageW = $stage.width(),
                $el = $('.owl-item'),
                elW = 0;
        $el.each(function () {
            elW += $(this).width() + +($(this).css("margin-right").slice(0, -2))
        });
        if (elW > stageW) {
            $stage.width(elW);
        }
        ;
    }


    $('#smt_btn').on('click', function (e) {
        e.preventDefault();
        if ($("#register_user").validationEngine('validate')) {
            var user_name = $('input[name="u_name"]').val();
            var user_email = $('input[name="u_email"]').val();
            var pass = $('input[name="u_pass"]').val();
            var retype_pass = $('input[name="re_pass"]').val();
            if (pass === retype_pass) {
            } else {
                $('input[name="re_pass"]').attr("data-errormessage-value-missing", "Retype password is not match!");
                var re_not_mach = $('input[name="re_pass"]').attr("data-errormessage-value-missing");
                alert(re_not_mach);
            }
            $.ajax({
                type: 'POST',
                url: configs.ajaxurl,
                data: {
                    action: 'register_user',
                    user_name: user_name,
                    user_email: user_email,
                    pass: pass
                },
                success: function () {
                    $('#myModal').modal('toggle');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
            });

        }

    });




    $('#user-review').on('click', function (e) {
        e.preventDefault();
        var Post_ID = $('input[name="post_ID"]').val();
        var User_ID = $('input[name="User_ID"]').val();
        var Msg = $('textarea[name="msg"]').val();
        var value_of_star = $('input[name="star_value"]').val();
        var data_error = $('input[name="star_value"]').attr('data-error');
        if (Msg == "") {
            alert('Requid Comment Field');
        } else if (value_of_star <= 0) {
            alert(data_error);
        } else {
            $.ajax({
                type: 'POST',
                url: configs.ajaxurl,
                data: {
                    action: 'user_review',
                    Post_ID: Post_ID,
                    user_ID: User_ID,
                    msg: Msg,
                    value_of_star: value_of_star
                },
                success: function () {
                    $('#user-review').css({'background-color': '#1abb2e', 'color': '#fffdfd'});
                    alert('Review has been send');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
            });
        }

    });

    /*  Star jquery code*/
    // Starrr plugin (https://github.com/dobtco/starrr)
    var __slice = [].slice;

    (function ($, window) {
        var Starrr;

        Starrr = (function () {
            Starrr.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function (e, value) {}
            };

            function Starrr($el, options) {
                var i, _, _ref,
                        _this = this;

                this.options = $.extend({}, this.defaults, options);
                this.$el = $el;
                _ref = this.defaults;
                for (i in _ref) {
                    _ = _ref[i];
                    if (this.$el.data(i) != null) {
                        this.options[i] = this.$el.data(i);
                    }
                }
                this.createStars();
                this.syncRating();
                this.$el.on('mouseover.starrr', 'i', function (e) {
                    return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
                });
                this.$el.on('mouseout.starrr', function () {
                    return _this.syncRating();
                });
                this.$el.on('click.starrr', 'i', function (e) {
                    return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
                });
                this.$el.on('starrr:change', this.options.change);
            }

            Starrr.prototype.createStars = function () {
                var _i, _ref, _results;

                _results = [];
                for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                    _results.push(this.$el.append("<i class='fa fa-star-o' aria-hidden='true'></i>"));
                }
                return _results;
            };

            Starrr.prototype.setRating = function (rating) {
                if (this.options.rating === rating) {
                    rating = void 0;
                }
                this.options.rating = rating;
                this.syncRating();
                return this.$el.trigger('starrr:change', rating);
            };

            Starrr.prototype.syncRating = function (rating) {
                var i, _i, _j, _ref;

                rating || (rating = this.options.rating);
                if (rating) {
                    for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                        this.$el.find('i').eq(i).removeClass('fa-star-o').addClass('fa-star');
                    }
                }
                if (rating && rating < 5) {
                    for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                        this.$el.find('i').eq(i).removeClass('fa-star').addClass('fa-star-o');
                    }
                }
                if (!rating) {
                    return this.$el.find('i').removeClass('fa-star').addClass('fa-star-o');
                }
            };

            return Starrr;

        })();
        return $.fn.extend({
            starrr: function () {
                var args, option;

                option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function () {
                    var data;

                    data = $(this).data('star-rating');
                    if (!data) {
                        $(this).data('star-rating', (data = new Starrr($(this), option)));
                    }
                    if (typeof option === 'string') {
                        return data[option].apply(data, args);
                    }
                });
            }
        });
    })(window.jQuery, window);

    $(function () {
        return $(".starrr").starrr();
    });
    $(document).ready(function () {

        $('#stars').on('starrr:change', function (e, value) {
            $('#count').val(value);
        });

        $('#stars-existing').on('starrr:change', function (e, value) {
            $('#count-existing').html(value);
        });
    });


    $('#tog_one,#tog_two,#tog_three').on('click', function () {
        var Attr = $(this).attr('data-expand');
        var Data = $(this).attr('data-target');
        console.log(Attr);
        if (Attr == 'false') {
            $('.' + Data).addClass('in');
            $(this).attr('data-expand', 'true');
        } else {
            $('.' + Data).removeClass('in');
            $(this).attr('data-expand', 'false');
        }
    });
    $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 3000, autoplay_slideshow: true});
    $(".video a[rel^='prettyvideo']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 3000, autoplay_slideshow: true});
    $('#spci').on('click', function () {
        $('#spec_active a').trigger('click');
    });
});
