<?php

// CONTACT FORM
if (isset($_POST['action']) && $_POST['action'] == 'contact') {

    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(["msg" => 'All the fields are required']);
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["msg" => 'Enter valid Email ID']);
    } else {

        require './assets/mail/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'backend.emailservices@gmail.com';
        $mail->Password = 'qwerty123@';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('backend.emailservices@gmail.com', 'Contact message');
        $mail->addAddress('farmanhafeezj@gmail.com', 'Farman Hafeez');
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = '<br>' . $message . '<br><br>
                            <b>Regards,</b> <br>' .
            $name . '<br>' .
            $email . '<br>';
        $mail->AltBody = "Please view this message in a HTML supported application";

        if (!$mail->send()) {
            echo json_encode(["msg" => 'Message could not be sent']);
        } else {
            echo json_encode(["msg" => 'Thank you for contacting us!']);
        }
    }
}

// API TESTING
if (isset($_POST['download-btn'])) {
    $file = 'DataForDummies-api' . '.json';
    file_put_contents($file, $_POST['jsondata']);
    header("Content-type: application/json");
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink($file);
}
