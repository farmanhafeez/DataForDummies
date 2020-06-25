<?php

$data = file_get_contents('course.json');
$array = json_decode($data, true);
shuffle($array);
$arraypush = array(
    "course" => array()
);

$result = isset($_GET['result']) ? $_GET['result'] : null;
$department = isset($_GET['department']) ? $_GET['department'] : null;

if ($result > 2000) {
    echo json_encode(array("error" => "Something went wrong!"));
} elseif ($result) {
    for ($i = 0; $i < $result; $i++) {
        array_push($arraypush['course'], $array[$i]);
    }
} elseif ($department) {
    for ($i = 0; $i < count($array); $i++) {
        if ($department == $array[$i]['department_abr']) {
            array_push($arraypush['course'], $array[$i]);
        }
    }
} else {
    for ($i = 0; $i < count($array); $i++) {
        array_push($arraypush['course'], $array[$i]);
    }
}

// Remove ID from the array
for ($i = 0; $i < count($arraypush['course']); $i++) {
    unset($arraypush['course'][$i]['id']);
}

echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
