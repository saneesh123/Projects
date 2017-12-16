<?php include "include/config.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shopping</title>
    <link rel="stylesheet" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.css">
  </head>
  <body>
    <?php $product=$_GET['product'];

    $query="select * from product where name='$product'";
    $result=mysqli_query($bd,$query);
    $row=mysqli_fetch_array($result);
    $category=$row['category'];
    $name=$row['name'];
    $qty=1;
    $cnt=1;
    include "include/product_details_nav.php";
    ?>
  <div class="container-fluid">
  <div class="row">



      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 item active" style="height:300px;"onClick="productclicked('<?php echo $name?>')" >

          <img class="thumbnail"  src="productimages/<?php echo $row['image'];?>" alt="" width="100%" height="100%" >



          <!--<div id="overlay-wrapper">
              <div id="overlay-content-box">
                    <center>  <span style=""><b><?php echo $row1['name']; ?></b></span></center>
                    <center style="margin-top:50%;height:0%;">
                            <span ><b><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row1['price']; ?></b></span>
                          <span style="margin-left:2%;"><b>Qty:</b></span>
                          <button type="button" name="minus" class="btn btn-info btn-xs"style="width:15px;height:15px;;" onClick='decrement("<?php echo $cnt;?>")'disabled>-</button>
                             <span style="color:rgb(0, 17, 245);" id="<?php echo $cnt; ?>"><b><?php echo $qty?></b></span>
                             <button type="button" name="add" class="btn btn-primary  btn-xs" style="width:15px;height:15px;"onClick='increment("<?php echo $cnt;?>")'>+</button>
                             <button type="button" name="button" class="btn btn-danger btn-xs" style="padding:5px;width:40px;margin-left:2%"onClick="addcart('<?php echo $cnt; ?>','<?php echo $name; ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </center>
              </div>
          </div>-->

       <div class="content" style="width:93%;height:100%;color:;">
         <div class="head"style="margin-left:5%;margin-top:2%;width:90%;">
    <center>  <span style="font-size:20px;font-family:sans-sarif;"><b><?php echo $row['name']; ?></b></span></center>
         </div>

    <div class="footer" style="margin-left:5%;margin-top:65%;width:90%;">

    <center >
        <span ><b><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['price']; ?></b></span>
      <span style="margin-left:2%;"><b>Qty:</b></span>
      <button type="button" name="minus" class="btn btn-info btn-xs"style="width:15px;height:15px;;" onClick='decrement("<?php echo $cnt;?>")'disabled>-</button>
         <span style="color:rgb(0, 17, 245);" id="<?php echo $cnt; ?>"><b><?php echo $qty?></b></span>
         <button type="button" name="add" class="btn btn-primary  btn-xs" style="width:15px;height:15px;"onClick='increment("<?php echo $cnt;?>")'>+</button>
         <button type="button" name="button" class="btn btn-danger btn-xs" style="padding:5px;width:40px;margin-left:2%"onClick="addcart('<?php echo $cnt; ?>','<?php echo $name; ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
    </center>
    </div>
      </div>

</div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4">
    <div class="jumbotron" >
    <p>Specification:</p>
    <p><?php echo $row['details']; ?></p>
    </div>
    </div>

  </div>
</div>


  </body>

</html>
