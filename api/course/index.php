<?php

require '../query.php';

// Variables declaration
$array = fileData('course');
$arraypush = array(
    "course" => array()
);
$tmpArray = array();
$param = array("course", "department");
$error = '';

// Getting value from the URl
$result = isset($_GET['result']) ? $_GET['result'] : 1;
$course = isset($_GET['course']) ? trim($_GET['course']) : null;
$department = strtoupper(getUrlData('department'));
$format = strtolower(getUrlData('format'));

// Data processing
for ($i = 0; $i < count($param); $i++) {
    if (!empty(${$param[$i]})) {
        $type = ($param[$i] == 'course') ? 'course_abr' : 'department_abr';
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
                    array_push($arraypush['course'], $tmpArray[$i]);
                }
            } else {
                array_push($arraypush['course'], $array[$i]);
            }
        }
    }
}

// Removing ID from the array
if (!empty($arraypush['course'])) {
    for ($i = 0; $i < count($arraypush['course']); $i++) {
        unset($arraypush['course'][$i]['id']);
    }
}

// Responding API
if (empty($error)) {
    if ($format == 'json' || $format == null) {
        header("Content-type: application/json", true, 200);
        echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    } elseif ($format == 'xml') {
        header("Content-type: application/xml", true, 200);
        $json = json_encode($arraypush['course'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        echo jsonToXml($json, "course");
    }
} else {
    echo returnError($error, (empty($format)) ? "json" : $format);
}
