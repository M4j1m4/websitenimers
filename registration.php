<?php 

session_start();
header('location:Login.php');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'user');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$contactnumber = $_POST['contactnumber'];
$usertype = $_POST['usertype'];


$s = "select * from login where username = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);
if($row["usertype"]!="Admin")
    {

        $usertype="User";
        mysqli_query($link,"insert into Login 
        values(NULL,NULL,NULL,NULL,NULL,NULL,NULL,$usertype')");


    }
if($num == 1){
    echo" Username Already Taken";
}else{
    $reg= " insert into login(email , username , password , birthdate , address , contactnumber , usertype) values ('$email','$username','$password','$birthdate','$address','$contactnumber','$usertype')";
    mysqli_query($con, $reg);
    echo" Registration Successful";
}
?>