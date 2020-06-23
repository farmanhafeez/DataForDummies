<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api/?results=5000");

$output = curl_exec($ch);

curl_close($ch);

$array = json_decode($output, true);
echo $output;
