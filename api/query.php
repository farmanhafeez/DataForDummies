<?php

function fileData($file)
{
    $data = file_get_contents($file . '.json');
    $array = json_decode($data, true);
    shuffle($array);
    return $array;
}

function getUrlData($get)
{
    if (isset($_GET[$get])) {
        return $_GET[$get];
    } else {
        return null;
    }
}

function jsonToXml($json, $dataset)
{
    $array = json_decode($json, true);

    $xmlDoc = new DOMDocument('1.0', 'UTF-8');
    $root = $xmlDoc->appendChild($xmlDoc->createElement('root'));
    $arrayXml = function ($arrayXml, $val, $key, $tab) use ($xmlDoc) {
        $tab1 = $tab->appendChild($xmlDoc->createElement(is_numeric($key) ? 'element' : $key));
        foreach ($val as $key1 => $val1) {
            if (is_array($val1)) {
                $arrayXml($arrayXml, $val1, $key1, $tab1);
            } else {
                $tab1->appendChild($xmlDoc->createElement(is_numeric($key1) ? 'element' : $key1, $val1));
            }
        }
    };
    foreach ($array as $results) {
        $tab = $root->appendChild($xmlDoc->createElement($dataset));
        foreach ($results as $key => $val) {
            if (is_array($val)) {
                $arrayXml($arrayXml, $val, $key, $tab);
            } else {
                $tab->appendChild($xmlDoc->createElement(is_numeric($key) ? 'element' : $key, $val));
            }
        }
    }
    $xmlDoc->formatOutput = true;
    return $xmlDoc->saveXML();

    // $xmlDoc = new DOMDocument('1.0', 'UTF-8');
    // $root = $xmlDoc->appendChild($xmlDoc->createElement('root'));
    // $f = function ($f, $root, $json) use ($xmlDoc, $dataset) {
    //     // $root->setAttribute('type', $t($json));
    //     // $tab = $root->appendChild($xmlDoc->createElement($dataset));
    //     foreach ($json as $k => $v) {
    //         if (gettype($v) == 'array') {
    //             $ch = $xmlDoc->createElementNS(null, is_numeric($k) ? 'item' : $k);
    //             $ch = $root->appendChild($ch);
    //             $f($f, $ch, $v);
    //         } else {
    //             $va = $xmlDoc->createElementNS(null, is_numeric($k) ? 'item' : $k);
    //             $va->appendChild($xmlDoc->createTextNode($v));
    //             $ch = $root->appendChild($va);
    //             // $ch->setAttribute('type', $t($v));
    //         }
    //     }
    // };
    // $f($f, $root, $json);
    // $xmlDoc->formatOutput = true;
    // return $xmlDoc->saveXML();
}

function returnError()
{
    $error = array("status" => "error", "message" => "something went wrong!");
    $error = json_encode($error, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    return $error;
}
