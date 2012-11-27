/**
 *
 * Application File
 *
 **/

oB.settings.autoplay=true;
// Placing functions before they are called (JSHINT)
 function actionDashboardGo(){
    jQuery(".dashboardZipSearch").removeClass('error');
    var context;
    if(jQuery("li.dashboard").css('text-shadow') !== 'none'){
     context = jQuery("li.dashboard");
    }
    else{
     context = jQuery("#action-dashboard");
    }
     if(jQuery(".dashboardZipSearch", context).val() !== '' && jQuery(".dashboardZipSearch", context).val() !== "Enter your zip"){
        window.location = '/congress/' + jQuery(".dashboardZipSearch", context).val();
     }
     else{
        jQuery(".dashboardZipSearch", context).addClass('error');
     }
  }

function signup_validate(form){
		if(typeof form === 'string'){
			form = jQuery(form);
		}
    
    jQuery('.signup-form-error',form).removeClass('signup-form-error');
    var output = true;
    // validate name
    if(jQuery(".signup_name" ,form).val() === '' || jQuery(".signup_name" ,form).val() === 'Name'){
        output = false;
        jQuery(".signup_name" ,form).addClass('signup-form-error');
    }

    // validate email
    if(jQuery(".email_address" ,form).val() === '' || jQuery(".email_address" ,form).val() === 'Email Address'){
        output = false;
        jQuery(".email_address" ,form).addClass('signup-form-error');
    }

    // validate zip
    if(jQuery(".zip_code" ,form).val() === '' || jQuery(".zip_code" ,form).val() === 'Zip Code'){
        output = false;
        jQuery(".zip_code" ,form).addClass('signup-form-error');
    }

    return output;
}


  (function($){
    $(document).ready(function(){

      // press release slider
      $("#press-release-slider").tinycarousel({
        pager: true,
        interval: true,
        intervaltime: 7000
      });

      // home key votes toggle
      $(".keyVoteSelector").change(function(){
        $(".items").slideUp();
        $(".items_" + $(".keyVoteSelector:checked").val() ).slideDown();
        $("#more-key-votes-link").attr('href','/chamber/key-vote-' + $(".keyVoteSelector:checked").val() + '/');
      });
	
	
			$("#keyVoteTouchSlider").draggable({
				axis: "x",
				containment: "parent",
				snap: "#keyVoteSwitchWrap",
				snapMode: "inner",
				stop: function(event, ui) {
					$(".keyVoteLabel").removeClass('activeChamber');
					var pos = ui.position.left;
					if(pos == '0'){
						// house
						$(".houseChamberLabel").addClass('activeChamber');
						$(".items").slideUp();
		        $(".items_house").slideDown();
		        $("#more-key-votes-link").attr('href','/chamber/key-vote-house/');
						$("#keyVoteTouchSlider").css('left','0');
					}
					else{
						// senate
						$(".items").slideUp();
						$(".senateChamberLabel").addClass('activeChamber');
		        $(".items_senate").slideDown();
		        $("#more-key-votes-link").attr('href','/chamber/key-vote-senate/');
						$("#keyVoteTouchSlider").css('left','45px');
					}
				}
			});
			$(".houseChamberLabel").click(function(){
				$(".keyVoteLabel").removeClass('activeChamber');
				$(".houseChamberLabel").addClass('activeChamber');
				$(".items").slideUp();
        $(".items_house").slideDown();
        $("#more-key-votes-link").attr('href','/chamber/key-vote-house/');
				$("#keyVoteTouchSlider").css('left','0');
			})
			$(".senateChamberLabel").click(function(){
				$(".keyVoteLabel").removeClass('activeChamber');
				$(".items").slideUp();
				$(".senateChamberLabel").addClass('activeChamber');
        $(".items_senate").slideDown();
        $("#more-key-votes-link").attr('href','/chamber/key-vote-senate/');
				$("#keyVoteTouchSlider").css('left','45px');
			})
			

      $("#search-trigger").click(function(){
        if($("#search").hasClass('hover')){
          $("#search").removeClass('hover');
        }
        else if(!$("#search").hasClass('hover')){
          $("#search").addClass('hover');
        }
      });

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

      $(".dashboardZipGo").click(function(){
        actionDashboardGo();
        return false;
      });

      $(document).keypress(function(e){
        if($(".dashboardZipSearch").is(":focus")){
          var code = (e.keyCode ? e.keyCode : e.which);
          if (code === 13){
            actionDashboardGo();
          }
        }
      });




      $("#listen-live").click(function(){
        window.open($(this).attr('href'),'Listen_Live!','resizable=yes,scrollbars=yes,width=837,height=470');
        return false;
      });

      $("#footer-signup-form-submit-button").click(function(){

        if(signup_validate("#signup-form") ){
            var form_data = $("#signup-form").serialize();
            $("#signup-content").load("/bluehornet/bluehornet-api.php?" + form_data);

            var _gaq = _gaq || [];
            _gaq.push(['_trackEvent', 'Signup', 'Footer Signup', $("#signup_name").val()+' '+$("#email_address").val()]);

            // set cookie
            var now = new Date();
            var time = now.getDate();
            time += 365 * 20;
            now.setDate(time);
            document.cookie = '_signup_submitted=true; expires=' + now.toGMTString() + '; path=/';
         }



        return false;
      });

			$(".signup-form-submit-button").click(function(){
				var form = $(this).parent();
        if(signup_validate(form) ){
            var form_data = $(this).parent().serialize();
						//console.log(form_data);
										
            $(".paramount_signup_form_result").load("/bluehornet/bluehornet-api.php?" + form_data, function(){
							form.hide();
							$(".paramount_signup_thankyou", form.parent()).show();
						});
						
						if(form.attr('data-pa-ga') == 'true'){
            	var _gaq = _gaq || [];
            	_gaq.push(['_trackEvent', 'Signup', form.attr('data-pa-name') , $(".signup_name").val()+' '+$(".email_address").val()]);
						}
						
						if(form.attr('data-pa-cookie') == 'true'){
							
							// set cookie
	            var now = new Date();
	            var time = now.getDate();
	            time += 365 * 20;
	            now.setDate(time);
							var cookie_name = '_signup_' + form.attr('data-pa-name').toLowerCase().replace(' ','_') + '_submitted';
	            document.cookie = cookie_name + '=true; expires=' + now.toGMTString() + '; path=/';
							
						}
         }
        return false;
      });


      /**
       * Handles toggling the main navigation menu for small screens.
       */

      var $masthead = $( '#masthead' ),
          timeout = false;

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


    // ===============================================================
    // = remove placeholder text on focus and put it back on unfocus =
    // ===============================================================
    $('.search-input').data('holder',$('.search-input').attr('placeholder'));

    $('.search-input').focusin(function(){
        $(this).attr('placeholder','');
    });
    $('.search-input').focusout(function(){
        $(this).attr('placeholder',$(this).data('holder'));
    });


    // =============================
    // = Fake anchor search button =
    // =============================
    $("#search-btn").click(function() {
      $("#searchform").submit();
      return false;
    });

        // allow clicking on nav dropdown to act as link click
        $("#menu-main-nav > li.donate").click(function(){
            window.location.href = $('a',$(this)).attr('href');
        });
    });
  })(jQuery);