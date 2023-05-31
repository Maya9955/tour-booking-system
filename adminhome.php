<?php 
session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="dream.css">
<style>
a:link, a:visited {
  background-color: black;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 margin: auto;
  
}

a:hover, a:active {
  background-color: red;
}
body {
  font-family: Arial;
  color: white;
}

* {
  box-sizing: border-box;
}


.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 600px; 
}


.row:after {
  content: "";
  display: table;
  clear: both;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.left{
    position: absolute;
  top: 50%;
  left: 15%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.right{
    position: absolute;
  top: 50%;
  right: 5%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.centered img {
  width: 150px;
  border-radius: 50%;
}
  </style>
</head>
<body>
<nav class="navbar">
    <ul class="bar">
    <li style="float:right"><a href="adminlogin.php">Log Out</a></li>
    <li style="float:right"><a href="adminhome.php">Home</a></li>
    </ul>
</nav>
<div class="row">
  <div class="column" style="background-color:#696969	;">
  <div class="left">
<a href="adminpackage.php" target="_blank">Manage Package</a>
</div>
</div>



<div class="column" style="background-color:gray;">
  <div class="centered">
<a href="adminusers.php" target="_blank">Manage Users</a>
</div>
</div>


<div class="column" style="background-color:#696969	;">
  <div class="right">
<a href="adminbooking.php" target="_blank">Manage Booking</a>
</div>
</div>
 

</body>
</html>