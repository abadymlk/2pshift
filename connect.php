<?php
// Database connection
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'connect';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $mobile_number = $_POST['mobile_number'];
    $current_shift = $_POST['current_shift'];
    $required_shift = $_POST['required_shift'];
    $switch_period = $_POST['switch_period'];
    $switch_period2 = $_POST['switch_period2'];

    // Insert data into database
    $sql = "INSERT INTO shift_requests (name, mobile_number, current_shift, required_shift, switch_period, switch_period2)
            VALUES ('$name', '$mobile_number', '$current_shift', '$required_shift', '$switch_period', '$switch_period2')";

    if ($conn->query($sql) === TRUE) {
        echo "Shift change request submitted successfully.";
        header("Location: done.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>