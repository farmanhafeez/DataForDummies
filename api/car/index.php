<?php

$data = file_get_contents('user.json');
$array = json_decode($data, true);
shuffle($array);
$arraypush = array(
    "users" => array()
);

$result = isset($_GET['result']) ? $_GET['result'] : null;
$gender = isset($_GET['gender']) ? $_GET['gender'] : null;
$country = isset($_GET['country']) ? $_GET['country'] : null;
$minage = isset($_GET['minage']) ? $_GET['minage'] : null;
$maxage = isset($_GET['maxage']) ? $_GET['maxage'] : null;

if ($result > 2000) {
    echo json_encode(array("error" => "Something went wrong!"));
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
for ($i = 0; $i < count($arraypush['users']); $i++) {
    unset($arraypush['users'][$i]['id']);
}

echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// for ($i = 0; $i < count($array); $i++) {
//     if (in_array($array[$i]['country'], $arraypush['users'])) {
//         continue;
//     }
//     array_push($arraypush['users'], $array[$i]['country']);
// }

// echo json_encode($arraypush['users']);
