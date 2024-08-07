const btn = document.getElementById("button");

document.getElementById("form").addEventListener("submit", function (event) {
	event.preventDefault();

	btn.value = "Sending...";

	const serviceID = "default_service";
	const templateID = "template_a9gh56k";

	emailjs.sendForm(serviceID, templateID, this).then(
		() => {
			btn.value = "Send Email";
			// agregar alerta de envio exitoso con div y limpiar campos
			alert("Mensaje enviado correctamente");
			document.getElementById("form").reset();
		},
		(err) => {
			btn.value = "Send Email";
			alert(JSON.stringify(err));
		}
	);
});
