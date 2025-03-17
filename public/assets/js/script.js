(function($) {

	"use strict";


	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}



	//Update Header Style and Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-to-top');

			var HeaderHight = $('.main-header').height();
			if (windowpos >= HeaderHight) {
				siteHeader.addClass('fixed-header');
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.fadeOut(300);
			}

		}
	}

	headerStyle();



	//Submenu Dropdown Toggle
	if($('.main-header li.dropdown ul').length){
		$('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa-solid fa-chevron-down fa-fw"></span></div>');

		//Dropdown Button
		$('.main-header li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});

		//Disable dropdown parent link
		$('.navigation li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});

		$('.xs-sidebar-group .close-button').on('click', function(e) {
			$('.xs-sidebar-group.info-group').removeClass('isActive');
		});

	}


	// Add Current Class Auto
	function dynamicCurrentMenuClass(selector) {
		let FileName = window.location.href.split("/").reverse()[0];

		selector.find("li").each(function () {
			let anchor = $(this).find("a");
			if ($(anchor).attr("href") == FileName) {
				$(this).addClass("current");
			}
		});
		// if any li has .current elmnt add class
		selector.children("li").each(function () {
			if ($(this).find(".current").length) {
				$(this).addClass("current");
			}
		});
		// if no file name return
		if ("" == FileName) {
			selector.find("li").eq(0).addClass("current");
		}
	}




	//Mobile Nav Hide Show
	if($('.mobile-menu').length){

		//$('.mobile-menu .menu-box').mCustomScrollbar();

		var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
		$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
		$('.sticky-header .main-menu').append(mobileMenuContent);

		//Hide / Show Submenu
		$('.mobile-menu .navigation > li.dropdown > .dropdown-btn').on('click', function(e) {
			e.preventDefault();
			var target = $(this).parent('li').children('ul');

			if ($(target).is(':visible')){
				$(this).parent('li').removeClass('open');
				$(target).slideUp(500);
				$(this).parents('.navigation').children('li.dropdown').removeClass('open');
				$(this).parents('.navigation').children('li.dropdown > ul').slideUp(500);
				return false;
			}else{
				$(this).parents('.navigation').children('li.dropdown').removeClass('open');
				$(this).parents('.navigation').children('li.dropdown').children('ul').slideUp(500);
				$(this).parent('li').toggleClass('open');
				$(this).parent('li').children('ul').slideToggle(500);
			}
		});

		//3rd Level Nav
		$('.mobile-menu .navigation > li.dropdown > ul  > li.dropdown > .dropdown-btn').on('click', function(e) {
			e.preventDefault();
			var targetInner = $(this).parent('li').children('ul');

			if ($(targetInner).is(':visible')){
				$(this).parent('li').removeClass('open');
				$(targetInner).slideUp(500);
				$(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
				$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
				return false;
			}else{
				$(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
				$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
				$(this).parent('li').toggleClass('open');
				$(this).parent('li').children('ul').slideToggle(500);
			}
		});

		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function() {
			$('body').addClass('mobile-menu-visible');

		});

		//Menu Toggle Btn
		$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
			$('body').removeClass('mobile-menu-visible');
			$('.mobile-menu .navigation > li').removeClass('open');
			$('.mobile-menu .navigation li ul').slideUp(0);
		});

		$(document).keydown(function(e){
	        if(e.keyCode == 27) {
				$('body').removeClass('mobile-menu-visible');
			$('.mobile-menu .navigation > li').removeClass('open');
			$('.mobile-menu .navigation li ul').slideUp(0);
        	}
	    });

	}




	//Parallax Scene for Icons
	if($('.parallax-scene-1').length){
		var scene = $('.parallax-scene-1').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-2').length){
		var scene = $('.parallax-scene-2').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-3').length){
		var scene = $('.parallax-scene-3').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-4').length){
		var scene = $('.parallax-scene-4').get(0);
		var parallaxInstance = new Parallax(scene);
	}



	if($('.paroller').length){
		$('.paroller').paroller({
			  factor: 0.2,            // multiplier for scrolling speed and offset, +- values for direction control
			  factorLg: 0.4,          // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control
			  type: 'foreground',     // background, foreground
			  direction: 'horizontal' // vertical, horizontal
		});
	}




	//Progress Bar
	if($('.progress-line').length){
		$('.progress-line').appear(function(){
			var el = $(this);
			var percent = el.data('width');
			$(el).css('width',percent+'%');
		},{accY: 0});
	}

	//Fact Counter + Text Count
	if($('.count-box').length){
		$('.count-box').appear(function(){

			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);

			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function() {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function() {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}

		},{accY: 0});
	}




	//Gallery Filters
	if($('.filter-list').length){
		$('.filter-list').mixItUp({});
	}




	// Single Item Carousel
	if ($('.single-item-carousel').length) {
		$('.single-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});
	}


	// Three Item Carousel
	if ($('.three-item-carousel').length) {
		$('.three-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}



	// Services Carousel
	if ($('.services-carousel').length) {
		$('.services-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:3
				},
				1200:{
					items:3
				}
			}
		});
	}


	// Four Item Carousel
	if ($('.four-item-carousel').length) {
		$('.four-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:3
				},
				1200:{
					items:4
				}
			}
		});
	}



	// Case Carousel
	if ($('.case-carousel').length) {
		$('.case-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:2
				},
				1200:{
					items:2
				}
			}
		});
	}




	// Case Carousel Two
	if ($('.case-carousel-two').length) {
		$('.case-carousel-two').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//center:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});
	}




	// News Carousel
	if ($('.news-carousel').length) {
		$('.news-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:2
				},
				1024:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}
	// News Carousel
	if ($('.team-carousel').length) {
		$('.team-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:false,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			// navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				360:{
					items:2
				},
				800:{
					items:3
				},
				1024:{
					items:4
				},
				1200:{
					items:4
				}
			}
		});
	}




	// Sponsors Carousel
	if ($('.sponsors-carousel').length) {
		$('.sponsors-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
			responsive:{
				0:{
					items:2
				},
				480:{
					items:3
				},
				600:{
					items:3
				},
				800:{
					items:5
				},
				1024:{
					items:5
				}
			}
		});
	}


	// Sponsors Carousel Two
	if ($('.sponsors-carousel-two').length) {
		$('.sponsors-carousel-two').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
			responsive:{
				0:{
					items:2
				},
				480:{
					items:3
				},
				600:{
					items:3
				},
				800:{
					items:4
				},
				1024:{
					items:4
				}
			}
		});
	}





	// Odometer
	if ($(".odometer").length) {
		$('.odometer').appear();
		$('.odometer').appear(function(){
			var odo = $(".odometer");
			odo.each(function() {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			});
			window.odometerOptions = {
				format: 'd',
			};
		});
	}



	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}



	//Header Search
	if($('.search-box-outer').length) {
		$('.search-box-outer').on('click', function() {
			$('body').addClass('search-active');
		});
		$('.close-search').on('click', function() {
			$('body').removeClass('search-active');
		});
	}



	// LightBox Image
	if($('.lightbox-image').length) {
		$('.lightbox-image').magnificPopup({
		  type: 'image',
		  gallery:{
		    enabled:true
		  }
		});
	}



	//LightBox Video
	if($('.lightbox-video').length) {
		$('.lightbox-video').magnificPopup({
	      // disableOn: 700,
	      type: 'iframe',
	      mainClass: 'mfp-fade',
	      removalDelay: 160,
	      preloader: false,
	      iframe:{
	        patterns:{
	          youtube:{
	          index: 'youtube.com',
	          id: 'v=',
	          src: 'https://www.youtube.com/embed/%id%'
	        },
	      },
	      srcAction:'iframe_src',
	    },
	      fixedContentPos: false
	    });
	}



	//Contact Form Validation
	/* if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				phone: {
					required: true
				},
				services: {
					required: true
				},
				email: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	} */



	// Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1500);

		});
	}



	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}



