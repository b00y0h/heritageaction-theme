<!-- start standard donate script header -->
<script type="text/javascript" id="gaTrigger">
function gaTriggerIndex(object) {
    _gaq.push(['_setVar', 'testVar']);
    _gaq.push(['_trackPageview', 'DonateSubmission.html']);
   // E-commerce Tracking
    var confirmationCode = object.confirmationCode;
    var initialCharge = object.initialCharge.replace(/\,/g,'');
   _gaq.push(['_addTrans', confirmationCode,"",initialCharge.substr(1),"","","","",""]); // OrderID, Affiliation, Total, Tax, Shipping, City, ST, Country
   _gaq.push(['_trackTrans']);
}
</script>
<!-- end standard donate script header -->