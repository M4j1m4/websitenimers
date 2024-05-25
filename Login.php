
<?php
$host="localhost";
$user="root";
$password="";
$db="user";

session_start();

$data=mysqli_connect($host, $user, $password, $db);
mysqli_select_db($data, "user") or die(mysqli_error($data));


if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    $sql="SELECT * FROM login where username='".$username."' AND password='".$password."'";
    
    $result=mysqli_query($data,$sql);
    
    $row=mysqli_fetch_array($result);
    
    if($row["usertype"]=="User")
    {
        $_SESSION["username"]=$username;
        header("location:HOME.html");
    }

    else if($row["usertype"]=="Admin")
    {   $_SESSION["username"]=$username;
        header("location:/FINALPROJECT/usermanagement/index.php");
    }

    else
    {
      header("location:/FINALPROJECT/Login.php");
      echo '<script>alert("Username or Password Incorrect.  ")</script>';
      
    }
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
  <link rel="stylesheet" href="css/Loginstyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/328d66ef2b.js" crossorigin="anonymous"></script>
  <!-- Website Icon -->
  <link rel="icon" href="img/logo.png" type="image/icon-type">
</head>
<body>
           <!-- Start of Side Navigation Bar -->
  <div class="button">
    <span class="fa-solid fa-bars"></span>
  </div>
  <div class="sidebar">
    <div class="text">ChilliManila Clothing</div>
    <ul class="list">
      <li class="list">
        <a href="HOME.html" class="nav-link">
          <i class="fa fa-home icon"></i>
          <span class="link">Home</span>
        </a>
      </li>
      <li class="list">
        <a href="index.html" class="nav-link">
          <i class="fa fa-shopping-bag icon"></i>
          <span class="link">Shop Cart</span>
        </a>
      </li>
      <li class="list">
        <a href="about.html" class="nav-link">
          <i class="fa fa-info-circle icon"></i>
          <span class="link">About</span>
        </a>
      </li>
      <li class="list">
        <a href="ContactUs.html" class="nav-link">
          <i class="fa fa-comment icon"></i>
 
          <span class="link">Contact</span>
        </a>
      </li>
    </ul>
  </div>

  <div class="banner">
    <div class="side-logo">
      <img src="img/logo.png" alt="pink and blue plane">
    </div>

    <div class="icon">
      <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
      <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
    </div>
  </div>

  <!-- Form -->
  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login</div>
      <div class="title signup">Signup</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Sign Up</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form action="#" class="login" method="POST">
          <div class="field">
            <input type="text" placeholder="Username" name="username" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="">Sign Up now</a></div>
        </form>
        <form action="registration.php" class="signup" method="POST">
          <div class="field">
            <input type="text" placeholder="Email" name="email" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Username" name="username"required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Birth Date" name="birthdate" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Address" name="address" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Contact Number" name="contactnumber" required>
          </div>
 
   
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Sign Up">
          </div>
        </form>
         
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="page-footer">
    <div class="Clothing">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <h6 class="text-uppercase font-weight-bold">Stay home, Browse our Catalog, and Shop for Our Newest Fashion Items!</h6>
            <i class="fas fa-store"></i>
            <i class="fas fa-cart-arrow-down"></i>
            <i class="fa-solid fa-shirt"></i>
            <i class="fas fa-bell"></i>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <h6 class="text-uppercase font-weight-bold">Contact Us</h6>
            <p>1234 Tondo Manila, Philippines
              <br/>chillimanila.com
              <br/>chillimanila@gmail.com
              <br/> + 01 234 567 88</p>
            </div>
          </div>
          <div class="footer-copyright text-center">© 2022 ChilliManila Clothing Line</div>
        </footer>

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/Loginscript.js"></script>
      </body>
      </html>