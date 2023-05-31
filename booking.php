<?php include("config.php"); 
  
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dream.css">
    <title>Book Tour</title>
    <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}



.center {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
  width: fit-content;
 margin-left: 2%;
  margin-top: 5%;
}
body{
    background-image: url('images/cal.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
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
</style>
</head>
<body>
<header class="main-header">
<div>
<nav class="navbar">
<ul class="bar">
    <li style="float:right"><a href="home.php">Log Out</a></li>
    <li style="float:right"><a href="contact.php">Contact Us</a></li>
    <li style="float:right"><a href="tourpackage.php">Tour Packages</a></li>
    <li style="float:right"><a href="home.php">Home</a></li>
    <li style="float:right"><a href="profile.php">Profile</a></li>
    <li  style="float:right"><a href="Srilanka.php"> Srilanka</a></li> 

    </ul>
</nav>

<aside>
    <div class="center">
<form method="post" enctype="multipart/form-data">                                                             
        <table class="table table-striped">
            <tr> 
                <td>User name</td> <td><input type="text" name ="txtName" required 
                <?php
                if(isset($_POST["btnEdit"]))
                {
                $r=$_POST["btnEdit"];
                echo'value="'.$_POST["rName"][$r].'"';
                }
                ?>
                > 



                <?php
                     if(isset($_POST["btnEdit"]))
                     {
                         $r =$_POST["btnEdit"];
                         echo '<input type="hidden" 
                         name="txtID" value="'. $_POST["rId"][$r].'">';
                        
                     }
                    ?>
                    </td>
            </tr>

         


          
            <tr>
                    <td>Package</td> <td> <select  name="txttour" >
                   <?php  try {
        $conn=new PDO($db,$un,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="SELECT  `id`, `tour_name` FROM `packages`";
        $result=$conn->query($query);
                foreach($result as $r)
                {
                    echo '<option value="'.$r[0].'">'.$r[1].'</option>';
                }
                
                }
                    catch(PDOException $ex)
                    {
                        echo $ex->getMessage();
                    }
                    ?>

                    </select>


                    <tr> 
                    <td>Depature Date Selected</td><td><input type="date" name ="txtDate" 
                <?php
                if(isset($_POST["btnEdit"]))
                {
                $r=$_POST["btnEdit"];
                echo'value="'.$_POST["rDate"][$r].'"';
                }
                ?>></td>
            </tr>

            <tr> 
            <td>Number of Travellers</td><td><input type="number" name ="txtPeople"   
                <?php
                if(isset($_POST["btnEdit"]))
                {
                $r=$_POST["btnEdit"];
                echo'value="'.$_POST["rPeople"][$r].'"';
                }
                ?>></td>
            </tr>

           
             
                  <td>
               
                   
                    <button type="submit" class="btn" name="btnSave">Reserve</button>
                   
                  
                </td>
            </tr>
              
       
        </table>
</form>
            </div>
        <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST['btnSave']))
            {
                try 
                {
                    $conn = new PDO($db,$un,$password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query ="INSERT INTO `booking`(`user_name`, `tour_name`, `depature_date_selected`, `travellers`)  
                    VALUES (?,?,?,?)";
                    $st = $conn->prepare($query);                 
                    $st->bindValue(1,$_POST["txtName"],PDO::PARAM_STR);
                    $st->bindValue(2,$_POST["txttour"],PDO::PARAM_STR);
                    $st->bindValue(3,$_POST["txtDate"],PDO::PARAM_STR);
                    $st->bindValue(4,$_POST["txtPeople"],PDO::PARAM_INT);
                   
                  
                    
                    $st->execute();
                   
                    echo "<script>alert('Package reservation sent successfully.')</script>";

 
                    
                } catch (PDOException $th) {
                   echo $th->getMessage();
                
                }
            }
            
            
            
            }
        
        
    
    
    ?>
    </aside>
    <footer>
    <p>Dreamtour Srilanka<br>
        <a href="mailto:hege@example.com">Dreamtour@gmail.com</a></p>
        <p>+94 11 0000911</p>
      </footer>
</body>
</html>