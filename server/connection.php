<?php
// Step 1: Connect to the database
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "php_project"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>