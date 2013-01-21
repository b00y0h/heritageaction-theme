<?php
/*
Template Name: Call Alert
*/

if(!file_exists('wp-content/plugins/congresspages/models/CP.php')){
  die('congress pages isnt installed ');
}

require_once('wp-content/plugins/congresspages/models/CP.php');
require_once('wp-content/plugins/congresspages/models/CPCommon.php');
require_once('wp-content/plugins/congresspages/models/CPCallLog.php');

global $wp_query;
global $query_string;
global $post;
$cpHouse = new CPHouse();
$cpSenate = new CPSenate();
$common = new CPCommon();
$CallLog = new CPCallLog();

$zipcode = (isset($wp_query->query_vars['zipdist'])) ? $wp_query->query_vars['zipdist'] : @$_GET['zipdist'];
$zipcode = str_replace("/","",$zipcode);

$chamber = get_query_var('chamber');

if(isset($zipcode) && !empty($zipcode)){
  
  $zip2Dist = new CPZip2Dist();
  $district = $zip2Dist->getDistrict($zipcode); 
  $members = array();
  
  if($chamber == "senate"){
    $senate = $cpSenate->getSenators(CPCommon::dist2State($district));
    $members = array_merge($senate,$members);
  }
  if($chamber == "house"){
    $cpHouse->loadByCode($district);    
    $members[] = $cpHouse;
  }
  
}

function prepForPrint($post, $zipcode, $chamber,  $members){
  $output = "<!--[if lt IE 7 ]> <html class=\"no-js ie6 ie\"> <![endif]--> 
  <!--[if IE 7 ]>    <html class=\"no-js ie7 ie\" > <![endif]--> 
  <!--[if IE 8 ]>    <html class=\"no-js ie8 ie\" > <![endif]-->
  <!--[if (gte IE 9)|!(IE)]><!--> <html class=\"no-js\"> <!--<![endif]-->
  <head>
    <title>$post->post_title</title>
    <style type=\"text/css\" media=\"print\">
  /*<![CDATA[*/
     body{
       width:auto;
     }
  	 #print_button {
  	   display: none;
  	 }
  	 .printInstructions{
        display:none;
      }
  /*]]>*/
  	</style>
  	<style type=\"text/css\" media=\"screen,print\">
  	  body {
         font-family: arial;     
         font-size: 12px;      
         color: black;  
       }       
       h1 {
         font-size: 16px;
       }
       ul{
         margin:0;
       }
       p {
         padding: 5px 0px;
       }
       blockquote{
         font-style:italic;
       }
       #printContent{
         width:745px;
       }
       .source{
         font-size:11px;
         font-style:italic;
       }
       #print_button{
         font-size:18px;
       }
       .printInstructions{
         display:none;
       }
      
       html.ie #print_button{
         display:none;
       }
       
       html.ie .printInstructions{
          display:block;
       }
       
       .indent{
         padding-left:40px;
       }
       
       .talkingPoints li{
         list-style: decimal;
       }
  	</style>
  </head>
  <body>";
  ob_start();
  ?>
  
    
  <div id="printContent">
    <img src="<?php echo get_bloginfo('template_directory') ; ?>/img/header_blank2.jpg">
    <h1>Call Alert</h1>
  
      <?php
      $i=1; 
      foreach($members as $member) : ?>
    
          <h2>
            <?php echo ($i == 1) ? "First" : "Second"; ?>
            Call U.S. <?php echo ($chamber == "house") ? "Representative" : "Senator"; ?>  <?php echo $member->first_name; ?> <?php echo $member->last_name; ?> (<?php echo substr($member->party,0,1); ?>-<?php echo $member->state; ?>)
          </h2>
    
          <h2 class='indent'>Phone Number <?php echo $member->capitol_phone; ?></h2>
          <div class="contactInfo">
              <h3>Call Info</h3>
              Capitol Phone: <?php echo $member->capitol_phone; ?><br>
              Washington, D.C. office of U.S. <?php echo ($chamber == "house") ? "Representative" : "Senator"; ?>  <?php echo $member->first_name; ?> <?php echo $member->last_name; ?> <span style="font-size:11px">(please call between 9am & 5pm)</span>
              
              <p>Make the call during normal business hours (East Coast time) and politely interact with the staffer. The goal is to let your Senators know where you stand, not damage your credibility. Provide your name and address if asked, as some Senators want to know if the people calling are really their constituents.</p>
              <p>When you've completed the call, send us a report to let us know how it went.</p>
          </div>
          <div class="talkingPoints">
          <h3>Talking Points</h3>
           <?php
             echo CPCommon::getTalkingPoints($member->party, $member->talking_points, $chamber);
           ?>
          </div>
          <br><br>
      <?php $i++; endforeach; ?>
      
        <h2>Thanks</h2>
         Thanks for making the call.
         Interested in seeing the latest and networking with other conservatives? Visit http://heritageaction.com/congress
         
         
  
        <p class="source">Original Source: <?php echo get_permalink() . $chamber . "/" . $zipcode; ?></p>
        <p><form align="center">
        <input type="button" onClick="window.print();" name="print_button" id="print_button" value="Print" />
      </form>
      <div class="printInstructions">
        <strong>To print this page choose "Print" from the file menu or press the "control" and "p" buttons simultaneously.</strong>
      </div></p>
      </div>
    </body>
  </html>
  <?php
  
  $output .= ob_get_contents();
  ob_end_clean();  
  return $output;
}

