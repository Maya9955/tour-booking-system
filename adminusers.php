<?php include("config.php"); 
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="dream.css ">
    <title>Manage Users</title>
    <style>
         body{
    background-image: url('images/aadmin.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
        h1{
            text-align: center;
            color: white;
        }
        </style>
</head>
<body>
<header class="main-header">

<nav class="navbar">
    <ul class="bar">
 <li style="float:right"><a href="adminlogin.php">Log Out</a></li>
 <li style="float:right"><a href="adminpackage.php">Manage Package</a></li>
 <li style="float:right"><a href="adminusers.php">Manage Users</a></li>
 <li style="float:right"><a href="adminbooking.php">Manage Booking</a></li>
 <li style="float:right"><a href="adminhome.php">Home</a></li>
 
    </ul>
</nav>

</header>
<main>

<?php 
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

if(isset($_POST['btnDelete'])) 
{
    try {
        $conn=new PDO($db,$un,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $query="Delete from `users`
       WHERE `ID`=?";
       $st=$conn->prepare($query);
      ;
       $st->bindValue(1,$_POST["btnDelete"],PDO::PARAM_INT);
      $st->execute();
      echo '<script> alert(" User deleted Sucessfully");</script>'; 


    } catch (PDOException $th) {
       echo $th->getMessage();
    }
}
}
?>
</aside>
</div>

<main>
<h1>Users Details</h1>
<form method="post" enctype="multipart/form-data "> 

<?php

try {
  $conn=new PDO($db,$un,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $query="SELECT`id`, `user_name`, `password`, `gender`, `country`, `date_of_birth`, `email`, `phone_no` FROM `users`";                                                  

   
   
  $result=$conn->query($query);
        
     
echo '<table class="table table-bordered table-dark">';
echo'<tr>  <th> ID </th> <th> Username  <th> Password</th> <th> gender </th> <th> country</th> <th> date of birth</th> <th>email</th> <th>phone _no</th>
<th> Delete</th></tr>';
$i=0;
foreach($result as $row)//for each column we add rows(below)

{echo'<tr>';
    echo '<td> <input type="hidden" 
    name="rId[]" value="'. $row[0].'">
    '. $row[0].'</td>';

echo'<td><input type="hidden"  value="'. $row[1].'">'. $row[1].'</td>';
echo'<td><input type="hidden" name="txtName[]" value="'. $row[2].'">'. $row[2].'</td>';
echo'<td><input type="hidden" name="txtpass[]" value="'. $row[3].'">'. $row[3].'</td>';
echo'<td><input type="hidden" name="gender[]" value="'. $row[4].'">'. $row[4].'</td>';
echo'<td><input type="hidden" name="txtcountry[]" value="'. $row[5].'">'. $row[5].'</td>';
echo'<td><input type="hidden" name="txtbday[]" value="'. $row[6].'">'. $row[6].'</td>';
echo'<td><input type="hidden" name="txtemail[]" value="'. $row[7].'">'. $row[7].'</td>';

echo'<td><button name="btnDelete" type="submit" value="'. $row[0].'">Delete</button></td>'; 
echo'</tr>'; 
$i++;
}
//always best option to fid something is primary key [row 0]=ID



echo'</table>';

} catch ( PDOException $th) {
    echo $th->getMessage();
  
}
?> 
</form>
</div>
</main>
<?php
if(isset($_POST["btnEdit"]))
{
$r=$_POST["btnEdit"];
}
elseif(isset($_POST["btnDelete"]))
{
$r=$_POST["btnDelete"];
}
?>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>