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
    <link rel="stylesheet" href="dream.css ">
    <title>Manage Packages</title>
    <style>
         input[type=text]{
  width: 70%;
  padding: 12px 20px;
  margin: 8px 15%;
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
    p{
        text-align: center;
        font-size: 2rem;
        color: white;
    }
main , header {
    background-image: url('images/aadmin.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

td , table{
    color: White;
    text-align: center;
    font-size: 1rem;
}
#myBtn {
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

#myBtn:hover {
  background-color: red;
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
<p>Packages</p>

    <div class="col-sm">
    <form method="post" enctype="multipart/form-data"> 
                                                              
        <table>
        <tr> 
                <td>Tour name</td> <td><input type="text" name ="txtName" required
                <?php
                if(isset($_POST["btnEdit"]))
                {
                $r=$_POST["btnEdit"];
                echo'value="'.$_POST["pName"][$r].'"';
                }
                ?>
                > 
                <?php
                     if(isset($_POST["btnEdit"]))
                     {
                         $r =$_POST["btnEdit"];
                         echo '<input type="hidden" 
                         name="txtID" value="'. $_POST["pId"][$r].'">';
                        
                     }
                    ?>
                    </td>
            </tr>
        

            <tr> 
                <td>Price</td>  <td><input type="text" name ="txtPrice"  
                <?php
                if(isset($_POST["btnEdit"]))
                {
                $r=$_POST["btnEdit"];
                echo'value="'.$_POST["pPrice"][$r].'"';
                }
                ?>></td>
            </tr>
      
           
            <tr>
                    <td>Description</td> <td><textarea name="txtDescrip" col="10" rows="5" required>
                    <?php
                     if(isset($_POST["btnEdit"]))
                     {
                         $r =$_POST["btnEdit"];
                         echo $_POST["pDescrip"][$r];
                     }
                    ?>
                    </textarea></td> 
                </tr>

                <tr>
            <td>Image</td><td><input type="file" name="txtimage" >
            <?php
                     if(isset($_POST["btnEdit"]))
                     {
                         $r =$_POST["btnEdit"];
                       
                     }
                    ?>
            
                       </td>
        </tr> 
           
            <tr>
                <td></td> <td>
               
                    <input type="submit" name="btnSave" value="Add Package">
                    <input type="submit" name="btnUpdate" value="Update Package">
                  
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
                  $query ="INSERT INTO `packages`(`tour_name`, `price`, `description`, `image`)
                  VALUES (?,?,?,?)";
                  $st = $conn->prepare($query);
                  $st->bindValue(1,$_POST["txtName"],PDO::PARAM_STR);
                  $st->bindValue(2,$_POST["txtPrice"],PDO::PARAM_STR);                    
                  $st->bindValue(3,$_POST["txtDescrip"],PDO::PARAM_STR);                    
                  $st->bindValue(4,"",PDO::PARAM_STR);  
                  $st->execute();
                  $id=$conn->lastInsertId(); // this will give the id of the last entry
                  $fname = $_FILES["txtimage"]['name'];
                  $info  = new SplFileInfo($fname);
                  $newName= './PackageImages/'.$id.'.'.$info->getExtension();
                  move_uploaded_file($_FILES["txtimage"]['tmp_name'],$newName) ;
                  $query ="UPDATE `packages` SET `image`= ? WHERE `ID`= ?"; 
                  $st = $conn->prepare($query);
                  $st->bindValue(1,$newName,PDO::PARAM_STR);
                  $st->bindValue(2,$id,PDO::PARAM_INT);
                  $st->execute();
                  
                  echo '<h3> package added successfully </h3>';

                  
                  
              } catch (PDOException $th) {
                 echo $th->getMessage();
              
              }
          }
          
          
          
          
          else if(isset($_POST['btnUpdate'])) 
{
    try {$imageid= $_POST["txtID"];
         $fname = $_FILES["txtimage"]['name'];
        $info  = new SplFileInfo($fname);
        $newName= './PackageImages/'.$imageid.'.'.$info->getExtension();
        move_uploaded_file($_FILES["txtimage"]['tmp_name'],$newName) ;

       $conn=new PDO($db,$un,$password);
       $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $query="UPDATE `packages` SET `tour_name`=?,`price`=?,`description`=?, `image`=?
       WHERE `ID`=?";                                                         
       $st = $conn->prepare($query);
       $st->bindValue(1,$_POST["txtName"],PDO::PARAM_STR);
       $st->bindValue(2,$_POST["txtPrice"],PDO::PARAM_STR);                    
       $st->bindValue(3,$_POST["txtDescrip"],PDO::PARAM_STR);                    
       $st->bindValue(4,$newName,PDO::PARAM_STR);  
       $st->bindValue(5,$_POST["txtID"],PDO::PARAM_INT);
       $st->execute();
       $id=$conn->lastInsertId();
       
       
                                                               // point where database is gonna run the query
      echo '<h3>  Package Updated Sucessfully </h3>';                                                         



    } catch (PDOException $th) {
       echo $th->getMessage();
    }
}
else if(isset($_POST['btnDelete'])) 
{
    try {
        $conn=new PDO($db,$un,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $query="Delete from `packages`
       WHERE `id`=?";
       $st=$conn->prepare($query);
      ;
       $st->bindValue(1,$_POST["btnDelete"],PDO::PARAM_INT);
      $st->execute();
      echo '<h3>  Package deleted Sucessfully </h3>';


    } catch (PDOException $th) {
       echo $th->getMessage();
    }
}
}
?>
</aside>
</div>
<main>
<div class="container">
  <div class="row">
    <div class="col-sm">
<div class="pkg_table">
<p  style="font-size: 2rem; font-weight: 600;">Search Packages</p>
<form method="post" enctype="multipart/form-data "> 
<div class="search">
    <input type="text" class="inputBig" placeholder="Enter Package Name to search" name="txtSearch">
    <input type="submit" name="btnSearch" value="Search">
</div>
</div>
    </div>
    <?php

try {
    $conn=new PDO($db,$un,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query="SELECT packages.ID,`tour_name`, `price`, `description`, `image` FROM `packages` ";                                                 //when writing a select query write down the columns that are necessary to acess data

     if(isset($_POST["btnSearch"]))                                    
     {$query= $query."where tour_name like'%".$_POST["txtSearch"]."%'";}    

    $result=$conn->query($query);
    
 
echo '<table class="table table-bordered table-dark">';
echo'<tr> <th> ID </th> <th>Tour Name</th> <th> Price</th>  <th>Description</th><th>Image</th>
<th>Edit</th> <th> Delete</th></tr>';
$i = 0;
foreach($result as $row)


{
    echo'<tr>';
echo '<td> <input type="hidden" 
name="pId[]" value="'. $row[0].'">
'. $row[0].'</td>';
echo'<td><input type="hidden" name="pName[]" value="'. $row[1].'">'. $row[1].'</td>';
echo'<td><input type="hidden" name="pPrice[]" value="'. $row[2].'">'. $row[2].'</td>';
echo'<td><input type="hidden" name="pDescrip[]" value="'. $row[3].'">'. $row[3].'</td>';
echo'<td><img src="'.$row[4].'" width="120px" height="120px"></td>';
echo'<td><button name="btnEdit" type="submit" value="'.$i.'" >Edit</button></td>';
echo'<td><button name="btnDelete" type="submit" value="'. $row[0].'">Delete</button></td>'; 
echo'</tr>'; 
$i++;
}



echo'</table>';

} catch ( PDOException $th) {
echo $th->getMessage();

}
?> 


<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script>
var mybutton = document.getElementById("myBtn");
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