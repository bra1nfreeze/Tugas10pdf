<?php

$servername = "localhost"; //host server
$username = "root"; //user login phpMyAdmin
$password = ""; //pass login phpMyAdmin
$dbname = "db_siswa"; //nama database
$koneksi = mysqli_connect($servername, $username, $password, $dbname) or die("Koneksi gagal");
