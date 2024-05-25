<?php
include "connection.php";
$id=$_GET["id"];
$email="";
$username="";
$password="";
$birthdate="";
$address="";
$contactnumber="";
$usertype="";
$res=mysqli_query($link,"select * from login where Id=$id");
while($row=mysqli_fetch_array($res))
{
$email=$row["email"];
$username=$row["username"];
$password=$row["password"];
$birthdate=$row["birthdate"];
$address=$row["address"];
$contactnumber=$row["contactnumber"];
$usertype=$row["usertype"];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <!-- External CSS & JS-->
  <link rel="stylesheet" href="Loginstyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/328d66ef2b.js" crossorigin="anonymous"></script>
  <!-- Website Icon -->
  <link rel="icon" href="logo.png" type="image/icon-type">
</head>
<body>
           <!-- Start of Side Navigation Bar -->
  <div class="button">
    <span class="fa-solid fa-bars"></span>
  </div>
  <div class="sidebar">
    <div class="text">ChilliManila Clothing</div>
    <ul class="list">
    <a href="product.php" class="nav-link">
          <i class="fa fa-home icon"></i>
          <span class="link">Product Management</span>
        </a>
      </li>
     
        <a href="index.php" class="nav-link">
          <i class="fa fa-shopping-bag icon"></i>
          <span class="link">User Management</span>
        </a>
      </li>
      <a href="home.html" class="nav-link">
          <i class="fa fa-sign-out icon"></i>
          <span class="link">Log out</span>
        </a>
 
    </ul>
  </div>

  <div class="banner">
    <div class="side-logo">
      <img src="logo.png" alt="pink and blue plane">
    </div>


  </div>

  <!-- Form -->
  <div class="wrapper">
    <div class="title-text">
  
      <div class="title signup">Edit User</div>
    </div>

      <div class="form-inner">
       
   
      <form action="" name="form1 "method="post" enctype="multipart/form-data">
          <div class="field">
            <input type="text" placeholder="Username"  name="username"value="<?php echo $email; ?>" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Email" name="email"value="<?php echo $username; ?>"required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
          </div>
          <div class="field">
            <input type="text" placeholder="BirthDate" name="birthdate" value="<?php echo $birthdate; ?>"required>
          </div>
          <div class="field">
            <input type="text" placeholder="Address" name="address" value="<?php echo $address; ?>"required>
          </div>
          <div class="field">
            <input type="text" placeholder="Contact Number" name="contactnumber" value="<?php echo $contactnumber; ?>"required>
          </div>
          <div class="field">
            <input type="text" placeholder="User Type" name="usertype" value="<?php echo $usertype; ?>" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit"  name="update" value="Update" >
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Footer -->


        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="Loginscript.js"></script>
      </body>
      <?php
if(isset($_POST["update"]))
{
$tm=md5(time());
$fnm=$_FILES["f1"]["name"];

if($fnm=="")
{
    $dst="./images/".$tm.$fnm;
    $dst1="images/".$tm.$fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
    mysqli_query($link,"update login set
    email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',birthdate='$_POST[birthdate]',address='$_POST[address]',contactnumber='$_POST[contactnumber]',usertype='$_POST[usertype]' where id=$id");
    
}


?>
<?php
echo '<script>alert("Information has been updated successfully.  ")</script>';
?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
}
?>

      </html>