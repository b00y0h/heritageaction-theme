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
					offset = $("#signup-scroll-target").offset();
					height = offset.top - 30;
					$('html, body').animate({scrollTop: (height - $(window).height()) + 165},'fast');
				})
			}	
	    
	
			$("#listen-live").click(function(){
				window.open($(this).attr('href'),'Listen_Live!','resizable=yes,scrollbars=yes,width=837,height=470');
				return false;
			})
			
			$("#signup-form-submit-button").click(function(){
				var form_data = $("#signup-form").serialize();
				$("#signup-form-result").load("/bluehornet.php?" + form_data);
				return false;
			})
			
			
		})
	})(jQuery);