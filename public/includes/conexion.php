<?php
$host = "YOURHOST"; //Localhost o 127.0.0.1 para pruebas locales
$user = "YOURUSER";
$password = "YOURPASS";
$database = "dokan";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>