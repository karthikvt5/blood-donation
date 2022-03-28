<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
    /* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
input[type=tel],password {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
input[type=password] {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
width: 50%;
margin-left: auto;
  margin-right: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    </style>
</head>
<body>
<center>
<img src="img/logo.jpg" alt="" style="width:30%;height:30%;">
<?php
 setcookie("uidc",0);
?>
<h1>Login</h1></center>
<div class="container">
  <form action="action_page_login.php" method="get">

    <label for="uname">User name</label>
    <input type="text" id="uname" name="uname">

    <label for="passwd">Password</label>
    <input type="password" id="passwd" name="passwd">

    <input type="submit" value="Submit">

  </form>
</div>

<center><h1>Sign-in</h1></center>
<div class="container">
  <form action="action_page_register.php" method="get">

    <label for="uname">User Name</label>
    <input type="text" id="uname" name="uname" required>

    <label for="lname">Name</label>
    <input type="text" id="name" name="name" required>

    <label for="lname">Password</label>
    <input type="password" id="passwd" name="passwd" required>

    <label for="phone">Contact Number</label>
    <input type="tel" id="phone" name="phone" placeholder="12345678" pattern="{10}" required>

    <label for="phone">Adhaar Number</label>
    <input type="text" id="adhar" name="adhar" pattern="[0-9]{12}" required>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" required>

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


    <label for="subject">Medical History</label>
    <textarea id="subject" name="subject" style="height:200px" required></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
</body>
</html>