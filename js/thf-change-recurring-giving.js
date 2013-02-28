function GetSelectedDonation(){ // Figures out currently selected Kimbia value.
	if (typeof jQuery('input[name=DonationLevel]:checked').val() === 'undefined') { // Nothing is currently selected.
		var SelectedDonation = 0;
	} else if (jQuery('input[name=DonationLevel]:checked').val() == 'Other') { // Other is selected
		var SelectedDonation = jQuery('#kimbiaView_1_DonationLevel .k_otherMoney').val().replace(/\$|\,/g,''); // replace strips out dollar signs and commas
	} else { // A regular array value is selected
		var SelectedDonation = jQuery('input[name=DonationLevel]:checked').val().replace(/\$|\,/g,''); // replace strips out dollar signs and commas
	}
	  
	return SelectedDonation;
}

function ChangeText()
{   
    jQuery('.monthlyamt').html('$'+GetSelectedDonation());     
}

function RecurringGiving(){  
  
  jQuery('.groupLabel.section.k_askArrayMain.k_donation').text("Donation Amount");
	jQuery('.k_paymentPlanTitle.required').text("Choose Your Donation Type");
	jQuery('label.k_ongoing').after(jQuery('input.k_oneTime')); // Rearrange order of elements
	jQuery('input.k_oneTime').after(jQuery('label.k_oneTime'));	
	
	jQuery('input.k_ongoing').trigger("click");//kimbia requires this radio button to be clicked
	jQuery('select.k_payPlan option[value=MONTHLY]').attr('selected','selected'); // Select the monthly option
	jQuery('select.k_payPlan').hide(); // Hide the drop-down option
	jQuery('label.k_ongoing').replaceText(/ongoing payments./,'<span class="replace-text" style="display: inline;">Monthly recurring donation to Heritage Action (your card will be charged <span class="monthlyamt" style="display: inline; font-weight:bold;">$'+GetSelectedDonation()+'</span> each month</span>) '); // Change the text	
	jQuery('.k_paymentPlanHint.k_ongoing').hide();
	jQuery(".k_radioCB").change(function() {ChangeText();});
	jQuery(".k_money.k_otherMoney").focusout(function() {console.log('focusout'); ChangeText();});  
}