	(function($){
		$(document).ready(function(){

			if($("#signup-scroll-target").length > 0){
				// only do signup scroll if its on the page

				$(window).scroll(function() {
						var browserbottom = $(window).scrollTop() + $(window).height();
						var offset = $("#signup-scroll-target").offset();
						var height = offset.top - 30;

						//console.log("scrollTop: " + $(window).scrollTop() + " browserbottom: " + browserbottom + " height: " + height)

						if (browserbottom >= height) {
								$("#sign-up").removeClass('fixed');
						} else {
								$("#sign-up").addClass('fixed');
						}
				});

				$("#sign-up-tab").click(function(){
					var offset = $("#signup-scroll-target").offset();
					var height = offset.top - 30;
					$('html, body').animate({scrollTop: (height - $(window).height()) + 165},'fast');
				});
			}


			$("#listen-live").click(function(){
				window.open($(this).attr('href'),'Listen_Live!','resizable=yes,scrollbars=yes,width=837,height=470');
				return false;
			});

			$("#signup-form-submit-button").click(function(){
				var form_data = $("#signup-form").serialize();
				$("#signup-form-result").load("/bluehornet.php?" + form_data);
				return false;
			});


			/**
			 * Handles toggling the main navigation menu for small screens.
			 */

			var $masthead = $( '#masthead' ),
					timeout = false;

			$.fn.smallMenu = function() {
				$masthead.find( '.site-navigation' ).removeClass( 'main-navigation' ).addClass( 'main-small-navigation' );
				$masthead.find( '.site-navigation h1' ).removeClass( 'assistive-text' ).addClass( 'menu-toggle' );

				$( '.menu-toggle' ).unbind( 'click' ).click( function() {
					$masthead.find( '.menu' ).toggle();
					$( this ).toggleClass( 'toggled-on' );
				} );
			};

			// Check viewport width on first load.
			if ( $( window ).width() < 600 ){
				$.fn.smallMenu();
				}

			// Check viewport width when user resizes the browser window.
			$( window ).resize( function() {
				var browserWidth = $( window ).width();

				if ( false !== timeout ){
					clearTimeout( timeout );
				}

				timeout = setTimeout( function() {
					if ( browserWidth < 600 ) {
						$.fn.smallMenu();
					} else {
						$masthead.find( '.site-navigation' ).removeClass( 'main-small-navigation' ).addClass( 'main-navigation' );
						$masthead.find( '.site-navigation h1' ).removeClass( 'menu-toggle' ).addClass( 'assistive-text' );
						$masthead.find( '.menu' ).removeAttr( 'style' );
					}
				}, 200 );
			} );

// remove placeholder text on focus and put it back on unfocus
$('.search-input').data('holder',$('.search-input').attr('placeholder'));

$('.search-input').focusin(function(){
    $(this).attr('placeholder','');
});
$('.search-input').focusout(function(){
    $(this).attr('placeholder',$(this).data('holder'));
});




		});
	})(jQuery);