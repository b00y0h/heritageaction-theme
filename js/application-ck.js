/**
 *
 * Application File
 *
 **/// Placing functions before they are called (JSHINT)
function actionDashboardGo(){jQuery(".dashboardZipSearch").removeClass("error");var e;jQuery("li.dashboard").css("text-shadow")!=="none"?e=jQuery("li.dashboard"):e=jQuery("#action-dashboard");jQuery(".dashboardZipSearch",e).val()!==""&&jQuery(".dashboardZipSearch",e).val()!=="Enter your zip"?window.location="/congress/"+jQuery(".dashboardZipSearch",e).val():jQuery(".dashboardZipSearch",e).addClass("error")}(function(e){e(document).ready(function(){e("#press-release-slider").tinycarousel({pager:!0,interval:!0,intervaltime:7e3});e(".keyVoteSelector").change(function(){e(".items").slideUp();e(".items_"+e(".keyVoteSelector:checked").val()).slideDown();e("#more-key-votes-link").attr("href","/chamber/key-vote-"+e(".keyVoteSelector:checked").val()+"/")});e("#search-trigger").click(function(){e("#search").hasClass("hover")?e("#search").removeClass("hover"):e("#search").hasClass("hover")||e("#search").addClass("hover")});if(e("#signup-scroll-target").length>0){e(window).scroll(function(){var t=e(window).scrollTop()+e(window).height(),n=e("#signup-scroll-target").offset(),r=n.top-30;t>=r?e("#sign-up").removeClass("fixed"):e("#sign-up").addClass("fixed")});e("#sign-up-tab").click(function(){var t=e("#signup-scroll-target").offset(),n=t.top-30;e("html, body").animate({scrollTop:n-e(window).height()+165},"fast")})}e(".dashboardZipGo").click(function(){actionDashboardGo();return!1});e(document).keypress(function(t){if(e(".dashboardZipSearch").is(":focus")){var n=t.keyCode?t.keyCode:t.which;n===13&&actionDashboardGo()}});e("#listen-live").click(function(){window.open(e(this).attr("href"),"Listen_Live!","resizable=yes,scrollbars=yes,width=837,height=470");return!1});e("#signup-form-submit-button").click(function(){var t=e("#signup-form").serialize();e("#signup-content").load("/bluehornet.php?"+t);var n=n||[];n.push(["_trackEvent","Signup","Footer Signup",e("#signup_name").val()+" "+e("#email_address").val()]);var r=new Date,i=r.getDate();i+=7300;r.setDate(i);document.cookie="_signup_submitted=true; expires="+r.toGMTString()+"; path=/";return!1});var t=e("#masthead"),n=!1;e(window).width()<600&&e.fn.smallMenu();e(window).resize(function(){var r=e(window).width();!1!==n&&clearTimeout(n);n=setTimeout(function(){if(r<600)e.fn.smallMenu();else{t.find(".site-navigation").removeClass("main-small-navigation").addClass("main-navigation");t.find(".site-navigation h1").removeClass("menu-toggle").addClass("assistive-text");t.find(".menu").removeAttr("style")}},200)});e(".search-input").data("holder",e(".search-input").attr("placeholder"));e(".search-input").focusin(function(){e(this).attr("placeholder","")});e(".search-input").focusout(function(){e(this).attr("placeholder",e(this).data("holder"))});e("#search-btn").click(function(){e("#searchform").submit();return!1});e("#menu-main-nav > li.score-card, #menu-main-nav > li.the-forge-blog, #menu-main-nav > li.donate").click(function(){window.location.href=e("a",e(this)).attr("href")})})})(jQuery);