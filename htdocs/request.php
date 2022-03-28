<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";
    $btype=$_GET["btype"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $status="not available";
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $uid= $_COOKIE["uidc"];
    $sql = "SELECT MAX(don_id) FROM recipent";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $doid= $row["MAX(don_id)"]+1;

    $sql = "INSERT INTO recipent VALUES ('$uid','o','$btype','$status','$doid')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
    $conn->close();
    header('Location: /home.php');
?>