<?php
    include("login.php");
    if(isset($_POST['submit']))
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "select * from login where username = '$username' and passwoed '$password'" ;
    $result = mysql_query($conn, $sql);
    $row = mysql_fetch_array($result , MYSQLI_ASSOC);
    $county = mysqli_num_rows($result);
        if($county == 1)
            headar("Location:C:\xampp\htdocs\pro\shift.php")
    
    else
        echo "non" 
    



    ?>