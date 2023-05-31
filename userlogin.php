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
    <title>Dreamtour Srilanka-Login</title>
    <link rel="stylesheet" href="dream.css">
    <style>
  input[type=text]{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 25%;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 25%;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
input[type=submit] {
      width: 50%;
      background-color: black;
      color: white;
      padding: 14px 20px;
      margin: 8px 25%;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    h2{
        text-align: center;
    }
    body {
  background-image: url('images/home.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
.form_container{
      width: fit-content;
      height: fit-content;
      background-color: rgba(255, 255, 255, 0.63);
      display: table-cell;
      position: absolute;
      left: 40%;
      right: 25%;
      text-align: center;
      font-family: Times, Times New Roman, serif;
      margin-top: 5%;
    }
        </style>
</head>
<body>
    
    <header class="main-header">

        <nav class="navbar">
            <ul class="bar">
         <li style="float:right"><a href="registerform.php">Create Account</a></li>
         <li style="float:right"><a href="index.php">Home</a></li>
         <li style="float:right"><a href="index.php">Log In</a></li>
         
            </ul>
        </nav>
    </header>
    <!--backround image-->
    

    
    
<form method="post">

    <div id="logholder" >
        <div id="logo">
        </div>
            <div id="mid" class="form_container">
            <h2>Login</h2>
            <input class="midInput" type="text" name="txtName" require placeholder="Enter User name" required>
            <br>
            <input class="midInput" type="password" name="txtpass" require placeholder="Enter Passwaord" required>

            <input class="btnBig" type="submit" name="btnSubmit" value="Sign In">
            </div>
        <div id="btnLog">
        
        </div>
    </div>
</div>
</form>
<?php 
    if(isset($_POST["btnSubmit"]))
    {
    try {
        $conn = new PDO($db,$un,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $query ="SELECT `user_name`,`id` FROM `users`
                     WHERE `password`=? and `user_name`=?";    
            $st = $conn->prepare($query);
            $st->bindValue(1,$_POST["txtpass"],PDO::PARAM_STR);     
            $st->bindValue(2,$_POST["txtName"],PDO::PARAM_STR);  
           
            $st->execute();              
            $result = $st->fetch();
           
            if($result[0] == $_POST["txtName"])
            {
                $_SESSION["un"] =$result[1];
                header("location:home.php");
               
            }
            else
            {
                echo '<script> alert("Incorrect user name or a password");</script>';
            }
        }
        catch(Exception $e)
        {
            echo '<script> alert("'. $e->getMessage() .'");</script>';
        }
    }
?>
</body>
</html>
<footer>
    <p>Dreamtour Srilanka<br>
        <a href="mailto:hege@dreamtour.com">Dreamtour@gmail.com</a></p>
        <p>+94 11 0000911</p>
      </footer>
</body>
</html>
