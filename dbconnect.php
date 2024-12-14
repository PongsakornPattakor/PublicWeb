<?php
$connect = mysqli_connect("localhost", "root", "", "visitors");

if (!$connect) {
    die('การเชื่อมต่อฐานข้อมูลผิดพลาด' . mysqli_connect_error($connect));
}
