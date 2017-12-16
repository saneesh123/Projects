<?php
include "include/config.php";

$query="select * from cart;";
$result=mysqli_query($bd,$query);
$nums=mysqli_num_rows($result);

echo $nums;

 ?>
