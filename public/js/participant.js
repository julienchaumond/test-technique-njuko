$(document).ready(function () {
	// Handle the special case where the user doesn't set the "seconds" part of the time input in Participant_form
	$("input[name='measured_time']").change(function() {
		var value = $(this).val();
		var regEx = /^[0-9]{2}:[0-9]{2}$/;
		if(regEx.test(value)) {
			$(this).val(value+":00");
		}
	})
})

function confirmDelete(firstName, lastName, deleteURL) {
	var choice = confirm("Voulez-vous vraiment supprimer "+firstName+" "+lastName+" ?");

	if (choice == true) {
		// Redirect
		window.location.replace(deleteURL)
	}
}