<!-- Buat agar koneksinya 1 dalam sebuah file koneksi.php -->

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_film";

$koneksi = new mysqli($hostname, $username, $password, $database);
?>