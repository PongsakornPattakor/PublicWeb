<?php
$servername = "localhost";
$username = "mmduzuji_PongsakornAdmin";
$password = "Prime-Lord09";
$dbname = "mmduzuji_Pongsakorn";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die('การเชื่อมต่อฐานข้อมูลผิดพลาด' . mysqli_connect_error($connect));
}
