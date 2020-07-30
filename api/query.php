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

function jsonToXml($array)
{
    $json = json_decode($array);
    $xmlDoc = new DOMDocument('1.0', 'UTF-8');
    $root = $xmlDoc->appendChild($xmlDoc->createElement('root'));
    $t = function ($v) {
        $type = gettype($v);
        switch ($type) {
            case 'integer':
                return 'number';
            case 'double':
                return 'number';
            default:
                return strtolower($type);
        }
    };
    $f = function ($f, $root, $json, $s = false) use ($t, $xmlDoc) {
        $root->setAttribute('type', $t($json));
        if ($t($json) != 'array' && $t($json) != 'object') {
            if ($t($json) == 'boolean') {
                $root->appendChild($xmlDoc->createTextNode($json ? 'true' : 'false'));
            } else {
                $root->appendChild($xmlDoc->createTextNode($json));
            }
        } else {
            foreach ($json as $k => $v) {
                if ($k == '__type' && $t($json) == 'object') {
                    // $root->setAttribute('__type', $v);
                } else {
                    if ($t($v) == 'object') {
                        $ch = $root->appendChild($xmlDoc->createElementNS(null, $s ? 'item' : $k));
                        $f($f, $ch, $v, false);
                    } else if ($t($v) == 'array') {
                        $ch = $root->appendChild($xmlDoc->createElementNS(null, $s ? 'item' : $k));
                        $f($f, $ch, $v, true);
                    } else {
                        $va = $xmlDoc->createElementNS(null, $s ? 'item' : $k);
                        if ($t($v) == 'boolean') {
                            $va->appendChild($xmlDoc->createTextNode($v ? 'true' : 'false'));
                        } else {
                            $va->appendChild($xmlDoc->createTextNode($v));
                        }
                        $ch = $root->appendChild($va);
                        // $ch->setAttribute('type', $t($v));
                    }
                }
            }
        }
    };
    $f($f, $root, $json, $t($json) == 'array');
    $xmlDoc->formatOutput = true;
    return $xmlDoc->saveXML();
}

function returnError()
{
    $error = array("status" => "error", "message" => "something went wrong!");
    $error = json_encode($error, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    return $error;
}
