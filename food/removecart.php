<?php
include("include/config.php");

if(isset($_POST['name1'])){
  $name=$_POST['name1'];
  $query="DELETE from cart where name='$name'";
  $result=mysqli_query($bd,$query);


}
 ?>
