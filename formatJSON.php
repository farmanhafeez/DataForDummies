<?php

$data = 'B.Sc';

$data = ucfirst(strtolower($data));
$data = str_replace(".", " ", $data);
$explode = explode(" ", $data);
$explode[1] = ucfirst($explode[1]);

echo $explode[1];
