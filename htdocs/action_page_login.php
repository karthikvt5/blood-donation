<?php
    $uname=$_GET["uname"];
    $passwd=$_GET["passwd"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bloodbank";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

     $sql = "SELECT u_id,user_type FROM user WHERE uname = '$uname' and password = '$passwd'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        $uid= $row["u_id"];
        setcookie("uidc",$uid);
        
        $utype=$row["user_type"];
        if($utype=="a"){
            $conn->close();
            header("location: admin.php");
        }else{
            $conn->close();
            header("location: home.php");
        }
       
      }else {
        echo "Your Login Name or Password is invalid";
        $conn->close();
        header('Location: /index.php');
      }
    
?>