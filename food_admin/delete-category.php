<?php
include("include/config.php");
$id=$_GET['id'];

$query="DELETE FROM category where id=$id;";
mysqli_query($bd,$query);
header("location:create-category.php");

 ?>
