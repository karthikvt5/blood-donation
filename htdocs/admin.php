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
</style>
</head>
<body>

<div class="topnav">
  <a href="">ADMIN</a>
  <a href="index.php">logout</a>
</div>
<center><h1>Donations</h1></center>
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

$sql = "SELECT * FROM doner";
$result = $conn->query($sql);
?>
<table style="width:100%">
<tr>
    <th>u_id</th>
    <th>don_id</th>
    <th>edit</th>
  </tr>
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <form action="delete_rec.php" method="GET">
    <td><?php echo $row["u_id"]  ?></td>
    <td><input type="text" id="donatio_id" name="donatio_id" value=<?php echo $row["donatio_id"]  ?> readonly="readonly"> </input></td>
    <td><input type="submit" id="" value="delete"></td>
    </form>
  </tr>
    <?php
  }
} else {
  echo "0 results";
}
?>
<?php
$conn->close();
?></table>

<center><h1>History</h1></center>
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

$sql = "SELECT * FROM history";
$result = $conn->query($sql);
?>
<table style="width:100%">
<tr>
    <th>from</th>
    <th>to</th>
    <th>Blood Type</th>
  </tr>
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td><?php echo $row["from1"]  ?></td>
    <td><?php echo $row["to1"]  ?></td>
    <td><?php echo $row["bloodtype"]  ?></td>

  </tr>
    <?php
  }
} else {
  echo "0 results";
}
?>
<?php
$conn->close();
?></table>

</body>
</html>