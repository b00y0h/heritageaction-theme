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

function RecurringGiving(){
	jQuery('label.k_ongoing').after(jQuery('input.k_oneTime')); // Rearrange order of elements
	jQuery('input.k_oneTime').after(jQuery('label.k_oneTime'));
	
	jQuery('input.k_ongoing').attr('checked','checked'); // Check the ongoing box
	jQuery('select.k_payPlan option[value=MONTHLY]').attr('selected','selected'); // Select the monthly option
	jQuery('select.k_payPlan').hide(); // Hide the drop-down option
	jQuery('label.k_ongoing').replaceText(/ongoing payments./,'Monthly recurring donation to The Heritage Foundation (your card will be charged <span class="monthlyamt">$'+GetSelectedDonation()+'</span> each month) '); // Change the text
}