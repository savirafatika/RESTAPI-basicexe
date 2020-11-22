<?php

$data = file_get_contents('coba.json');
$mhs = json_decode($data, true);

var_dump($mhs);
echo $mhs[0]["pembimbing"]["pembimbing1"];
