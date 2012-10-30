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



      var $masthead = $( '#masthead' ),


      $( window ).resize( function() {
        if ( false !== timeout ){
          clearTimeout( timeout );

        timeout = setTimeout( function() {
          } else {

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