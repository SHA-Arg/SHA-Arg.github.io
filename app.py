from flask import Flask, request, render_template, redirect, url_for
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

app = Flask(__name__)


@app.route('/')
def index():
    # Asegúrate de que tu formulario esté en index.html
    return render_template('index.html')


@app.route('/send_mail', methods=['POST'])
def send_mail():
    name = request.form['name']
    email = request.form['email']
    message = request.form['message']

    # Configuración del servidor SMTP
    smtp_server = 'smtp.gmail.com'
    smtp_port = 587
    smtp_user = 'tu_correo@gmail.com'  # Cambia esto por tu correo
    smtp_password = 'tu_contraseña'  # Cambia esto por tu contraseña

    # Crear el mensaje de correo
    msg = MIMEMultipart()
    msg['From'] = smtp_user
    # Puede ser el mismo u otro correo donde quieras recibir los mensajes
    msg['To'] = smtp_user
    msg['Subject'] = 'Nuevo mensaje del formulario de contacto'

    body = f'Nombre: {name}\nEmail: {email}\n\nMensaje:\n{message}'
    msg.attach(MIMEText(body, 'plain'))

    try:
        server = smtplib.SMTP(smtp_server, smtp_port)
        server.starttls()
        server.login(smtp_user, smtp_password)
        server.sendmail(smtp_user, smtp_user, msg.as_string())
        server.close()
        return redirect(url_for('index', success=True))
    except Exception as e:
        print(f'Error: {e}')
        return redirect(url_for('index', success=False))


if __name__ == '__main__':
    app.run(debug=True)
