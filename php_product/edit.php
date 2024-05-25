<?php
include "connection.php";
$id=$_GET["id"];

$itemname="";
$itemprice="";
$stockquantity="";
$productvariant="";
$image="";   //phpMyAdmin names

$res=mysqli_query($link, "select * from products where id=$id");
while($row=mysqli_fetch_array($res))
{
    $itemnane=$row["itemname"];
    $itemprice=$row["itemprice"];
    $stockquantity=$row["stockquantity"];
    $productvariant=$row["productvariant"];
    $image=$row["image"];  
}

?>

<html lang="en">
<head>
 <title>Inventory</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" 
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="php.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
   <?php include "php.css" ?>
</style>
<body>

<div class="container">
<div class="column" >
  <h2>Inventory</h2>

  <img class="img-profile rounded-circle" src="<?php echo $image; ?>" height="100" width="100">

  <form action="" name="form1" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label for="itemname">Item Name: </label>
       <input type="text" class="form-control" id="itemname" placeholder="Enter itemname" name="itemname" value="<?php echo $itemname; ?>">
     </div>
    <div class="form-group">
       <label for="itemprice">Item Price:</label>
       <input type="text" class="form-control" id="itemprice" placeholder="Enter itemprice" name="itemprice" value="<?php echo $itemprice; ?>">
    </div>
    <div class="form-group">
       <label for="stockquantity">Stock Quantity:</label>
       <input type="text" class="form-control" id="stockquantity" placeholder="Enter stockquantity" name="stockquantity" value="<?php echo $stockquantity; ?>">
    </div>
    <div class="form-group">
       <label for="productquantiy">Product Variant:</label>
       <input type="text" class="form-control" id="productvariant" placeholder="Enter productvariant" name="productvariant" value="<?php echo $productvariant; ?>">
    </div>
    <div class="form-group">
       <label for="image">Image:</label>
       <input type="file" class="form-control" name="pics">
    </div>

 <button type="submit" name="update" class="btn btn-default">Update</button>

 </form>
</div>
</div>


</div>

</body>
<?php
if(isset($_POST["update"]))
{
   $tm=md5(time());
   $fnm=$_FILES["pics"]["name"];

   if($fnm=="")
{
   mysqli_query($link,"update products set itemname='$_POST[itemname]',itemprice='$_POST[itemprice]',stockquantity='$_POST[stockquantity]',productvariant='$_POST[productvariant]' where id=$id"); 
}
else
{
   $dst="./images/".$tm.$fnm;
   $dst1="images/".$tm.$fnm;
   move_uploaded_file($_FILES["pics"]["tmp_name"], $dst);

   mysqli_query($link,"update products set itemname='$_POST[itemname]',itemprice='$_POST[itemprice]',stockquantity='$_POST[stockquantity]',productvariant='$_POST[productvariant]',image='$dst1' where id=$id"); // phpMyadmin Name
}


?>

<script type="text/javascript">
window.location="index.php";
</script>
<?php
}
?>


</html>

