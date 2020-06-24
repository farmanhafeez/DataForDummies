<?php

$error = json_decode(file_get_contents('../error.json'), true);
$data = file_get_contents('user.json');
$array = json_decode($data, true);
$arraypush = array(
    "users" => array()
);
$len = 2000;
$id = array();

$result = isset($_GET['result']) ? $_GET['result'] : null;
$gender = isset($_GET['gender']) ? $_GET['gender'] : null;
$country = isset($_GET['country']) ? $_GET['country'] : null;
$minage = isset($_GET['minage']) ? $_GET['minage'] : null;
$maxage = isset($_GET['maxage']) ? $_GET['maxage'] : null;

if ($result > 2000) {
    echo json_encode(array("error" => "Something went wrong!"));
} elseif ($result) {
    for ($i = 0; $i < $result; $i++) {
        if (in_array($array[$i]['id'], $id)) {
            $i--;
        } else {
            array_push($id, $array[$i]['id']);
            array_push($arraypush['users'], $array[$i]);
        }
    }
} elseif ($gender) {
    for ($i = 0; $i < $len; $i++) {
        if ($gender == $array[$i]['gender']) {
            if (in_array($array[$i]['id'], $id)) {
                $i--;
            } else {
                array_push($id, $array[$i]['id']);
                array_push($arraypush['users'], $array[$i]);
            }
        }
    }
} elseif ($country) {
    for ($i = 0; $i < $len; $i++) {
        if ($country == $array[$i]['country']) {
            if (!in_array($array[$i]['id'], $id)) {
                array_push($id, $array[$i]['id']);
                array_push($arraypush['users'], $array[$i]);
            }
        }
    }
} elseif ($minage && $maxage) {
    for ($i = 0; $i < $len; $i++) {
        if ($minage < $array[$i]['age'] && $maxage > $array[$i]['age']) {
            array_push($arraypush, $array[$i]);
        }
    }
} else {
    for ($i = 0; $i < $len; $i++) {
        array_push($arraypush, $array[$i]);
    }
}

// Remove ID from the array
for ($i = 0; $i < count($arraypush['users']); $i++) {
    unset($arraypush['users'][$i]['id']);
}

shuffle($arraypush['users']);

echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// for ($i = 0; $i < $len; $i++) {
//     if (in_array($array[$i]['country'], $arraypush)) {
//         continue;
//     }
//     array_push($arraypush, $array[$i]['country']);
// }

// echo json_encode($arraypush);
