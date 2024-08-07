// Init EmailJS
(function () {
	// https://dashboard.emailjs.com/admin/account
	emailjs.init({
		publicKey: "2fbjOfKN244DrH5T2",
	});
})();

// Add event listener to the form
window.onload = function () {
	document
		.getElementById("contact-form")
		.addEventListener("submit", function (event) {
			event.preventDefault();
			// these IDs from the previous steps
			emailjs.sendForm("contact_service", "contact_form", this).then(
				() => {
					console.log("SUCCESS!");
				},
				(error) => {
					console.log("FAILED...", error);
				}
			);
		});
};
