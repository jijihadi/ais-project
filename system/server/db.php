<?php
// make php connection to mysql db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_consent_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
