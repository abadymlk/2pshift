<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'connect';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
// Retrieve form data
// Insert data
$sql = "INSERT INTO supervisor_login (username, password) VALUES (?, ?)";
$stmt = $conn->query($sql);
$stmt->bind_param("ss", $username, $password);
if(isset($_POST['login']))
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from login where username = '$username' and passwoed '$password'" ;
$stmt = $conn->query($sql);
$stmt->close();
$conn->close();
?>