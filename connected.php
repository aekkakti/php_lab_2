<?php
global $conn;
$host = 'localhost';
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
