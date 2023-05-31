<?php 
session_start();
   
?>

<!DOCTYPE html>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="dream.css">
<style>
 h1{
   color:white;
   font-family: Comic Sans MS;
   text-shadow: 2px 2px black;
 }
.wel{
  color: black;
  font-family: papyrus;
  font-size: medium;
  font-weight: bold;
  }
  .mySlides 
  {
    display:none;
    cursor: pointer;
    }
    
    .dropbtn {
    background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {
  display: block;
}

#top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: black;
  color: white;
  cursor: pointer;
  padding: 10px;
  border-radius: 4px;
}

#top:hover {
  background-color: red;
}
h2{
 
      text-align: center;
      font-size: 50erm;
     
      color: black;
}
p{
  text-align: center;
  font-family: Apple Chancery, cursive;
}
.about{
  width: fit-content;
  height:100%;
  background-color: #F0E68C;
}
.us{
  background-image: url('images/about.jpg');
  max-width:100%;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  height: 100%;
}
.welcome{
  background-image: url('images/welcomee.jpg');
  max-width:100%;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  height: 100%;
}
</style>
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
    </button>
    
    </ul>
</nav>
<div class="container">
  <img src="images/ele.jpg" alt="Snow" style="width:100%;">
  <div class="top-left">DREAM TOUR SRI LANKA</div>
 <div class="welcome">
<h1>
  Welcome to Srilanka
</h1>
<p class="wel" style="color: black;">See what's sitting tight for you on your next island escape.
Relish the remarkable encounters this island treasure brings to the table.
</p>
 </div>
<div style="width:100%">

  <img class="mySlides" src="images/s1.jpg" style="width:100%">
 

  <img class="mySlides" src="images/s2.jpg" style="width:100%">

  <img class="mySlides" src="images/s3.jpg" style="width:100%">

  <img class="mySlides" src="images/s4.jpg" style="width:100%">

  <img class="mySlides" src="images/s5.jpg" style="width:100%">

</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2500);    
}
</script>

</header>

<button onclick="topFunction()" id="top" title="Go to top">Top</button>

<script>
var mybutton = document.getElementById("top");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<div class="us">

<h2 style="color: white;">
  About Us
</h2>
<p style="color: white;">
Dream Tour Sri Lanka is where latest technologies, emerging trends, leading 
travel brands and innovative startups are all at one place to create the new possibilities of travel.
You will be joined by hundreds of influential executives and thousands of attendees across sectors in the 
travel industry for three days of unparalleled networking potential.
Dream Tour Sri Lanka  is organised by the team behind ITB Asia, and co-located with ITB Asia and 
MICE Show Asia, making it part of the largest travel trade show in Asia Pacific.
Apart from a series of tech-focused sessions, Dream Tour Sri Lanka  will also feature a series of 
industry-focused technology talks for the hotel and airline sectors as follows.

</p>
</div>
<footer>
    <p>Dreamtour Srilanka<br>
        <a href="mailto:hege@example.com">Dreamtour@gmail.com</a></p>
        <p>+94 11 0000911</p>
      </footer>   
</body>

</html>

