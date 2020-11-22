<?php

// $mhs = [
//    [
//       "nama" => "savira Fatika",
//       "nim" => "17.12.0115",
//       "email" => "savira.fatika@students.amikom.ac.id"
//    ],
//    [
//       "nama" => "Diah Indri A",
//       "nim" => "17.12.0116",
//       "email" => "diah.20@students.amikom.ac.id"
//    ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=phpmvc', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mhs = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mhs);
echo $data;
