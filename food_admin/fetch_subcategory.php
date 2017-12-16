<?php
include 'include/config.php';
if(isset($_POST['category']))
{
  $cate=$_POST['category'];
  echo $query1="SELECT * from category where categoryname='$cate'";
  $result1=mysqli_query($bd,$query1);
  $row1=mysqli_fetch_array($result1);
  $cid=$row1['cid'];

  echo $query2="SELECT * FROM subcategory where cid='$cid'";
  $result2=mysqli_query($bd,$query2);

$sublist = array();
$html='';
   while($row2=mysqli_fetch_array($result2))
    {
$html.='<option value='.$row2["subname"].'>'.$row2["subname"].'</option>';
    }


echo $html;

}

 ?>
