function confirmDelete(firstName, lastName, deleteURL) {
	var choice = confirm("Voulez-vous vraiment supprimer "+firstName+" "+lastName+" ?");

	if (choice == true) {
		// Redirect
		window.location.replace(deleteURL)
	}
}