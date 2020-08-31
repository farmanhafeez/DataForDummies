<?php

require '../query.php';

// Variables declaration
$array = fileData('car');
$arraypush = array(
    "car" => array()
);
$tmpArray = array();
$param = array("model", "company", "year");
$error = '';

// Getting value from the URl
$result = isset($_GET['result']) ? $_GET['result'] : 1;
$model = getUrlData('model');
$company = getUrlData('company');
$year = getUrlData('year');
$format = getUrlData('format');

// Data processing
for ($i = 0; $i < count($param); $i++) {
    if (!empty(${$param[$i]})) {
        $type = ($param[$i] == 'model') ? 'car_name' : (($param[$i] == 'company') ? 'car_maker' : 'production_year');
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
                    array_push($arraypush['car'], $tmpArray[$i]);
                }
            } else {
                array_push($arraypush['car'], $array[$i]);
            }
        }
    }
}

// Removing ID from the array
if (!empty($arraypush['car'])) {
    for ($i = 0; $i < count($arraypush['car']); $i++) {
        unset($arraypush['car'][$i]['id']);
    }
}

// Responding API
if (empty($error)) {
    if ($format == 'json' || $format == null) {
        header("Content-type: application/json", true, 200);
        echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    } elseif ($format == 'xml') {
        header("Content-type: application/xml", true, 200);
        $json = json_encode($arraypush['car'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        echo jsonToXml($json, "car");
    }
} else {
    echo returnError($error, (empty($format)) ? "json" : $format);
}
