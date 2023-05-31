<?php include("config.php"); 
  
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dream.css">
    <style>
         body {
  background-image: url('images/form.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
h1 {
    text-align: center;
}
    </style>
    <title>Create Account</title>
    
</head>
<body>
<header class="main-header">

<nav class="navbar">
    <ul class="bar">
         <li style="float:right"><a href="index.php">Home</a></li>
         <li style="float:right"><a href="userlogin.php">Log In</a></li>
          <li style="float:right"><a href="registerform.php">Create Account</a></li>
    </ul>
</nav>

<form method="post">

    <table class="form_container">
    <h1>Create Account</h1>
        <tr>
        <td>User Name</td>
        <td><input type="text" id="txtName" name="txtName" required></td>
        </tr>
        <tr>
        <td>Password</td>
        <td><input type="password" id="txtpass" name="txtpass" required></td>
        </tr>
        <tr>
        <td>Gender</td>
        
        <td>
            Female<input type="radio" name="gender" checked>
            Male<input type="radio"  name="gender">

        </td>
        </tr>
        <tr>
        <td>Country</td>
        <td><input type="text" id="txtcountry" name="txtcountry" required></td>
        </tr>
        <tr>
        <td>Date of birth</td>
        <td><input type="date" name="txtbday"> </td>
        </tr>
        <tr>
        <td>email</td>
        <td><input type="cancellation" name="txtemail"> </td>
        </tr>
        <tr>
        <td>phone No</td>
        <td><input type="text" name="txtphno"> </td>
        </tr>
        
        <tr>
                <td></td> <td>
                    <input type="submit" name="btnSave"  value="Register">
                </td>
                </tr>
    </table>
 
</form>


        <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST['btnSave']))
            {
                try 
                {
                    $conn = new PDO($db,$un,$password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query ="INSERT INTO `users`(`user_name`, `password`, `gender`, `country`, `date_of_birth`, `email`, `phone_no`)
                    VALUES (?,?,?,?,?,?,?)";
                    $st = $conn->prepare($query);
                    $st->bindValue(1,$_POST["txtName"],PDO::PARAM_STR);
                    $st->bindValue(2,$_POST["txtpass"],PDO::PARAM_STR);                    
                    $st->bindValue(3,$_POST["gender"],PDO::PARAM_STR);                    
                    $st->bindValue(4,$_POST["txtcountry"],PDO::PARAM_STR);                   
                    $st->bindValue(5,$_POST["txtbday"],PDO::PARAM_STR);                    
                    $st->bindValue(6,$_POST["txtemail"],PDO::PARAM_STR);
                    $st->bindValue(7,$_POST["txtphno"],PDO::PARAM_STR);
                                    
                    $st->execute();
                    
                    echo "<script>alert('Registered successfully.')</script>";;

                    
                    
                } catch (PDOException $th) {
                   echo $th->getMessage();
                
                }
            }
            
            
            
            }
        
        
    
    
    ?>
    
</body>
</html>
<footer>
    <p>Dreamtour Srilanka<br>
        <a href="mailto:hege@example.com">Dreamtour@gmail.com</a></p>
        <p>+94 11 0000911</p>
      </footer>
</body>
</html>