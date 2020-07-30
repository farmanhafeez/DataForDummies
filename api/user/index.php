<?php

require '../query.php';

$array = fileData('user');
$arraypush = array(
    "users" => array()
);
$error = 0;

$result = getUrlData('result');
$gender = getUrlData('gender');
$country = getUrlData('country');
$minage = getUrlData('minage');
$maxage = getUrlData('maxage');
$format = isset($_GET['format']) ? $_GET['format'] : null;

if ($result > 2000) {
    $error += 1;
    echo returnError();
} elseif ($result) {
    for ($i = 0; $i < $result; $i++) {
        array_push($arraypush['users'], $array[$i]);
    }
} elseif ($gender) {
    for ($i = 0; $i < count($array); $i++) {
        if ($gender == $array[$i]['gender']) {
            array_push($arraypush['users'], $array[$i]);
        }
    }
} elseif ($country) {
    for ($i = 0; $i < count($array); $i++) {
        if ($country == $array[$i]['country']) {
            array_push($arraypush['users'], $array[$i]);
        }
    }
} elseif ($minage && $maxage) {
    for ($i = 0; $i < count($array); $i++) {
        if ($minage < $array[$i]['age'] && $maxage > $array[$i]['age']) {
            array_push($arraypush['users'], $array[$i]);
        }
    }
} else {
    for ($i = 0; $i < count($array); $i++) {
        array_push($arraypush['users'], $array[$i]);
    }
}

// Remove ID from the array
if (!empty($arraypush['users'])) {
    for ($i = 0; $i < count($arraypush['users']); $i++) {
        unset($arraypush['users'][$i]['id']);
    }
}
if (!empty($xmlArray)) {
    for ($i = 0; $i < count($xmlArray); $i++) {
        unset($xmlArray[$i]['id']);
    }
}

if ($error == 0) {
    if ($format == 'json' || $format == null) {
        echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    } elseif ($format == 'xml') {
        echo jsonToXml(json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }
}
