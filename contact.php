<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dream.css">
    <style>
      body{
  background-image: url('images/form.jpg');
  max-width:100%;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
      }
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

h1{
  color: black;
  text-align: center;
  text-shadow:2px 2px gray;
}
.center {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
  width: fit-content;
  margin-left: 40%;
  margin-top: 5%;
}
.btn{
    background-color: black;
    padding: 12px 28px;
    border-radius: 12px;
    transition-duration: 0.4s;
    color: white;
}
.btn:hover {
  background-color: gray;
  color: black;
}
footer {
      text-align: center;
      padding: 10px;
      background-color: black;
      color: white;
      margin-top: 100px;
      background-attachment: fixed;
     
    }

        </style>
    <title>Contact Us</title>
</head>
<body>
     
<header class="main-header">

<nav class="navbar">
    <ul class="bar">
    <li style="float:right"><a href="index.php">Log Out</a></li>
    <li style="float:right"><a href="contact.php">Contact Us</a></li>
    <li style="float:right"><a href="tourpackage.php">Tour Packages</a></li>
    <li style="float:right"><a href="home.php">Home</a></li>
    <li style="float:right"><a href="profile.php">Profile</a></li>
    <li  style="float:right"><a href="Srilanka.php"> Srilanka</a></li> 

    </ul>
</nav>
</header> 
<h1>
  Contact Us
</h1>

<div class="center">
  
  <table class="table table-striped">
<tr>
    <td>First Name</td><td><input type="text" id="fname" name="firstname" placeholder="Your name.."></td>
</tr>

<tr>
    <td>Last Name</td><td><input type="text" id="lname" name="lastname" placeholder="Your last name.."></td>
</tr>

<tr>
    <td>Country</td><td><input type="text" id="Cname" name="Countryname" placeholder="Your Country name.."></td>
</tr>

<tr>
    <td>Subject</td><td><input type="text" name="subject" placeholder="Write something.."  rows="4" cols="50"></td>
</tr>
<td>
    <button  onclick="myFunction()" type="submit" class="btn" name="btnSumbit">Submit
     </button>
</td>
  </table>
  </form>
</div>
<script>
function myFunction() {
  alert("Message Sent succesfully");
}
</script>

</body>
</html>
<footer>
    <p>Dreamtour Srilanka<br>
        <a href="mailto:hege@example.com">Dreamtour@gmail.com</a></p>
        <p>+94 11 0000911</p>
      </footer>
</body>
</html>