/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */

	$(window).on('scroll', function() {
		headerStyle();
	});

/* ==========================================================================
   When document is loading, do
   ========================================================================== */

	$(window).on('load', function() {
		handlePreloader();
	});

})(window.jQuery);

// Email Verification
function validateEmail() {
    let email       = $('#email').val();
    let name        = $('#name').val();
    let messageDiv  = $('#otp-sending-message');
    let otpInput    = $('#email_verification_box');
    let otpBtn      = $('#otp-email-sending-btn');
    let otpBtnText  = $('#otp-email-sending-btn-html');

    // Basic Email Validation using regular expression
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (emailRegex.test(email)) {
        // Email is valid, now send AJAX request to verify

        // Disable the button while sending OTP
        otpBtn.prop('disabled', true);
        otpBtnText.text("Sending OTP...");

        // Send AJAX request to backend to send OTP
        $.ajax({
            url: "/send-email-otp", // Laravel route for sending OTP
            type: "POST",
            data: { email: email, name: name },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function(response) {
                if (response.success) {
                    otpInput.val('');
                    otpInput.removeClass('d-none');
                    // verifyBtn.removeClass('d-none');

                    // Update button text to "OTP Sent" and keep it disabled
                    otpBtnText.text("OTP Sent");
                    otpBtn.prop('disabled', true);

                        setTimeout(function() {
                            if (otpBtnText.text()!='Verified')
                            {
                                // Update button text and enable it
                                otpBtnText.text("Resend OTP");
                                otpBtn.prop('disabled', false);
                            }
                        }, 30000); //30sec


                } else {
                    messageDiv.html(response.message).css("color", "red");
                    otpInput.addClass('d-none');
                    // verifyBtn.addClass('d-none');
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    if (errors && errors.email) {
                        messageDiv.html(errors.email[0]).css("color", "red");
                    }
                } else {
                    messageDiv.html("Error sending OTP. Please try again.").css("color", "red");
                }

                // Hide OTP fields in case of error
                otpInput.addClass('d-none');
                // verifyBtn.addClass('d-none');
            }
        });

    } else {
        // Invalid email format
        messageDiv.html("Please enter a valid email address.").css("color", "red");

        // Hide OTP input and verify button
        otpInput.addClass('d-none');
    }
}
function validateEmailOtp() {
    let enteredOtp      = $('#email-otp').val();
    let messageDiv      = $('#email_otp_error');
    let otpStatus       = $('#otp-sending-message');
    let verifyBtn       = $('#verifyBtn');
    let verifyBtnText   = $('#verifyBtnText');
    let otpInput        = $('#email_verification_box');
    let otpBtnText      = $('#otp-email-sending-btn-html');

    if (!enteredOtp) {
        messageDiv.html("Please enter the OTP").css("color", "red");
        return;
    }

    // Disable the button and show verifying state
    verifyBtn.prop('disabled', true);
    verifyBtnText.fadeOut(200, function() {
        $(this).text("Verifying...").fadeIn(200);
    });

    $.ajax({
        url: '/verify-email-otp', // Laravel route handling the OTP verification
        type: 'POST',
        data: {
            otp: enteredOtp
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                otpStatus.html(response.message).css("color", "green");

                // Optionally hide the OTP input (or disable it)
                otpBtnText.text("Verified");
                $('#email').prop('disabled', true);
                otpInput.addClass('d-none');
                otpInput.val('');
                setTimeout(function() {
                    otpStatus.html('').css("", "");
                    otpBtn.prop('disabled', false);

                }, 5000); //30sec
            } else {
                messageDiv.html(response.message).css("color", "red");

                // Re-enable the button for another try
                verifyBtn.prop('disabled', false);
                verifyBtnText.fadeOut(200, function() {
                    $(this).text("Confirm").fadeIn(200);
                });
            }
        },
        error: function(xhr, status, error) {
            messageDiv.html("Something went wrong. Please try again.").css("color", "red");

            // Re-enable the button on error
            verifyBtn.prop('disabled', false);
            verifyBtnText.fadeOut(200, function() {
                $(this).text("Confirm").fadeIn(200);
            });
        }
    });
}
// Mobile Verification
function validateMobileNumber() {
    let phone       = $('#phone').val();
    let name        = $('#name').val();
    let messageDiv  = $('#phone-otp-sending-message');
    let otpInput    = $('#phone_verification_box');
    let otpBtn      = $('#otp-phone-sending-btn');
    let otpBtnText  = $('#otp-phone-sending-btn-html');

    // Basic phone Validation using regular expression
    let phoneRegex = /^(?:\+88|88)?01[3-9]\d{8}$/;

    if (phoneRegex.test(phone)) {
        // phone is valid, now send AJAX request to verify

        // Disable the button while sending OTP
        otpBtn.prop('disabled', true);
        otpBtnText.text("Sending OTP...");

        // Send AJAX request to backend to send OTP
        $.ajax({
            url: "/send-phone-otp", // Laravel route for sending OTP
            type: "POST",
            data: { phone: phone, name: name },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function(response) {
                if (response.success) {
                    otpInput.removeClass('d-none');
                    // verifyBtn.removeClass('d-none');

                    // Update button text to "OTP Sent" and keep it disabled
                    otpBtnText.text("OTP Sent");
                    otpBtn.prop('disabled', true);

                        setTimeout(function() {
                            if (otpBtnText.text()!='Verified')
                            {
                                // Update button text and enable it
                                otpBtnText.text("Resend OTP");
                                otpBtn.prop('disabled', false);
                            }
                        }, 30000); //30sec


                } else {
                    messageDiv.html(response.message).css("color", "red");
                    otpInput.addClass('d-none');
                    // verifyBtn.addClass('d-none');
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    if (errors && errors.phone) {
                        messageDiv.html(errors.phone[0]).css("color", "red");
                    }
                } else {
                    messageDiv.html("Error sending OTP. Please try again.").css("color", "red");
                }

                // Hide OTP fields in case of error
                otpInput.addClass('d-none');
                // verifyBtn.addClass('d-none');
            }
        });

    } else {
        // Invalid phone format
        messageDiv.html("Please enter a valid phone number.").css("color", "red");

        // Hide OTP input and verify button
        otpInput.addClass('d-none');
    }
}
function validateMobileOtp() {
    let enteredOtp      = $('#phone-otp').val();
    let messageDiv      = $('#phone_otp_error');
    let otpStatus       = $('#phone-otp-sending-message');
    let verifyBtn       = $('#verifyBtn');
    let verifyBtnText   = $('#verifyBtnText');
    let otpInput        = $('#phone_verification_box');
    let otpBtnText      = $('#otp-phone-sending-btn-html');

    if (!enteredOtp) {
        messageDiv.html("Please enter the OTP").css("color", "red");
        return;
    }

    // Disable the button and show verifying state
    verifyBtn.prop('disabled', true);
    verifyBtnText.fadeOut(200, function() {
        $(this).text("Verifying...").fadeIn(200);
    });

    $.ajax({
        url: '/verify-phone-otp', // Laravel route handling the OTP verification
        type: 'POST',
        data: {
            otp: enteredOtp
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                otpStatus.html(response.message).css("color", "green");

                // Optionally hide the OTP input (or disable it)
                otpBtnText.text("Verified");
                $('#phone').prop('disabled', true);
                otpInput.addClass('d-none');
                setTimeout(function() {
                    otpStatus.html('').css("", "");
                    otpBtn.prop('disabled', false);

                }, 5000); //30sec
            } else {
                messageDiv.html(response.message).css("color", "red");

                // Re-enable the button for another try
                verifyBtn.prop('disabled', false);
                verifyBtnText.fadeOut(200, function() {
                    $(this).text("Confirm").fadeIn(200);
                });
            }
        },
        error: function(xhr, status, error) {
            messageDiv.html("Something went wrong. Please try again.").css("color", "red");

            // Re-enable the button on error
            verifyBtn.prop('disabled', false);
            verifyBtnText.fadeOut(200, function() {
                $(this).text("Confirm").fadeIn(200);
            });
        }
    });
}
