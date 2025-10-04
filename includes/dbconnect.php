<?php
$servername = "localhost";  // your database host
$username = "u662685575_public";         // your database username
$password = "Rahulpachori@12345";             // your database password
$dbname = "u662685575_public";     // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
