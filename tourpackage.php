<?php include("config.php"); 
      session_start();
      
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="dream.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Tour Packages</title>
<style>
 
 html {
    min-width: 100%;
  }
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto   ;
  grid-gap: 40px;
 
  padding: 20px 20px 40px 20px;
  position: absolute;
  top: 480px;
  left:1%;
  right:50px;
}

.grid-container > div {
  
  text-align: center;
  font-size: 16px;
}

.grid-container :hover div  {
        transform: scale(1.01);
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
    }
    .pkg_table{position: absolute;
      top: 180px;
   
    padding: 10px 10px 10px 10px;
    left: 2.5%;
  }

    h6{position:absolute;
      left: 45%;
    top: 100px;
     }
     .bar {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: black;
      opacity: 0.7;
      width: 100%;
      }
    
    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    
      li a:hover {
      background-color: #5ca1b8;
      color: black;
      font-size: large;
      
      }
      h1{
  background-image: url('images/home.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
 padding:  100px;
 margin-left: 1%;
 margin-right: 1%;
 color: black;
 text-align: center;
 font-size: 5rem;
 text-shadow: 2px 2px white;
}
sub{
  font-family:Brush Script MT, Brush Script Std, cursive	;
  color: black;
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
</style>

</head>

<body>
<header class="main-header">

<nav class="navbar">
    <ul class="bar">
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
<h1>Dream Tours
  <br>
  <sub>make your dream to a success</sub>
</h1>
<main>


<form method="post" enctype="multipart/form-data "> 

<?php

    try {
        $conn=new PDO($db,$un,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="SELECT  `id`, `tour_name`, `price`, `description`, `image` FROM `packages`";                                                  
        $result=$conn->query($query);


        

       echo '<div class="grid-container">';
       $i=0;
       foreach($result as $row)
       {
        echo'<div> ';
       
        echo'<div class="card" style="width: 18rem;
        <div class="card-body">
       ';
        echo'<img class="card-img-top" src="'.$row[4].'" alt="Card image cap">';
       
        echo'<div class="card-body">';
        echo'<h5 class="card-title">'.'<input type="hidden" name="pName[]" value="'. $row[1].'">'. $row[1].'</h5>';
        echo' <p class="card-text">'.'<input type="hidden" name="pPrice[]" value="'. $row[2].'">'. $row[2].'</p>';
        echo' <p class="card-text">'.'<input type="hidden" name="pDescription[]" value="'. $row[3].'">'. $row[3].'</p>';
        echo'<a href="booking.php" class="btn btn-primary">Book Now</a>';
        echo'</div>';
     
        echo'</div>';
       
        echo'</div>';
        $i++;
      }
        echo'</div>';

        

} catch ( PDOException $th) {
    echo $th->getMessage();
  
}
?> 
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
 
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   

</body>
</html>