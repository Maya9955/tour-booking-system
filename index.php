<?php include("config.php"); 
      session_start();
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  <title>Dream Tour SriLanka</title>
    <style>
 html{
   width: 100%;
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
      .mySlides {
        display:none;
      }
h1{
  background-image: url('images/sun.jpg');
  max-width:100%;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  padding:  300px;
  color: white;
 
 
 font-size: 2rem;
 text-shadow: 2px 2px white;
}
.btn{
    background-color: black;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  
}

.search{
  background-color: rgb(220,220,220);
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: text;
}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto  ;
  grid-gap: 40px;
  padding: 20px 20px 40px 20px;
  position: absolute;
  top: 1000px;
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
 
  

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
footer {
      text-align: center;
      padding: 30px;
      background-color: black;
      color: white;
      margin-top: 1800px;
      background-attachment: fixed;
     
    }
    ::-webkit-scrollbar {
  width: 20px;
}
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
}
::-webkit-scrollbar-thumb {
  background: rgb(37, 37, 37);
}
::-webkit-scrollbar-thumb:hover {
  background:rgb(37, 37, 37); 
}

h4{
  background-color: #696969;
  color: white;
  padding: 7%;
  text-align: center;
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
 <li style="float:right"><a href="registerform.php">Create Account</a></li>
 <li style="float:right"><a href="userlogin.php">Log In</a></li>
 <li style="float:right"><a href="index.php">Home</a></li>
 
    </ul>
</nav>


<h1>
YOUR DREAM TOUR AWAITS FOR YOU
<br>
<main>


<form method="post" enctype="multipart/form-data "> 
<div>
    <input type="text"  class="search" placeholder="Enter tour Name to search" name="txtSearch">
    <input type="submit" class="btn "name="btnSearch" value="Search">
</div>

</h1>
<h2>
<?php

    try {
        $conn=new PDO($db,$un,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="SELECT packages.ID,`tour_name`, `price`, `description`, `image` FROM `packages` ";                                                 

         if(isset($_POST["btnSearch"]))                                    
         {$query= $query."where tour_name like'%".$_POST["txtSearch"]."%'";}    

        $result=$conn->query($query);
        
     
echo  '<div class="grid-container">';
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
  echo'<button onclick="myFunction()" class="btn btn-primary">Book Now</a>';
  
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
</form>
</div>
</main>
</h2>
<script>
function myFunction() {
  alert("Hello! Please Login or Create Account to view more information and to book tour");
}
</script>

<h4>
  MAKE YOUR DREAM TOUR A SUCCESS WITH US!
</h4>
<footer>
    <p>Dreamtour Srilanka<br>
        <a href="mailto:hege@example.com">Dreamtour@gmail.com</a></p>
        <p>+94 11 0000911</p>
      </footer>


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
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</header>
</body>
</html>