$Chamber = ucwords(get_query_var('chamber'));


if (@$_GET['printer'] == true){
  echo prepForPrint($post, $zipcode, $chamber, $members);
  die();
}
?>

<?php get_header(); ?>
<?php the_post(); ?>

<link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/call-alert-styles.css" type="text/css">
<script type="text/javascript">
  if(!window.console) {
      window.console = {
          log : function(str) {
            //alert(str);
            return;
          }
      };
  }

  var CallID = null;
  (function($){
    $(document).ready(function(){
      
      $(".talkingPoints li").wrapInner('<span class="talkingPointBulletContent" />');
      
      <?php if(stripos(@$_SERVER['HTTP_REFERER'], '/call/house') || stripos(@$_SERVER['HTTP_REFERER'], '/call/senate') ) :?>
        window.scrollTo(0,144);
      <?php endif; ?>
      
      setTimeout(function(){
        $(".slidingRack").eq(0).slideDown();
      }, 1000)

      $(".notes").keyup(function(){
        updateMeter($(this).prev(".fillBoxes"), countTextareaLines("#" + $(this).attr('id')))
      })
      
      $(".goButton").click(function(){
        
        if($(this).attr('id') == 'submitAll'){
          saveLog('final_save');
          validateFields();
        }
        else{
          saveLog();
        }
        return false;
      })
      
    <?php if($chamber == 'senate') : ?>
      
      $(".callPageToggle").click(function(){
        swapRacks();
      })
      
    <?php endif; ?>
      
      $(".callHelp").click(function(){
        printPage();
      })
      
      $("#chamberSelect").change(function(){
        if($(this).val() != ''){
          window.location = '/call/' + $(this).val() + '/';
        }
      })
      
      $("#submitZip").live("click",function(){
          updateZipcode();
       })

       $('body').keypress(function(e){
          if($(".welcomeWrapper").is(":visible")){
            code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13){
              updateZipcode();
            } 
            //e.preventDefault();
          }

       });
       
       $(".didYouCall input:radio").click(function(){
           $(this).parent().parent().css('border','none');
       })
       
       if(!Modernizr.input.placeholder){ // placeholder fallback
           
           $(".placeholder").each(function(){
             $(this).val($(this).attr('placeholder'));                       
           })
           
           $(".placeholder").focus(function(){
             if($(this).val() == '' || $(this).val() == $(this).attr('placeholder')){
                 $(this).val('');
             }  
           })
           $(".placeholder").blur(function(){
             if($(this).val() == ''){
                 $(this).val($(this).attr('placeholder'));
             }
           })
                      
       }
      
    })
  })(jQuery);
  
  
  function saveLog(button_type){
    if(jQuery("input:radio:checked").size() > 0){
      kurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
      kdata = "action=ha_log_call&" + jQuery("#callForm").serialize();
      if(CallID != null){
        kdata = kdata + "&call_id=" + CallID;
      }

      jQuery.ajax({
        url: kurl,
        data: kdata,
        dataType: 'json',
        success: function(data){
          if(data.error != null){
            //console.log("Error: " + data)
          }
          else{
            //console.log ("Result: " + data.ID);   
            CallID = data.ID;       
            
            // show thankyou message if we are done
            if(button_type == 'final_save'){
              jQuery(".submitMessage").slideUp();
              jQuery(".thankyouMessage").slideDown();
            }
            
          }

        }
      })
    }
        
  }
  
  function swapRacks(){
    if(jQuery("#memberPage1").is(":visible")){
      jQuery("#memberPage1").slideUp();
      jQuery("#memberPage2").slideDown(function(){
        var offset = jQuery("#memberPage2").offset();
        window.scrollTo(0,offset.top-90);
      });
        
    }
    else if(jQuery("#memberPage2").is(":visible")){
      jQuery("#memberPage2").slideUp();
      jQuery("#memberPage1").slideDown(function(){
        var offset = jQuery("#memberPage1").offset();
        window.scrollTo(0,offset.top-90);
      });
    }

  }
  
  function updateMeter(element, number){
    jQuery(".fillbox", element).each(function(){
      if((jQuery(this).index()+1) <= number){
        jQuery(this).css('background-color','#78c7f3');
      }
      else{
        jQuery(this).css('background-color','#1e456c');
      }
    })
  }
  
  function countTextareaLines(selector){
    
    jQuery("#temporary_textarea_holding_tank").remove();
    jQuery(selector).after('<div id="temporary_textarea_holding_tank" style="display:none;"></div>');
    jQuery("#temporary_textarea_holding_tank").css({
      'width':jQuery(selector).css('width'),
      'padding':jQuery(selector).css('padding'),
      'font-family':jQuery(selector).css('font-family'),
      'font-size':jQuery(selector).css('font-size'),
      'font-style':jQuery(selector).css('font-style'),
      'font-variant':jQuery(selector).css('font-variant'),
      'font-weight':jQuery(selector).css('font-weight')
    })
    
    jQuery("#temporary_textarea_holding_tank").html(jQuery(selector).val().replace(/\n/g,'<br/>'));
    var tHeight = jQuery("#temporary_textarea_holding_tank").height()
    var lHeight = jQuery("#temporary_textarea_holding_tank").css('line-height').replace("px","");
    var lines = tHeight / lHeight;

    return lines;
    
  }
  
  <?php if(isset($zipcode) && !empty($zipcode)): ?>
  
  function printPage(){
    var popupHeight = jQuery(".entry-content").height();
    popupHeight = parseFloat(popupHeight + 240);
    if(popupHeight < 500){popupHeight = 600;}
    if(popupHeight > 1000){popupHeight = 800;}
    printerFriendlyWindow = window.open('','Print_Friendly','resizable=no,scrollbars=yes,width=765,height=' + popupHeight);
    printerFriendlyWindow.document.open("text/html","replace");
    printerFriendlyWindow.document.write(decodeURIComponent('<?php echo rawurlencode(prepForPrint($post, $zipcode, $chamber, $members)); ?>' + ''));
    return false;
  }
  
  <?php endif; ?>
  
  function updateZipcode(){
    if(jQuery("#myZip").val() != '' && jQuery("#myZip").val() != 'Enter your ZIP code'){
      window.location = '/call/<?php echo $chamber; ?>/' + jQuery("#myZip").val();
    }
    
  }
  function validateFields(){
    console.log("Start validating fields");
    
    jQuery(".callAlertErrorWrapper").remove();
    jQuery(".didYouCall").css('border','none');
    jQuery("body").append("<div class='callAlertErrorWrapper'><div class='callAlertError'></div></div>");
    
    
    jQuery(".didYouCall").each(function(){
      if(jQuery("input:radio:checked",jQuery(this)).size() == 0){
        console.log(jQuery(this).attr('id') +" missing input");
        jQuery(this).css('border','1px solid #cf3e3e');
        jQuery(".callAlertError").html("You did not respond to all the calls. Please indicate if you made the calls.");
          
      }
    })
    
    
    
    
    if(jQuery(".callAlertError").html() != ""){
      jQuery(".callAlertErrorWrapper").fadeIn();
    }
    
    jQuery(".callAlertErrorWrapper").click(function(){
      jQuery(this).fadeOut(function(){jQuery(this).remove()})
    })
  }
