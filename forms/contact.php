<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Reemplaza contact@example.com con tu dirección de correo electrónico real
    $receiving_email_address = 'elrealmustang@outlook.com';

    // Recoge los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Formatea el correo electrónico
    $email_subject = "Mensaje de contacto: $subject";
    $email_body = "Has recibido un mensaje de contacto de $name ($email):\n\n";
    $email_body .= "$message";

    // Enviar el correo electrónico
    $headers = "From: $name <$email>";
    if (mail($receiving_email_address, $email_subject, $email_body, $headers)) {
        echo "¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente.";
    } else {
        echo "Lo sentimos, ha habido un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    // Si no es una solicitud POST, redirige al formulario de contacto
    header("Location: contact_form.html");
    exit();
}

?>