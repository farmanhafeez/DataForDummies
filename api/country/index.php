<?php

require '../query.php';

// Variables declaration
$array = json_decode(file_get_contents('country.json'), true);
shuffle($array);
$arraypush = array(
    "country" => array()
);
$tmpArray = array();
$param = array("capital", "country", "region");
$error = '';

// Getting value from the URl
$result = isset($_GET['result']) ? $_GET['result'] : 1;
$capital = getUrlData('capital');
$country = getUrlData('country');
$region = getUrlData('region');
$format = getUrlData('format');

// Data processing
for ($i = 0; $i < count($param); $i++) {
    if (!empty(${$param[$i]})) {
        $type = ($param[$i] == 'country') ? 'name' : $param[$i];
        $data = processData($value = ${$param[$i]}, $type, $array, $tmpArray, $assign = 'et');
        if (is_array($data)) {
            $tmpArray = $data;
        } elseif (is_numeric($data)) {
            $error = $data;
        }
    } else {
        continue;
    }
}
if ($result) {
    if ($result > 2000) {
        $error = 403;
    } else {
        for ($i = 0; $i < $result; $i++) {
            if (!empty($tmpArray)) {
                if (array_key_exists($i, $tmpArray)) {
                    array_push($arraypush['country'], $tmpArray[$i]);
                }
            } else {
                array_push($arraypush['country'], $array[$i]);
            }
        }
    }
}

// Responding API
if (empty($error)) {
    if ($format == 'json' || $format == null) {
        header("Content-type: application/json", true, 200);
        echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    } elseif ($format == 'xml') {
        header("Content-type: application/xml", true, 200);
        $json = json_encode($arraypush['country'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        echo jsonToXml($json, "country");
    }
} else {
    echo returnError($error, (empty($format)) ? "json" : $format);
}
