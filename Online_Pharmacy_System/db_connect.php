<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'bigpharmacysystem';

// Create connection
$connect = new mysqli($host, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>