<?php
$servername = "localhost";
$username = "newuser";
$password = "password";
$dbname = "icunit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>