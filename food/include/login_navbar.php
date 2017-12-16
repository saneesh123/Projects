<nav class="navbar navbar-light" style="background-color:rgb(255, 255, 255);color:black;">

      <div class="navbar-header" style="width:100px;float:left;">
        <a class="navbar-brand" href="#">Foody's</a>
      </div>
    </ul>
      <ul class="nav navbar-nav navbar-right" style="float:left;">

        <li style="margin-top:15px;" id="cart"><span  onClick="cartclicked()"><i class="fa fa-shopping-cart" aria-hidden="true" ></i>cart
        <span id="number" style="width:40px;height:15px;background-color:rgb(201, 194, 193);padding:3px;border-radius:2px;">0</span></span></li>

  <!--  <li><a href=""><i class="fa fa-user" aria-hidden="true"></i><?php echo $_SESSION['user'];?></a></li>-->
  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php echo $_SESSION['user'];?><i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu ">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" width="50%" height="50%" />
                            <p>
                                <?php echo $_SESSION['user'];?>

                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">

                            </div>
                            <div class="col-xs-4 text-center">

                            </div>
                            <div class="col-xs-4 text-center">

                            </div>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">

                            </div>
                            <div class="pull-left">
                                <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i><span> Sign out</span></a>
                            </div>
                        </li>
                    </ul>
                </li>


      </ul>
</nav>
<nav class="navbar navbar-default" style="top:-22px;background-color:rgb(255, 255, 255);color:black;">
<div class="container-fluid">

    <ul class="nav navbar-nav ">
      <li class="active"><a href="index.php">Home</a></li>
      <?php $query="select * from category;";
      $result=mysqli_query($bd,$query);
      while($row=mysqli_fetch_array($result)){ ?>
      <li><a href="#" onClick="navselect('<?php echo $row['categoryname'];?>')"><?php echo $row['categoryname'];?></a></li>
    <?php } ?>


</div>
</nav>
