<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "project1";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn -> connect_error) {
	die("Connection failed: " . $conn -> connect_error);
}
?>