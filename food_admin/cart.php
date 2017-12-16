<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['name1']))
{
$name=$_POST['name1'];
$id=$_POST['id1'];
$_SESSION['name']=$name;

$query3="select * from cart where name='$name'";
$result3=mysqli_query($bd,$query3);
$num4=mysqli_num_rows($result3);
$row3=mysqli_fetch_array($result3);
    if($num4>0)
      {
        $qty=$row3['quantity'];
        $new=$qty+$id;

          $query4="UPDATE cart set quantity='$new' where name='$name'";
          mysqli_query($bd,$query4);
          echo "Already there quantity incremented";
        }
        else{

            $name=$_POST['name1'];
             $query="select * from product where name='$name';";
             $result=mysqli_query($bd,$query);
             $row=mysqli_fetch_array($result);

             $price=$row['price'];
              $image=$row['image'];


             $query1="INSERT INTO cart values('','$name','$price','$id','$image');";
            $result1=mysqli_query($bd,$query1);

        echo "successfully added to cart";
            }
      }


 ?>
