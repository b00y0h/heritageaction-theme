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
	
				$("#sign-up").click(function(){
					offset = $("#signup-scroll-target").offset();
					height = offset.top - 30;
					$('html, body').animate({scrollTop: (height - $(window).height()) + 165},'fast');
				})
			}	
	    
			
		})
	})(jQuery);