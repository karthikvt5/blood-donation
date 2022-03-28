<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";
$did=$_GET["did"];
$ddate=$_GET["ddate"];
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

    $sql = "INSERT INTO doner VALUES ('$uid','-','0','$ddate','$did')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     $status="Donation Recived";
     $sql = "UPDATE recipent SET status='$status' WHERE don_id='$did'";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

    $conn->close();
    header('Location: /home.php');
?>