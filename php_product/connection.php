<?php
  $link=mysqli_connect("localhost", "root", "") or die(mysqli_error($link));
  mysqli_select_db($link, "product_admin") or die(mysqli_error($link));   //use to call php_connection from the phpmyadmin 
  

?>