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

// Check if delete request was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_request'])) {
    // Retrieve ID of record to delete
    $delete_id = $_POST['delete_request'];

    // SQL to delete record
    $sql_delete = "DELETE FROM shift_requests WHERE id = $delete_id";
    
    if ($conn->query($sql_delete) === TRUE) {
        echo "Shift change request deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Retrieve shift change requests from the database
$sql = "SELECT * FROM shift_requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shift Switch Request - Supervisor Form</title>
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
            width: 1000px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #CCC;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #FFC107;
            color: #FFF;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #FFC107;
            color: #FFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
<h1>نموذج طلبات تغيير الشفت - قسم المشرفين</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Current Shift</th>
            <th>Desired Shift</th>
            <th>Current Time</th>
            <th>Desired Time</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["mobile_number"] . "</td>";
                echo "<td>" . $row["current_shift"] . "</td>";
                echo "<td>" . $row["required_shift"] . "</td>";
                echo "<td>" . $row["switch_period"] . "</td>";
                echo "<td>" . $row["switch_period2"] . "</td>";
                echo "<td><input type='submit' name='delete_request' value='" . $row["id"] . "' /></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No shift change requests.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</form>
</body>
</html>

<?php
$conn->close();
?>
