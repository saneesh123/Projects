<?php
include("include/config.php");
$id=$_GET['id'];

$query="DELETE FROM subcategory where id=$id;";
mysqli_query($bd,$query);
header("location:http://localhost/AdminLTE/sub-category.php");

 ?>