<?php
include "include/config.php";
session_start();
if(isset($_GET['email1']))
{
  $email=$_GET['email1'];
  $password=$_GET['password1'];
  $query="select * from admin where username='$email' and password='$password'"
  $result=mysqli_query($bd,$query);
  $nums=mysqli_num_rows($result);
  if ($nums>0) {
    $_SESSION['login']=$email;
  }else{
    $_SESSION['login']="";
  }
}

 ?>
