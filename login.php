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
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id FROM supervisor_login WHERE username = ? AND password = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $username, $password);

    // Execute statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($id);

    // Fetch the result
    if ($stmt->fetch()) {
        // Successful login
        header("Location: shift.php");
        exit();
    } else {
        // Unsuccessful login
        echo "Invalid username or password.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #FFC107;
        color: #333;
      }
      h1 {
        color: #333;
        text-align: center;
      }
      form {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        background-color: #FFF;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
      }
      label {
        display: block;
        margin-top: 20px;
      }
      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 2px solid #CCC;
        border-radius: 5px;
        box-sizing: border-box;
        text-align: center;
      }
      input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #FFC107;
        color: #FFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
      }
      input[type="submit"]:hover {
        background-color: #FFA000;
      }
      img {
        display: block;
        margin: 20px auto;
        width: 200px;
        height: 200px;
        vertical-align: middle;
      }
    </style>
</head>
<body>
    <img src="2p.jpg" alt="Logo">
    <h1>دخول المشرفين</h1>
    <form action="/login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
        <h3>تم تصميم المنصة من قبل عبدالله العمري</h3>
        <form action="login2.php" method="post">
    </form>
</body>
</html>
