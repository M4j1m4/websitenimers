<?php
include "connection.php";
?>

<html lang="en">
<head>
<title>ChilliManila</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/328d66ef2b.js" crossorigin="anonymous"></script>
  <!-- Website Icon -->
  <link rel="icon" href="logo.png" type="image/icon-type">
</head>
<body>
<div class="button">
    <span class="fa-solid fa-arrow-right"></span>
  </div>
 

 
  <div class="sidebar">
    <div class="text">ChilliManila Clothing</div>
    <ul class="list">
      
        <a href="/FINALPROJECT/php_product/index.php" class="nav-link">
          <i class="fa fa-home icon"></i>
          <span class="link">Product Management</span>
        </a>
      </li>
     
        <a href="index.php" class="nav-link">
          <i class="fa fa-shopping-bag icon"></i>
          <span class="link">User Management</span>
        </a>
      </li>
      <a href="/FINALPROJECT/HOME.html" class="nav-link">
          <i class="fa fa-sign-out icon"></i>
          <span class="link">Home Page</span>
        </a>
 
     
      </li>
      
      
      </li>
    </ul> 
    
</div>
  <img src="user.png">




 

  <a href="add1.php"><button id="add" class="button1 button2"><i class="fa fa-users">  Add New</i></button></a>
  
  <div class="description">

<div class="container-contact1 ">

<table class="table">
  <thead class="thead-dark1">
    <tr>
      <th scope="col">ID Number</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Address</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Role</th>
      <th scope="col"></th><th scope="col"></th>
   
 
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</div>

<tbody>

<?php
$res=mysqli_query($link,"select * from login");
while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>"; echo $row["id"]; echo "</td>";
echo "<td>"; echo $row["email"]; echo "</td>";
echo "<td>"; echo $row["username"]; echo "</td>";
echo "<td>"; echo $row["password"]; echo "</td>";
echo "<td>"; echo $row["birthdate"]; echo "</td>";
echo "<td>"; echo $row["address"]; echo "</td>";
echo "<td>"; echo $row["contactnumber"]; echo "</td>";
echo "<td>"; echo $row["usertype"]; echo "</td>";

echo "<td>"; ?> <a href="edit1.php?id=<?php echo $row["id"]; ?>" <button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>" <button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";

echo "</tr>";
}
?>

</tbody>
</table>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="Loginscript.js"></script>
</body>

<?php
if(isset($_POST["insert"]))
{

  $tm=md5(time()); 
  $fnm=$_FILES["image"]["name"]; 
  $dst="./images/".$tm.$fnm; 
  $dst1="images/".$tm.$fnm; 
  move_uploaded_file($_FILES["image"]["tmp_name"],$dst); 

  mysqli_query($link,"insert into login
  values(NULL,'$_POST[email]','$_POST[username]','$_POST[password]','$_POST[birthdate]','$_POST[address]','$_POST[contactnumber]','$_POST[usertype]')");
?>
<script type="text/javascript">
window.location.href=window.location.href;
</script>
<?php
}

if(isset($_POST["delete"]))
{
mysqli_query($link, "delete from login where firstname='$_POST[firstname]'") or
die(mysqli_error($link));



?>


<script type="text/javascript">
window.location.href=window.location.href;
</script>
<?php
}

if(isset($_POST["update"]))
{
mysqli_query($link, "update login set firstname='$_POST[Lastname]' where
firstname='$_POST[firstname]'") or die(mysqli_error($link));
?>

<script type="text/javascript">
window.location.href=window.location.href;

</script>
<?php
}

?>

</html>
