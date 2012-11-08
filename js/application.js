  (function($){
    $(document).ready(function(){

      // resize .hs-content when browser window is resized
      function resizeContent(elem) {
        // get height of window
        var windowHeight = $(window).height();
        var windowWidth = $(window).width();
        // resize
        // $(elem).css('width',(windowWidth - 40) + "px").css('max-width',(windowWidth - 40) + "px").css('min-height',(windowHeight + 30) + "px");
        $(elem).css('min-height',(windowHeight - 20) + "px");
      }
      // invoke as soon as page loads
      resizeContent('.hs-content .widgets-inner, #introduction');

        $("#panel8 .widgets-inner").css('min-height',($(window).height() - 300) + "px").css('margin-bottom',"300px");

      // window resize events
      $(window).resize(function () {
        resizeContent('.hs-content .widgets-inner, #introduction');
        });

      // move the nav when more/less is clicked
      $("#more-nav").click(function(e){
        moveNav('nav','-240');
        // ugh---ly :/
        $("#less-nav").css('visibility','visible');
        $("#more-nav").css('visibility','hidden');
      });
      $("#less-nav").click(function(e){
        moveNav('nav','0');
        $("#more-nav").css('visibility','visible');
        $("#less-nav").css('visibility','hidden');
      });

      // more the nav in the correct direction
      function moveNav(elem,direction) {
        $(elem).animate({
          left: direction + "px"
          },500, function() {
            // animation complete
          });
        return false;
      }

      // home key votes toggle
      $(".keyVoteSelector").change(function(){
        $(".items").slideUp();
        $(".items_" + $(".keyVoteSelector:checked").val() ).slideDown();
        $("#more-key-votes-link").attr('href','/chamber/key-vote-' + $(".keyVoteSelector:checked").val() + '/');
      });

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

      $("#signup-form-submit-button").click(function(){
        var form_data = $("#signup-form").serialize();
        $("#signup-content").load("/bluehornet.php?" + form_data);

        var _gaq = _gaq || [];
        _gaq.push(['_trackEvent', 'Signup', 'Footer Signup', $("#signup_name").val()+' '+$("#email_address").val()]);

        // set cookie
        var now = new Date();
        var time = now.getDate();
        time += 365 * 20;
        now.setDate(time);
        document.cookie = '_signup_submitted=true; expires=' + now.toGMTString() + '; path=/';
        return false;
      });



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


    function actionDashboardGo(){
      $(".dashboardZipSearch").removeClass('error');
       var context;
       if($("li.dashboard").css('text-shadow') !== 'none'){
        context = $("li.dashboard");
       }
       else{
        context = $("#action-dashboard");
       }
        if($(".dashboardZipSearch", context).val() !== '' && $(".dashboardZipSearch", context).val() !== "Enter your zip"){
           window.location = '/congress/' + $(".dashboardZipSearch", context).val();
        }
        else{
           $(".dashboardZipSearch", context).addClass('error');
        }
     }

     $.backstretch(["/wp-content/themes/heritageaction/img/bg-capital-mobile.jpg"],{duration:3000,fade:750});

    });
  })(jQuery);

  /*
    * Normalized hide address bar for iOS & Android
    * (c) Scott Jehl, scottjehl.com
    * MIT License
  */
  (function( win ){
  	var doc = win.document;

  	// If there's a hash, or addEventListener is undefined, stop here
  	if( !location.hash && win.addEventListener ){

  		//scroll to 1
  		window.scrollTo( 0, 1 );
  		var scrollTop = 1,
  			getScrollTop = function(){
  				return win.pageYOffset || doc.compatMode === "CSS1Compat" && doc.documentElement.scrollTop || doc.body.scrollTop || 0;
  			},

  			//reset to 0 on bodyready, if needed
  			bodycheck = setInterval(function(){
  				if( doc.body ){
  					clearInterval( bodycheck );
  					scrollTop = getScrollTop();
  					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
  				}
  			}, 15 );

  		win.addEventListener( "load", function(){
  			setTimeout(function(){
  				//at load, if user hasn't scrolled more than 20 or so...
  				if( getScrollTop() < 20 ){
  					//reset to hide addr bar at onload
  					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
  				}
  			}, 0);
  		} );
  	}
  })( this );