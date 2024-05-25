<?php
include "connection.php";
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
    <a href="homt.html" class="nav-link">
          <i class="fa fa-home icon"></i>
          <span class="link">Product Management</span>
        </a>
      </li>
     
        <a href="/FINALPROJECT1/usermanegement/index.php" class="nav-link">
          <i class="fa fa-shopping-bag icon"></i>
          <span class="link">User Management</span>
        </a>
      </li>
      <a href="/FINALPROJECT1/HOME.html" class="nav-link">
          <i class="fa fa-sign-out icon"></i>
          <span class="link">Home Page</span>
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
  
      <div class="title signup">Add User</div>
    </div>

      <div class="form-inner">
       
   
        </form>
        <form action="" name="form1 "method="post" enctype="multipart/form-data">
          <div class="field">
            <input type="text" placeholder="Username"  name="username" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Email" name="email"required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="field">
            <input type="text" placeholder="BirthDate" name="birthdate" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Address" name="address" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Contact Number" name="contactnumber" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Role" name="usertype" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit"  name="insert" value="Insert" >
           
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

<?php
echo '<script>alert("The information has been added successfully.  ")</script>';
?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
}

if(isset($_POST["insert1"]))
{

?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
}

if(isset($_POST["update"]))
{
mysqli_query($link, "update login set firstname='$_POST[Lastname]' where
firstname='$_POST[firstname]'") or die(mysqli_error($link));
?>

<?php
}

?>

      </html>