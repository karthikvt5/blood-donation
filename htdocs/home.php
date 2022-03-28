
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    text-align: left;
  padding: 2px 16px;
}
table {
  width: 100%;
}
</style>
</head>
<body>

<div class="topnav">
  <a href="">Home</a>
  <a href="index.php">logout</a>
</div>


<?php
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
?>

<br>
<table>
<tr>
<th style="background-color:powderblue;">
<center>Your Appointments.<center>

</th>
<th style="background-color:teal;">
<center>Your Request.<center>
</th></tr>
<tr>
<td style="background-color:teal;">
<?php
$uid=$_COOKIE["uidc"];
$sql = "SELECT * FROM doner where u_id='$uid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "you have appointment to donate on ".$row["d_date"];
}
}else {
    echo $uid;
    echo "0 results";
  }

    ?>
</td>
<td style="background-color:powderblue;">
<center><?php

$sql = "SELECT * FROM recipent where u_id='$uid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Your request for ".$row["blood_type"]." : ".$row["status"]."."; ?><br><?php
  }
}else {
    echo $uid;
    echo "0 results";
  }
?>
<br>
<br>
<form action="request.php" method="get">
    <label for="btype">Blood type:</label>
    <select id="btype" name="btype">
    <option value="a+">A+</option>
    <option value="a-">A-</option>
    <option value="b+">B+</option>
    <option value="b-">B-</option>
    <option value="o+">O+</option>
    <option value="o-">O-</option>
    <option value="ab+">AB+</option>
    <option value="ab-">AB-</option>
  </select>
    <input type="submit" value="Request">

  </form>
<center>

</td></tr>
</table>


<center><h1>Blood Donor in need.</h1></center>
<?php
$sql = "SELECT * FROM recipent";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $a=$row["u_id"];
    $sql = "SELECT * FROM person where u_id=$a";
    $result2 = $conn->query($sql);
    $row2 = $result2->fetch_assoc();
    ?>
    <br><center>
<div class="card">
  <div class="container" >
    <h4><b><h3 style="color:red;">recipent name: </h3><?php echo $row2["name"] ?> </b></h4> 
    <h4><b><h3 style="color:red;">recipent address: </h3><?php echo $row2["address"] ?> </b></h4> 
    <h4><b><h3 style="color:red;">recipent contact number:</h3><?php echo $row2["contact_number"] ?> </b></h4> 
    <p><h3 style="color:red;">Blood Type: </h3><?php echo $row["blood_type"] ?></p> 
    <form action="appointment.php" method="GET">
    <td><h3 style="color:red;">D_id:</h3><input type="text" id="did" name="did" readonly="readonly" value= <?php echo $row["don_id"] ?>> </input></td><br><br>
   (Please select date)<br><input type="date" id="ddate" name="ddate">
    <td><input type="submit" id="" value="I want to donate"></td>
  </div>
</div>
<br></center>
    <?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>