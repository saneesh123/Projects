<?php
include("include/config.php");
$id=$_GET['id'];

$query="DELETE FROM tax where id=$id;";
mysqli_query($bd,$query);
header("location:manage-product.php");

 ?>
