<?php

require '../query.php';

// Declaring array variables
$array = fileData('user');
$arraypush = array(
    "users" => array()
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
$format = strtolower(getUrlData('format'));

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

// if ($gender) {
//     $data = processData($value = $gender, $type = 'gender', $array, $tmpArray, $assign = 'et');
//     if (is_array($data)) {
//         $tmpArray = $data;
//     } elseif (is_numeric($data)) {
//         $error = $data;
//     }
// }
// if ($country) {
//     $data = processData($value = $country, $type = 'country', $array, $tmpArray, $assign = 'et');
//     if (is_array($data)) {
//         $tmpArray = $data;
//     } elseif (is_numeric($data)) {
//         $error = $data;
//     }
// }
// if ($age) {
//     $data = processData($value = $age, $type = 'age', $array, $tmpArray, $assign = 'et');
//     if (is_array($data)) {
//         $tmpArray = $data;
//     } elseif (is_numeric($data)) {
//         $error = $data;
//     }
// }
// if ($minage) {
//     $data = processData($value = $minage, $type = 'age', $array, $tmpArray, $assign = 'lt');
//     if (is_array($data)) {
//         $tmpArray = $data;
//     } elseif (is_numeric($data)) {
//         $error = $data;
//     }
// }
// if ($maxage) {
//     $data = processData($value = $maxage, $type = 'age', $array, $tmpArray, $assign = 'gt');
//     if (is_array($data)) {
//         $tmpArray = $data;
//     } elseif (is_numeric($data)) {
//         $error = $data;
//     }
// }
if ($result) {
    if ($result > 2000) {
        $error = 403;
    } else {
        for ($i = 0; $i < $result; $i++) {
            if (!empty($tmpArray)) {
                if (array_key_exists($i, $tmpArray)) {
                    array_push($arraypush['users'], $tmpArray[$i]);
                }
            } else {
                array_push($arraypush['users'], $array[$i]);
            }
        }
    }
}

// Removing ID from the array
if (!empty($arraypush['users'])) {
    for ($i = 0; $i < count($arraypush['users']); $i++) {
        unset($arraypush['users'][$i]['id']);
    }
}

// Responding API
if (empty($error)) {
    if ($format == 'json' || $format == null) {
        echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    } elseif ($format == 'xml') {
        $json = json_encode($arraypush['users'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        echo jsonToXml($json, "users");
    }
} else {
    echo returnError($error, (empty($format)) ? "json" : $format);
}
