const btn = document.getElementById('button');
const feedback = document.getElementById('form-feedback');

document.getElementById('form').addEventListener('submit', function (event) {
	event.preventDefault();

	// Honeypot check — bots fill the hidden field, humans don't
	if (this._honeypot && this._honeypot.value !== '') {
		return;
	}

	const serviceID = 'service_799620f';
	const templateID = 'template_a9gh56k';

	btn.disabled = true;
	btn.textContent = 'Enviando...';
	feedback.textContent = '';
	feedback.className = 'form-feedback';

	emailjs.sendForm(serviceID, templateID, this).then(
		function () {
			btn.disabled = false;
			btn.textContent = 'Enviar mensaje';
			feedback.textContent = '¡Mensaje enviado correctamente!';
			feedback.className = 'form-feedback form-feedback--success';
			document.getElementById('form').reset();
		},
		function () {
			btn.disabled = false;
			btn.textContent = 'Enviar mensaje';
			feedback.textContent = 'Error al enviar. Intentalo de nuevo o escribime directo a GitHub.';
			feedback.className = 'form-feedback form-feedback--error';
		}
	);
});
