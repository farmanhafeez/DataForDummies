<?php

$data = file_get_contents('student.json');
$array = json_decode($data, true);
shuffle($array);
$arraypush = array(
    "student" => array()
);

$result = isset($_GET['result']) ? $_GET['result'] : null;
$gender = isset($_GET['gender']) ? $_GET['gender'] : null;
$country = isset($_GET['country']) ? $_GET['country'] : null;
$department = isset($_GET['department']) ? $_GET['department'] : null;
$minage = isset($_GET['minage']) ? $_GET['minage'] : null;
$maxage = isset($_GET['maxage']) ? $_GET['maxage'] : null;
$mincgpa = isset($_GET['mincgpa']) ? $_GET['mincgpa'] : null;
$maxcgpa = isset($_GET['maxcgpa']) ? $_GET['maxcgpa'] : null;

if ($result > 2000) {
    echo json_encode(array("error" => "Something went wrong!"));
} elseif ($result) {
    for ($i = 0; $i < $result; $i++) {
        array_push($arraypush['student'], $array[$i]);
    }
} elseif ($gender) {
    for ($i = 0; $i < count($array); $i++) {
        if ($gender == $array[$i]['gender']) {
            array_push($arraypush['student'], $array[$i]);
        }
    }
} elseif ($country) {
    for ($i = 0; $i < count($array); $i++) {
        if ($country == $array[$i]['country']) {
            array_push($arraypush['student'], $array[$i]);
        }
    }
} elseif ($department) {
    for ($i = 0; $i < count($array); $i++) {
        if ($department == $array[$i]['department']) {
            array_push($arraypush['student'], $array[$i]);
        }
    }
} elseif ($minage && $maxage) {
    for ($i = 0; $i < count($array); $i++) {
        if ($minage < $array[$i]['age'] && $maxage > $array[$i]['age']) {
            array_push($arraypush['student'], $array[$i]);
        }
    }
} elseif ($mincgpa && $maxcgpa) {
    for ($i = 0; $i < count($array); $i++) {
        if ($mincgpa < $array[$i]['cgpa'] && $maxcgpa > $array[$i]['cgpa']) {
            array_push($arraypush['student'], $array[$i]);
        }
    }
} else {
    for ($i = 0; $i < count($array); $i++) {
        array_push($arraypush['student'], $array[$i]);
    }
}

// Remove ID from the array
for ($i = 0; $i < count($arraypush['student']); $i++) {
    unset($arraypush['student'][$i]['id']);
}

echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
