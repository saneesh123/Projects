<nav class="navbar navbar-light" style="background-color:rgb(255, 255, 255);color:black;">

  <img src="images/i2.jpg" alt="" width="" height="50px;" style="float:left;">
      <div class="navbar-header" style="width:100px;float:left;">
        <a class="navbar-brand" href="#">Foody's</a>

      </div>

    </ul>
      <ul class="nav navbar-nav navbar-right" style="float:left;">

        <li style="margin-top:15px;" id="cart"><span  onClick="cartclicked()"><i class="fa fa-shopping-cart" aria-hidden="true" ></i>cart
        <span id="number" style="width:40px;height:15px;background-color:rgb(201, 194, 193);padding:3px;border-radius:2px;">0</span></span></li>

    <li><a herf="" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>


      </ul>
</nav>
<!--<nav class="navbar navbar-default" style="top:-22px;background-color:rgb(255, 255, 255);color:black;">
<div class="container-fluid">

    <ul class="nav navbar-nav ">
      <li class="active"><a href="index.php">Home</a></li>
      <?php $query="select * from category;";
      $result=mysqli_query($bd,$query);
      while($row=mysqli_fetch_array($result)){ ?>
      <li ><a onClick="navselect('<?php echo $row['categoryname'];?>')"><?php echo $row['categoryname'];?></a></li>
    <?php } ?>


</div>
</nav>-->
<div class="scrollmenu">
  <a href="index.php" class="active" id="same" style="border-right:2px solid rgb(255, 130, 0);">Home</a>
  <?php $query="select * from category;";
  $cntnum=1;
  $result=mysqli_query($bd,$query);
  while($row=mysqli_fetch_array($result)){ ?>
<a class="" onClick="navselect('<?php echo $row['cid'];?>')" id="<?php echo $cntnum;?>" style="border-right:2px solid rgb(255, 130, 0);"><?php echo $row['categoryname'];?></a>
<?php $cntnum++;} ?>

</div>
