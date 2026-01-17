<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "db_penjualan2";

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error){
    die("Koneksi gagal : " . $conn->connect_error);
}

?>