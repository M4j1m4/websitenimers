<?php
include "connection.php" 

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
<style>
   <?php include "php.css" ?>
</style>
<body>
<div class="button">
    <span class="fa-solid fa-arrow-right"></span>
  </div>
 

 
  <div class="sidebar">
    <div class="text">ChilliManila Clothing</div>
    <ul class="list">
      
        <a href="#" class="nav-link">
          <i class="fa fa-home icon"></i>
          <span class="link">Product Management</span>
        </a>
      </li>
     
        <a href="/FINALPROJECT/usermanagement/index.php" class="nav-link">
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

<div class="container">
<div class=" column">
  <h2 class="h2">Inventory</h2>
  <form action="" name="form1" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label for="itemname">Item Name: </label>
       <input type="text" class="form-control" id="itemname" placeholder="Enter itemname" name="itemname">
     </div>
    <div class="form-group">
       <label for="itemprice">Item Price:</label>
       <input type="text" class="form-control" id="itemprice" placeholder="Enter itemprice" name="itemprice">
    </div>
    <div class="form-group">
       <label for="stockquantity">Stock Quantity:</label>
       <input type="text" class="form-control" id="stockquantity" placeholder="Enter stockquantity" name="stockquantity">
    </div>
    <div class="form-group">
       <label for="productvariant">Product Variant:</label>
       <input type="text" class="form-control" id="productvariant" placeholder="Enter productvariant" name="productvariant">
    </div>
    <div class="form-group">
       <label for="image">Image:</label>
       <input type="file" class="form-control" name="pics"> 
    </div>

 <button type="submit" name="insert" class="btn btn-default">Insert</button>
 </form>
</div>
</div>

<div class="col-lg-12"> 

<table class="table table-bordered">
 <thead class="head">
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Item Name</th>
        <th>Item Price</th>
     
        <th>Stock Quantity</th>
        <th>Product Variant</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
 </thead>
 <tbody class="tbody">
<?php   
$res=mysqli_query($link,"select * from products");
while($row=mysqli_fetch_array($res))
{
    echo "<tr>";
    echo "<td>"; echo $row["id"]; echo "</td>";
    echo "<td>"; ?><img src="<?php echo $row["image"];?>" height="100" width="100"><?php echo "</td>"; //phpMyadmin Name
    echo "<td>"; echo $row["itemname"]; echo "</td>";
    echo "<td>"; echo $row["itemprice"]; echo "</td>";
   
    echo "<td>"; echo $row["stockquantity"]; echo "</td>";
    echo "<td>"; echo $row["productvariant"]; echo "</td>";
    echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"> <button type="button" class="btn-success">EDIT</button></a><?php echo "</td>";
    echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"> <button type="button" class="btn-danger">DELETE</button></a><?php echo "</td>";

    echo "</tr>";
}

?>
 </tbody>
 </table>


</div>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="Loginscript.js"></script>
</body>



    <?php
    if(isset($_POST["insert"]))           // insert is the button function name above
    {
        $tm=md5(time());
        $fnm=$_FILES["pics"]["name"];
        $dst="./images/".$tm.$fnm;
        $dst1="images/".$tm.$fnm;
        move_uploaded_file($_FILES["pics"]["tmp_name"], $dst);

        mysqli_query($link,"insert into products values(NULL,'$_POST[itemname]','$_POST[itemprice]','$_POST[stockquantity]','$_POST[productvariant]','$dst1')");

        ?>
        <script type="text/javascript">
        window.location.href=window.location.href
        </script>
        <?php

    }

  /*
if(isset($_POST["delete"]))
{
    mysqli_query($link, "delete from product where itemname='$_POST[itemname]'") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
    window.location.href=window.location.href
    </script>
    <?php

}
if(isset($_POST["update"]))
{
    mysqli_query($link, "update product set itemname='$_POST[itemprice]' where firstname='$_POST[itemname]'") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
    window.location.href=window.location.href
    </script>
    <?php

} */
?>

</html>

