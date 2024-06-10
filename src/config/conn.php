<?php

$host = "localhost";
$username = "mci";
$password = "mcipassword";
$database = "learn_mci_app_inventori";

// koneksi ke database
$connection = new mysqli($host, $username, $password, $database);

// cek koneksi database
if ($connection->connect_errno) {
    echo "Gagal terkoneksi ke database: " . $connection->connect_error;
    exit();
}
