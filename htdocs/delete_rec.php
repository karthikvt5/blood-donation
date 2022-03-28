<?php
    $doid=1;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bloodbank";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT u_id FROM doner where donatio_id='$doid'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $u_id = $row["u_id"];
    
    $sql = "SELECT name FROM person where u_id='$u_id'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $from =  $row["name"];


    $sql = "SELECT u_id FROM recipent where don_id='$doid'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $u_id = $row["u_id"];

    $sql = "SELECT blood_type FROM recipent where don_id='$doid'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $type = $row["blood_type"];
    
    $sql = "SELECT name FROM person where u_id='$u_id'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $to = $row["name"];
    echo $type;

    $sql = "INSERT INTO history Values('$from','$to','$type');";
    $result = mysqli_query($conn,$sql);
    header('Location: /admin.php');

    
    $sql = "DELETE FROM doner where donatio_id='$doid'";
    $result = mysqli_query($conn,$sql);
    
    $sql = "DELETE FROM recipent where don_id='$doid'";
    $result = mysqli_query($conn,$sql);

    
?>