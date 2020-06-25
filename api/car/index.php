<?php

$data = file_get_contents('car.json');
$array = json_decode($data, true);
shuffle($array);
$arraypush = array(
    "cars" => array()
);

$result = isset($_GET['result']) ? $_GET['result'] : null;
$model = isset($_GET['model']) ? $_GET['model'] : null;
$company = isset($_GET['company']) ? $_GET['company'] : null;

if ($result > 2000) {
    echo json_encode(array("error" => "Something went wrong!"));
} elseif ($result) {
    for ($i = 0; $i < $result; $i++) {
        array_push($arraypush['cars'], $array[$i]);
    }
} elseif ($model) {
    for ($i = 0; $i < count($array); $i++) {
        if ($model == $array[$i]['car_name']) {
            array_push($arraypush['cars'], $array[$i]);
        }
    }
} elseif ($company) {
    for ($i = 0; $i < count($array); $i++) {
        if ($company == $array[$i]['car_maker']) {
            array_push($arraypush['cars'], $array[$i]);
        }
    }
} else {
    for ($i = 0; $i < count($array); $i++) {
        array_push($arraypush['cars'], $array[$i]);
    }
}

// Remove ID from the array
for ($i = 0; $i < count($arraypush['cars']); $i++) {
    unset($arraypush['cars'][$i]['id']);
}

echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
