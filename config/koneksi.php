<?php

$db = 'prognet';
$server = 'localhost';
$username = 'root';
$password = '';

$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    die('Koneksi gagal!' . mysqli_connect_error());
}