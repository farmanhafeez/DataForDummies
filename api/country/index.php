<?php

$data = file_get_contents('country.json');
$array = json_decode($data, true);
$arraypush = array(
    "country" => array()
);

$capital = isset($_GET['capital']) ? $_GET['capital'] : null;
$country = isset($_GET['country']) ? $_GET['country'] : null;
$region = isset($_GET['region']) ? $_GET['region'] : null;

if ($capital) {
    for ($i = 0; $i < count($array); $i++) {
        if ($capital == $array[$i]['capital']) {
            array_push($arraypush['country'], $array[$i]);
        }
    }
} elseif ($country) {
    for ($i = 0; $i < count($array); $i++) {
        if ($country == $array[$i]['name']) {
            array_push($arraypush['country'], $array[$i]);
        }
    }
} elseif ($region) {
    for ($i = 0; $i < count($array); $i++) {
        if ($region == $array[$i]['region']) {
            array_push($arraypush['country'], $array[$i]);
        }
    }
} else {
    for ($i = 0; $i < count($array); $i++) {
        array_push($arraypush['country'], $array[$i]);
    }
}

echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
