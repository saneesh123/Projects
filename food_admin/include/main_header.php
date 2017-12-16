<nav class="navbar navbar-default">

    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shopping</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">All</a></li>
      <?php $query="select * from category;";
      $result=mysqli_query($bd,$query);
      while($row=mysqli_fetch_array($result)){ ?>
      <li><a href="#"><?php echo $row['categoryname'];?></a></li>
    <?php } ?>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><button type="button" name="button" class="btn btn-primary" style="margin-top:10px;"  onClick="<?php header('loacation:cartitems.php');?>"><i class="fa fa-shopping-cart" aria-hidden="true" ></i>cart
        <span id="number" style="width:40px;height:15px;background-color:rgb(201, 194, 193);padding:3px;border-radius:2px;">0</span></button></li>
        <li><a href="login.php">Login</a></li>
      </ul>


</nav>