</script> 
<div class="col1">

<div id="callpage-wrapper"> 
  
  <div class="callCongressHeader">
     <div class="subHeader"><?php echo CPSetting::getValue('call_alert_' . $chamber . '_tagline'); ?></div>
     <div class="headerInfo">
     <?php if(isset($zipcode) && !empty($zipcode)) : ?>
      
      <div class="currentZipInfo">
        <?php echo ($chamber == "house") ? "Representatives" : "Senators"; ?> for ZIP <?php echo $zipcode; ?> <a href="/call/<?php echo $chamber; ?>/"><span id="changeZip" class="fakeLink">Change</span></a>
      </div>
      <div class="callHelp">
        Can't call while online? Want to call later? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="<?php bloginfo('template_directory'); ?>/img/call/printer-icon.png" valign="middle"> &nbsp; <span class="fakeLink" id="printAlert">Print this alert.</span>
      </div>
      
     <?php endif; ?>
      
     </div>
  </div>
 
 
   <div class="call-entry">
     
     <?php if(!isset($chamber) || empty($chamber)): ?>
        
      <div class="welcomeWrapper">

          <h1><?php echo (CPSetting::getValue('call_alert_welcome_title')) ? CPSetting::getValue('call_alert_welcome_title') : 'Get Started'; ?></h1>
          
          <?php echo CPSetting::getValue('call_alert_chamber_message'); ?>
          <select id="chamberSelect">
            <option value="">Select Chamber</option>
            <option value="senate">Senate</option>
            <option value="house">House</option>
          </select>
      </div>
        
     <?php elseif(!isset($zipcode) || empty($zipcode)): ?>
       
       <script type="text/javascript">
        (function($){
          $(document).ready(function(){
            
            $("#myZip").keyup(function(){
              if($(this).val().length >= 4){
                //console.log("Val: " + $(this).val())
                $.ajax({
                  url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                  dataType: 'json',
                  data: {
                     action: 'cp_validate_zip',
                      zip: $(this).val()
                  },
                  success: function(data){
                    if(data.error != null){
                      //console.log(data.error)
                      $("#validZip").hide();
                    }
                    else{
                      //console.log ("Proceed! " + data.result);
                      $("#validZip").show();
                    }
                    
                  }
                });
              }
            })
            
          })
        })(jQuery);
       </script>  
       
       <div class="welcomeWrapper">
         
          <h1><?php echo (CPSetting::getValue('call_alert_welcome_title')) ? CPSetting::getValue('call_alert_welcome_title') : 'Get Started'; ?></h1>
       
          <?php echo wptexturize( wpautop(CPSetting::getValue('call_alert_welcome_message'), 1) ) ; ?>
        
          <div class="cpZipCodeForm" align="left">
            <input name="zip" id="myZip" value="Enter your ZIP code" onblur="if (this.value == '') {this.value = 'Enter your ZIP code';}" onfocus="if (this.value == 'Enter your ZIP code') {this.value = '';}"> <div id="validZip"><img src="<?php bloginfo('template_directory'); ?>/img/Check.png"></div><div id="submitZip" class="btn rounded gradient medium-blue-gradient"><?php echo (CPSetting::getValue('call_alert_welcome_button')) ? stripslashes(CPSetting::getValue('call_alert_welcome_button')) : 'Find Your District'; ?></div>
          </div>
    
       </div>
     <?php endif;  ?>  
       
    
     <?php if(isset($zipcode) && !empty($zipcode) && !empty($chamber)): ?>
     
      <form id="callForm">
          <input type="hidden" name="zip" value="<?php echo $zipcode;?>">
          <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
          <input type="hidden" name="district" value="<?php echo $district; ?>">
      <?php $i=1; foreach($members as $member) :  ?>
        
        <a name="<?php echo ($i == 1) ? 'first' : 'second'; ?>-call"></a>
        <div class="memberListMember">
         <div class="<?php echo ($i==1) ? 'first' : 'second'; ?>MemberName memberNameWrapper step<?php echo $i; ?> callPageToggle">
            <div class="memberName">
              Call U.S. <?php echo ($chamber == "house") ? "Representative" : "Senator"; ?>  <?php echo $member->first_name; ?> <?php echo $member->last_name; ?> (<?php echo substr($member->party,0,1); ?>-<?php echo $member->state; ?>)
            </div>
            <input type="hidden" name="<?php echo $chamber . '_' . $i; ?>_name" value="<?php echo $member->first_name . ' ' . $member->last_name; ?>">
         </div>
         
         <div id="memberPage<?php echo $i; ?>" class="slidingRack memberRack">
         <div class="memberInfo">
           
           <div class="subStep1">
              <div class="stepHeadingText"><?php echo $member->capitol_phone; ?></div>
           </div>
           <div style="clear:both;"></div>
           
           <div class="contactInfo">
              Capitol Phone: <?php echo $member->capitol_phone; ?><br>
              Washington, D.C. office of U.S. <?php echo ($chamber == "house") ? "Representative" : "Senator"; ?>  <?php echo $member->first_name; ?> <?php echo $member->last_name; ?> <span style="font-size:11px">(please call between 9am & 5pm)</span>
              
              <p>Make the call during normal business hours (East Coast time) and politely interact with the staffer. The goal is to let your Senators know where you stand, not damage your credibility. Provide your name and address if asked, as some Senators want to know if the people calling are really their constituents.</p>
              <p>When you've completed the call, send us a report to let us know how it went.</p>
           </div>
           
           <div class="subStep2">
              <div class="stepHeadingText">Deliver this Message</div>
           </div>
           <div style="clear:both;"></div>
            
           <div class="talkingPoints">
             <ul>
               <?php
                 echo CPCommon::getTalkingPoints($member->party, $member->talking_points, $chamber);
               ?>
             </ul>
           </div>
         
          
           <div class="subStep3">
             <div class="stepHeadingText">Write Your Call Report</div>
           </div>
           <div style="clear:both;"></div>
              
           <div class="callResponse">
             <div id="didYouCall_<?php echo $i; ?>" class="reportFormField didYouCall">
               Did you call <?php echo ($chamber == "house") ? "Representative" : "Senator"; ?>  <?php echo $member->last_name; ?>?
               <label><input type="radio" name="<?php echo $chamber; ?>_<?php echo $i; ?>_call" value="1"> Yes</label>   <label><input type="radio" name="<?php echo $chamber; ?>_<?php echo $i; ?>_call" value="0"> No</label>
             </div>
             <div style="clear:both;height:10px;"></div>
             
             <div class="reportFormField">
                Send us a brief recap of your call and let us know if the staffer reported a clear position to you.<br>
                We read each call report and they all are a valuable source of intel to our team.<br>
              
                <div id="fillBoxes_<?php echo $i; ?>" class="fillBoxes">
                  <div id="box1" class="fillbox"></div>
                  <div id="box2" class="fillbox"></div>
                  <div id="box3" class="fillbox"></div>
                  <div id="box4" class="fillbox"></div>
                  <div id="box5" class="fillbox"></div>
                </div>
              
                <textarea id="notes_<?php echo $member->last_name; ?>" name="<?php echo $chamber; ?>_<?php echo $i; ?>_notes" class="notes" rows="5" cols="90"></textarea>
                
                
             </div>             
             <div style="clear:both;height:10px;"></div>
             
             <div align="center">
               <?php if($i == 1 && $chamber=="senate"): ?>
                 <a href="#second-call" class="goButton callPageToggle">                  
                    Next Call
                 </a>
               <?php endif; ?>
               <?php if($i== 2 && false): ?>
                 <a href="#first-call" class="goButton callPageToggle">                  
                    Previous Call
                 </a>
               <?php endif; ?>
             </div>
             
           </div>  
           
         </div>
         </div>
         
        </div>
        
      <?php $i++; endforeach; ?>
      
      
      <div class="step<?php echo ($chamber == 'house') ? '2' : '3'; ?>">
        <div class="memberName">
          Submit Call Report to Heritage Action
        </div>
      </div>
      <div class="submitInfo">
        
        <div class="submitMessage">
          <div class="subStep3">
            <div class="stepHeadingText">Let Us Know Who You Are</div>
          </div>
          <div style="clear:both;"></div>
        
          <div class="infoInput">
            <input id="infoFirstName" class="placeholder" name="first_name" placeholder="Your First Name"> 
          </div>
          <div class="infoInput">
            <input id="infoLastName" class="placeholder" name="last_name" placeholder="Last Name">
          </div>
          <div class="infoInput">
            <input id="infoEmail" class="placeholder" name="email_address" placeholder="Email Address">
          </div>
          <div style="clear:both;"></div>
      
          <div class="submitButtonWrapper" align="center">
            <a href="#" id="submitAll" class="goButton">
              <img src="<?php bloginfo('template_directory'); ?>/img/call/submit-icon.png" valign="middle">
              Submit to Heritage Action
            </a>
          </div>
        
        </div>
        
         <div class="thankyouMessage">
            <div class="subStep1">
              <div class="stepHeadingText">Thank You For Making The Call</div>
            </div>
            <div style="clear:both;"></div>

            <div class="callThankyou">
               <?php echo wptexturize( wpautop(CPSetting::getValue('call_alert_thankyou_message'), 1) ) ; ?>
               
               <p>
                 Your Action Dashboard: the important information you need to hold Congress accountable and a place to discuss your accountability work with other conservatives in your area. Visit your action dashboard now: <a href="http://heritageaction.com/congress/<?php echo $zipcode; ?>">heritageaction.com/congress/<?php echo $zipcode; ?></a>
               </p>
            </div>

        </div>

      </div>
      </form>

    
      
      
     <?php endif; ?>
     
 
</div> <!-- col1 -->
<?php get_footer(); ?>