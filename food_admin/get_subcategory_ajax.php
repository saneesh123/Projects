<?php
require 'include/config.php';
if(isset($_POST['category'])){
$cate=$_POST['category'];

 $query="SELECT * FROM category WHERE categoryname='$cate' ";
 $result=mysqli_query($bd,$query);
 $row=mysqli_fetch_array($result);

 $cid=$row['cid'];

  $query1="SELECT * FROM subcategory WHERE cid='$cid'";
 $result1=mysqli_query($bd,$query1);
 $html='';
 $html.='<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">';
$html.='<thead>
  <tr>
    <th>#</th>

    <th>Category Name</th>
    <th>Subcategory</th>

    <th>Action</th>
  </tr>
</thead>';
$html.='<tbody>';
$cnt=1;
 while($row1=mysqli_fetch_array($result1))
 {
$html.="<tr>
  <td>".$cnt."</td>
  <td>".$row['categoryname']."</td>
  <td>".$row1['subname']."</td>


  <td>
  <a href='edit-subcategory.php?id=".$row1['id']."'><i class='fa fa-pencil-square-o'></i></a>
  <a href='delete-subcategory.php?id=".$row1['id']."'><i class='fa fa-trash-o'></i></a></td>
</tr>";
$cnt=$cnt+1;
 }

echo $html;
}


 ?>
