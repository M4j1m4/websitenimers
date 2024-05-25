<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($link, "delete from login where id=$id");
?>


<?php
echo '<script>alert("Data has been successfully erased.  ")</script>';
?>
<script type="text/javascript">
window.location="index.php";
</script>
