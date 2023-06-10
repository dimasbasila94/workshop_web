<?php
$host = "localhost";
$username = "workshop";
$password = "2023Workshop!";
$database = "workshop_web";
// Create connection
$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
