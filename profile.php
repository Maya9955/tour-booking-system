<?php 
include("config.php");
session_start();

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="dream.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
     <title>Profile</title>
     <style> 
     body{
         background-color: #DCDCDC;
        
}
     h1{
         text-align: center;
         font-family: Bookman, URW Bookman L, serif;
         text-shadow: 2px 2px black;
         color: gray;
     }
     .form_container{
      width: fit-content;
      height: fit-content;
      background-color: rgba(255, 255, 255, 0.63);
      display: table-cell;
      position: absolute;
      left: 600px;
      text-align: center;
      font-family: Times, Times New Roman, serif;
      top: 10px;

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
.detail{
    position: absolute;
    top: 100px;
    left: 10%;
    background-color: rgba(255, 255, 255, 0.63);
    font-family: Times, Times New Roman, serif;
    text-align: center;
    width: fit-content;
    height: fit-content;
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
    
    </ul>
</nav>
<h1>
    Your Profile Details
</h1>
 </header>
 
     <?php

     try{
         $uname = $_SESSION["un"];
         $conn = new PDO($db,$un,$password);
         $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $query ="SELECT `id`,`user_name`, `password`, `gender`, `country`, `date_of_birth`, `email`, `phone_no` FROM `users`
                  WHERE `id`=$uname";   

        $result=$conn->query($query);
        echo '<form method="post">';
        
         $i=0;


        foreach($result as $row)
            {echo'<div style =position:absolute;top:100px;left:10%;text-align:center>'; echo'<div class="detail"> ';
                echo'<div class="loginForm" style="width:550px;height:550px;text-align:left">';
        echo' <p class="login-text" style="font-size: 2rem; font-weight: 800;">User Profile</p>';
        echo'<div class="card-body">';
                echo ' <p class="card-text">'.'Registered ID:'.' '.' <input type="hidden" 
                name="txtId[]" value="'. $row[0].'">
                '. $row[0].'</td>';
            echo'<p class="card-text">'.'Full name :'.' '.'<input type="hidden" name="txtName[]" value="'. $row[1].'">'. $row[1].'</td>';
            echo'<p class="card-text">'.'Password :'.' '.'<input type="hidden" name="txtpass[]" value="'. $row[2].'">'. $row[2].'</td>';
            echo'<p class="card-text">'.'Gender :'.' '.'<input type="hidden" name="gender[]" value="'. $row[3].'">'. $row[3].'</td>';
            echo'<p class="card-text">'.'Country :'.' '.'<input type="hidden" name="txtcountry[]" value="'. $row[4].'">'. $row[4].'</td>';
            echo'<p class="card-text">'.'Birth day :'.' '.'<input type="hidden" name="txtbday[]" value="'. $row[5].'">'. $row[5].'</td>';
            echo'<p class="card-text">'.'Email :'.' '.'<input type="hidden" name="txtemail[]" value="'. $row[6].'">'. $row[6].'</td>';
            echo'<p class="card-text">'.'Phone No :'.' '.'<input type="hidden" name="txtphno[]" value="'. $row[7].'">'. $row[7].'</td>';
            echo '<br>';
           echo '<br>';
            echo'<td><button name="btnEdit" class="btn" type="submit" value="'.$row[0].'" >Edit</button></td>';
            echo'</tr>'; 
            echo'</form>';
        }

        if(isset($_POST["btnEdit"])){
            
                
                    echo'<table class="form_container">';
                    echo' <td class="login-text" style="font-size: 2rem; font-weight: 800;">Update profile</p>';

                    echo' <tr><td> User Name';
                    echo '<input type="text"  name="txtName"  value="' . $row[1] . '"  required>';
                    echo '</tr></td>';
                    echo '<tr><td>Password';
                    echo'<input type="text"  name="txtpass"  value="' . $row[2] . '"  required>';
                    echo '</tr></td>';
                    echo '<tr><td> gender';
                    echo'<input type="text"  name="gender"  value="' . $row[3] . '"  required>';
                    echo '</tr></td>';
                    echo '<tr><td> country';
                    echo'<input type="text" name="txtcountry"  value="' . $row[4] . '"  required>';
                    echo '</tr></td>';
                    echo '<tr><td> Birth Day';
                    echo'<input type="text" name="txtbday"  value="' . $row[5] . '"  required>';
                    echo '</tr></td>';
                    echo '<tr><td> Email';
                    echo'<input type="text"  name="txtEmail"  value="' . $row[6] . '"  required>';
                    echo '</tr></td>';
                    echo '<tr><td> Phone No';
                    echo'<input type="text"  name="txtphno"  value="' . $row[7] . '"  required>';
                    echo '</tr></td>';
                    echo '<tr><td>';
                    echo '<input type="submit" class="btn" value="Update" name="btnUpdate">';
                    echo '</tr></td>';
        }
     }
     catch ( PDOException $th) {
        echo $th->getMessage();
      
    }
    ?>
    <?php
    if(isset($_POST['btnUpdate']))
            {
                try 
                {
                    $conn = new PDO($db,$un,$password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query ="UPDATE `users` SET  `user_name`=?, `password`=?, `gender`=?, `country`=?, `date_of_birth`=?, `email`=?, `phone_no`=?
                            WHERE `id`=$uname";
                      $st = $conn->prepare($query);
                      $st->bindValue(1,$_POST["txtName"],PDO::PARAM_STR);
                      $st->bindValue(2,$_POST["txtpass"],PDO::PARAM_STR);                    
                      $st->bindValue(3,$_POST["gender"],PDO::PARAM_STR);                    
                      $st->bindValue(4,$_POST["txtcountry"],PDO::PARAM_STR);                   
                      $st->bindValue(5,$_POST["txtbday"],PDO::PARAM_STR);                    
                      $st->bindValue(6,$_POST["txtEmail"],PDO::PARAM_STR);
                      $st->bindValue(7,$_POST["txtphno"],PDO::PARAM_STR);
                      $st->execute();
                    
                    echo "<script>alert('Updated successfully.')</script>";

                    
                    
                } catch (PDOException $th) {
                   echo $th->getMessage();
                
                }
            }
    ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
 </body>
 </html>