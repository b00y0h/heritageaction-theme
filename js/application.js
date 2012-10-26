  (function($){
    $(document).ready(function(){

      // resize .hs-content when browser window is resized
      function resizeContent(elem) {
        // get height of window
        // var windowHeight = $(window).height();
        var windowWidth = $(window).width();
        // resize
        $(elem).css('width',(windowWidth) + "px").css('max-width',(windowWidth) + "px");
      }
      // invoke as soon as page loads
      resizeContent('.hs-content');
      
      // window resize events
      $(window).resize(function () {
        resizeContent('.hs-content');
        });
      
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



      $("#listen-live").click(function(){
        window.open($(this).attr('href'),'Listen_Live!','resizable=yes,scrollbars=yes,width=837,height=470');
        return false;
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


      /**
       * Handles toggling the main navigation menu for small screens.
       */

      var $masthead = $( '#masthead' ),
          timeout = false;

      // $.fn.smallMenu = function() {
      //  $masthead.find( '.site-navigation' ).removeClass( 'main-navigation' ).addClass( 'main-small-navigation' );
      //  $masthead.find( '.site-navigation h1' ).removeClass( 'assistive-text' ).addClass( 'menu-toggle' );
      //
      //  $( '.menu-toggle' ).unbind( 'click' ).click( function() {
      //    $masthead.find( '.menu' ).toggle();
      //    $( this ).toggleClass( 'toggled-on' );
      //  } );
      // };

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