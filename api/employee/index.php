<?php

require '../query.php';

// Variables declaration
$array = fileData('employee');
$arraypush = array(
    "employee" => array()
);
$tmpArray = array();
$param = array("gender", "country", "age", "minage", "maxage");
$error = '';

// Getting value from the URl
$result = isset($_GET['result']) ? $_GET['result'] : 1;
$gender = getUrlData('gender');
$country = getUrlData('country');
$age = getUrlData('age');
$minage = getUrlData('minage');
$maxage = getUrlData('maxage');
$format = getUrlData('format');

// Data processing
for ($i = 0; $i < count($param); $i++) {
    if (!empty(${$param[$i]})) {
        $type = ($param[$i] == 'minage' || $param[$i] == 'maxage') ? 'age' : $param[$i];
        $assign = ($param[$i] == 'minage') ? 'lt' : (($param[$i] == 'maxage') ? 'gt' : 'et');
        $data = processData($value = ${$param[$i]}, $type, $array, $tmpArray, $assign);
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
                    array_push($arraypush['employee'], $tmpArray[$i]);
                }
            } else {
                array_push($arraypush['employee'], $array[$i]);
            }
        }
    }
}

// Removing ID from the array
if (!empty($arraypush['employee'])) {
    for ($i = 0; $i < count($arraypush['employee']); $i++) {
        unset($arraypush['employee'][$i]['id']);
    }
}

// Responding API
if (empty($error)) {
    if ($format == 'json' || $format == null) {
        header("Content-type: application/json", true, 200);
        echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    } elseif ($format == 'xml') {
        header("Content-type: application/xml", true, 200);
        $json = json_encode($arraypush['employee'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        echo jsonToXml($json, "employee");
    }
} else {
    echo returnError($error, (empty($format)) ? "json" : $format);
}
