<?php
    $uname=$_GET["uname"];
    $name=$_GET["name"];
    $passwd=$_GET["passwd"];
    $phone=$_GET["phone"];
    $btype=$_GET["btype"];
    $subject=$_GET["subject"];
    $address=$_GET["address"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bloodbank";
    $adhar=$_GET["adhar"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM person where adhar='$adhar'";
    $result = $conn->query($sql);
    $rows_count_value = mysqli_num_rows($result);
    if($rows_count_value!=0){
       echo "<script>if (window.confirm('adhar already registerd'))
       {
           window.location = 'index.php';
       }</script>";
       
    }else{
      $sql = "SELECT * FROM person where contact_number='$phone'";
    $result = $conn->query($sql);
    $rows_count_value = mysqli_num_rows($result);
    if($rows_count_value!=0){
       echo "<script>alert('Phone number already registered');window.location.href = 'index.php';</script>";
       echo "<script>if (window.confirm('adhar already registerd'))
       {
           window.location = 'index.php';
       }</script>";
    }
    else{
      $sql = "SELECT MAX(u_id) FROM user";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uid= $row["MAX(u_id)"]+1;

    $sql = "INSERT INTO user VALUES ('o','$btype','$passwd','$uid','$uname')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        echo "<script>if (window.confirm('Account created sucessfully'))
       {
           window.location = 'index.php';
       }</script>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     $sql = "INSERT INTO person VALUES ('$name','$uid','$address','$phone','$adhar')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

    }
    }

    
    
    $conn->close();
   
?>