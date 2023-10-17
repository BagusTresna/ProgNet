<?php

$db = 'db_2205551011';
$server = 'prognet.localnet';
$username = '2205551011';
$password = '2205551011';

$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    die('Koneksi gagal!' . mysqli_connect_error());
}