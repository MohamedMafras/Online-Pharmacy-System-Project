<?php
$host = '127.0.0.1:3306';
$username = 'root';
$password = 'mariadb';
$database = 'bigpharmacysystem';

// Create connection
$connect = new mysqli($host, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>