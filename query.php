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
    $data = $_POST['jsondata'];
    $file = 'DFD-api' . '.txt';
    file_put_contents($file, $data);
    header("Content-type: text/plain");
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink($file);
}

// DATA GENERATION TOOL
if (isset($_POST['data-generation-btn'])) {

    $dataset = filter_var($_POST['data'], FILTER_SANITIZE_STRING);
    $row = filter_var($_POST['rows'], FILTER_SANITIZE_NUMBER_INT);
    $format = filter_var($_POST['format'], FILTER_SANITIZE_STRING);

    $array = json_decode(file_get_contents('./api/' . $dataset . '/' . $dataset . '.json'), TRUE);
    shuffle($array);
    $arraypush = array(
        $dataset => array()
    );

    if ($row >= 1 && $row <= 5000) {
        for ($i = 0; $i < $row; $i++) {
            if (array_key_exists($array[$i]['id'], $array)) {
                unset($array[$i]['id']);
            }
        }
        for ($i = 0; $i < $row; $i++) {
            array_push($arraypush[$dataset], $array[$i]);
        }
        if ($format == 'json') {
            $file = 'DFD-' . $dataset . '.json';
            file_put_contents($file, json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
            header("Content-type: application/json");
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            unlink($file);
        }
        if ($format == 'xml') {
            function createXML($data, $dataset)
            {
                $xmlDoc = new DOMDocument('1.0', 'UTF-8');
                $root = $xmlDoc->appendChild($xmlDoc->createElement('root'));
                foreach ($data as $results) {
                    $tab = $root->appendChild($xmlDoc->createElement($dataset));
                    $arrayXml = function ($arrayXml, $results, $tab) use ($xmlDoc) {
                        foreach ($results as $key => $val) {
                            $tab1 = $tab->appendChild($xmlDoc->createElementNS(null, is_numeric($key) ? 'item' : $key));
                            if (is_array($val)) {
                                $arrayXml($arrayXml, $val, $tab1);
                            } else {
                                $tab1->appendChild($xmlDoc->createTextNode($val));
                            }
                        }
                    };
                    $arrayXml($arrayXml, $results, $tab);
                }

                $xmlDoc->formatOutput = true;
                $file = 'DFD-' . $dataset . '.xml';
                file_put_contents($file, $xmlDoc->saveXML());
                header("Content-type: application/xml");
                header('Content-Disposition: attachment; filename="' . basename($file) . '"');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                unlink($file);
            }
            createXML($arraypush[$dataset], $dataset);
        }
    }
}

// JSON TO XML CONVERTER
if (isset($_POST['xmldownload'])) {
    $data = $_POST['xmldata'];
    $file = 'DFD-jsontoxml' . '.xml';
    file_put_contents($file, $data);
    header("Content-type: application/xml");
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink($file);
}

// XML TO JSON CONVERTER
if (isset($_POST['action']) && $_POST['action'] == 'xmltojson') {
    $data = $_POST['xmldata'];
    $data = simplexml_load_string($data);
    echo json_encode($data);
}
if (isset($_POST['jsondownload'])) {
    $data = $_POST['jsondata'];
    $file = 'DFD-xmltojson' . '.json';
    file_put_contents($file, $data);
    header("Content-type: application/json");
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink($file);
}
