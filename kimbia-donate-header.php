<!-- kimbia donate header -->
<?php
 
     /*
       
       Code supplied by KMA/Pursuant to provide custom gift arrays- NW
       
       */
 
     //error_reporting(E_ALL);
     //ini_set("display_errors",1);
 
     $Multiplier = 1; // This is the base multiplier. So, if this is 2 and amt is 10, the array will start at twice the amt (20).
     $Increment = 0.5; // This is the loop multiplier increment. If this is 0.5 and amt is 10, the array will go 10, 15, 20, 25, 30.
     
     $RemoveText = array(',','$','%24','%2C'); // Strips out commas and dollar signs
 
      // This variable will determine whether or not to replace the default Kimbia array.
      // This gets set to 1 when we know that we have the values to replace the array.
     $UseNewArray = 0;
     
      if (isset($_GET['amt']) && trim($_GET['amt']) != '') { // Variable exists
           $amt = str_replace($RemoveText,'',trim($_GET['amt']));
           if (!is_numeric($amt)) { // If not numeric, just set to 0.
                 $amt = 0;
           } else {
                 $amt = number_format($amt,2,'.','');
           }
      } else {
           $amt = 0;
      }
     
      if ($amt > 0) {
           if ($amt < 15) { $amt = 15; } // Floor
           if ($amt > 2500) { $amt = 2500; } // Ceiling
           $Delimiter = '';
           $NewGivingArray = '';
           for ($i=0;$i<5;$i++) { // Array Loop
                 if ($amt >= 75) {
                      $NewAmt = ceil(intval($amt*$Multiplier)/25)*25; // This rounds amount to nearest $25 if base value is >= $75.
                 } else {
                       $NewAmt = ceil(intval($amt*$Multiplier)/5)*5; // This rounds amount to nearest $5.
                                 //$NewAmt = ceil($amt*$Multiplier); // ceil() rounds .XX values up to the next dollar.
                 }
                 $NewGivingArray .= $Delimiter . $NewAmt;
                 $Delimiter = ',';
                 $Multiplier += $Increment;
           }
           $UseNewArray = 1;
      }
 
?>
<?php if ($UseNewArray == 1) { ?>
            <script type="text/javascript">
              function SetDonationLevels(widget) {     
                     var alsoRemoveOther = false;
                     widget.removeDonationLevels(alsoRemoveOther);
       
                     var askArray = [<?php echo $NewGivingArray; ?>];
                    
                     for (var i = 0; i < askArray.length; i++){
                               var ask = askArray[i];
                               if(ask === undefined){
                                       continue;
                               }
                               widget.addDonationLevel(ask);
                     }
              }
            </script>
<?php } ?>