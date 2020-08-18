<?php

function fileData($file)
{
    $data = file_get_contents($file . '.json');
    $array = json_decode($data, true);
    shuffle($array);
    return $array;
}

function getUrlData($data)
{
    if (isset($_GET[$data])) {
        $data = $_GET[$data];
        $data = filter_var(trim($data), FILTER_SANITIZE_STRING);
        $data = preg_replace('/[^A-Za-z0-9\-]/', '', $data);
        $data = ucfirst(strtolower($data));
        return $data;
    } else {
        return null;
    }
}

function processData($value, $type, $array, $tmpArray, $assign)
{
    $typeArr = array();
    $tmpArray = (!empty($tmpArray)) ? $tmpArray : $array;
    for ($i = 0; $i < count($tmpArray); $i++) {
        array_push($typeArr, $tmpArray[$i][$type]);
    }
    if (in_array($value, $typeArr)) {
        $arr = array();
        for ($i = 0; $i < count($tmpArray); $i++) {
            if ($assign == 'et') {
                if ($value == $tmpArray[$i][$type]) {
                    $arr[] = $tmpArray[$i];
                }
            } elseif ($assign == 'lt') {
                if ($value <= $tmpArray[$i][$type]) {
                    $arr[] = $tmpArray[$i];
                }
            } elseif ($assign == 'gt') {
                if ($value >= $tmpArray[$i][$type]) {
                    $arr[] = $tmpArray[$i];
                }
            }
        }
        return $arr;
    } else {
        return 404;
    }
}

function jsonToXml($json, $dataset)
{
    $array = json_decode($json, true);

    $xmlDoc = new DOMDocument('1.0', 'UTF-8');
    $root = $xmlDoc->appendChild($xmlDoc->createElement('root'));
    foreach ($array as $results) {
        $tab = $root->appendChild($xmlDoc->createElement($dataset));
        $arrayXml = function ($arrayXml, $results, $tab) use ($xmlDoc) {
            foreach ($results as $key => $val) {
                $tab1 = $tab->appendChild($xmlDoc->createElementNS(null, is_numeric($key) ? 'item' : $key));
                if (is_array($val)) {
                    $arrayXml($arrayXml, $val, $tab1);
                } else {
                    $tab1->appendChild($xmlDoc->createTextNode($val));
                }
            }
        };
        $arrayXml($arrayXml, $results, $tab);
    }
    $xmlDoc->formatOutput = true;
    return $xmlDoc->saveXML();
}

function returnError($status, $format)
{
    $msg = ($status == 403) ? 'Invalid request!' : 'Data not found!';
    $error = array("status" => $status, "message" => $msg);
    $error = json_encode($error, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    if ($format == "json") {
        header('Content-type: application/json', false, $status);
        return $error;
    } elseif ($format == "xml") {
        header('Content-type: application/xml', false, $status);
        $array = json_decode($error, true);
        $xmlDoc = new DOMDocument('1.0', 'UTF-8');
        $root = $xmlDoc->appendChild($xmlDoc->createElement('root'));
        foreach ($array as $key => $val) {
            $root->appendChild($xmlDoc->createElement($key, $val));
        }
        $xmlDoc->formatOutput = true;
        return $xmlDoc->saveXML();
    }
}

// $arrayXml = function ($arrayXml, $val, $key, $tab) use ($xmlDoc) {
//     foreach ($val as $key1 => $val1) {
//         $tab1 = $tab->appendChild($xmlDoc->createElementNS(null, is_numeric($key) ? $key1 : $key));
//         if (is_array($val1)) {
//             $arrayXml($arrayXml, $val1, $key1, $tab1);
//         } else {
//             $tab1->appendChild($xmlDoc->createTextNode($val1));
//             // $tab1->appendChild($xmlDoc->createElement(is_numeric($key1) ? $key : $key1, $val1));
//         }
//     }
// };
// foreach ($array as $results) {
//     $tab = $root->appendChild($xmlDoc->createElement($dataset));
//     foreach ($results as $key => $val) {
//         if (is_array($val)) {
//             $arrayXml($arrayXml, $val, $key, $tab);
//         } else {
//             $tab->appendChild($xmlDoc->createElement(is_numeric($key) ? 'element' : $key, $val));
//         }
//     }
// }
// $xmlDoc->formatOutput = true;
// return $xmlDoc->saveXML();
