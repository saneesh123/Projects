
<nav class="navbar navbar-default" style="background-color:rgb(255, 255, 255);color:black;">
<div class="container-fluid">
  <ul class="nav navbar-nav pull-left">
    <li><a href="index.php" style="margin:left:0px;"><img src="images/back.png"></a></li>
  </ul>

  <ul class="nav navbar-nav" style="width:50%;padding-left:40%;padding-top:10px;">
  <a href="index.php"  style="text-align:center;"><?php echo $category;?></a>


    </ul>



        <ul class="nav navbar-nav navbar-right" style="float:left;">

          <li style="margin-top:15px;" id="cart"><span  onClick="cartclicked()"><i class="fa fa-shopping-cart" aria-hidden="true" style="color:black;"></i>
          <span id="number" style="width:40px;height:15px;margin-right:20px;background-color:rgb(201, 194, 193);padding:3px;border-radius:2px;">0</span></span></li>




        </ul>
</div>



</nav>
