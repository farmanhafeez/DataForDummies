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
    $file = 'DFD-api' . '.json';
    file_put_contents($file, $data);
    header("Content-type: application/json");
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

    $array = json_decode(file_get_contents('./data/' . $dataset . '/' . $dataset . '.json'), TRUE);
    shuffle($array);
    $arraypush = array(
        $dataset => array()
    );
    $xmlArray = array();

    if ($row >= 1 && $row <= 5000) {
        if ($dataset != 'country') {
            for ($i = 0; $i < $row; $i++) {
                if (array_key_exists($array[$i]['id'], $array)) {
                    unset($array[$i]['id']);
                }
            }
            for ($i = 0; $i < $row; $i++) {
                array_push($arraypush[$dataset], $array[$i]);
                array_push($xmlArray, $array[$i]);
            }
        }
        if ($dataset == 'country') {
            for ($i = 0; $i < count($array); $i++) {
                array_push($arraypush[$dataset], $array[$i]);
                array_push($xmlArray, $array[$i]);
            }
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
            function isNumeric($key)
            {
                if (is_numeric($key)) {
                    return 'element';
                } else {
                    return $key;
                }
            }
            function arrayXmls($val1, $tabUser1, $xmlDoc, $key1)
            {
                $tabUser2 = $tabUser1->appendChild($xmlDoc->createElement(isNumeric($key1)));
                foreach ($val1 as $key2 => $val2) {
                    if (is_array($val2)) {
                        $tabUser3 = $tabUser2->appendChild($xmlDoc->createElement(isNumeric($key2)));
                        foreach ($val2 as $key3 => $val3) {
                            $tabUser3->appendChild($xmlDoc->createElement(isNumeric($key3), $val3));
                        }
                    } else {
                        $tabUser2->appendChild($xmlDoc->createElement(isNumeric($key2), $val2));
                    }
                }
            }
            function arrayXml($val, $tabUser, $xmlDoc, $key)
            {
                $tabUser1 = $tabUser->appendChild($xmlDoc->createElement(isNumeric($key)));
                foreach ($val as $key1 => $val1) {
                    if (is_array($val1)) {
                        arrayXmls($val1, $tabUser1, $xmlDoc, $key1);
                    } else {
                        $tabUser1->appendChild($xmlDoc->createElement(isNumeric($key1), $val1));
                    }
                }
            }
            function createXML($data, $dataset)
            {
                $xmlDoc = new DOMDocument();
                $root = $xmlDoc->appendChild($xmlDoc->createElement('root'));
                foreach ($data as $results) {
                    $tabUser = $root->appendChild($xmlDoc->createElement($dataset));
                    foreach ($results as $key => $val) {
                        if (is_array($val)) {
                            arrayXml($val, $tabUser, $xmlDoc, $key);
                        } else {
                            $tabUser->appendChild($xmlDoc->createElement(isNumeric($key), $val));
                        }
                    }
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
            createXML($xmlArray, $dataset);
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
    // $data = str_replace('element', '', $data);
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
