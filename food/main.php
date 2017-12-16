<?php
session_start();
error_reporting(0);
include("include/config.php");

?>
  <!DOCTYPE html>
  <html>
      <head>
          <title>E-commerce</title>
          <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <script type="text/javascript" src="js/jquery-3.2.1.min.js">

      </script>
          <link rel="stylesheet" type="text/css" href="css/style.css">
          <link rel="stylesheet" type="text/css" href="css/animate.css">
      </head>
      <body style="background-color:rgb(241, 236, 242);">
      <?php include("include/main_header.php"); ?>
      <?php include("include/main.sidebar.php"); ?>


      <div id="myCarousel" class="carousel slide" data-ride="carousel" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="carousel-images/1.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="carousel-images/2.jpg" alt="Chicago">
    </div>


    <div class="item">
      <img src="carousel-images/4.jpg" alt="New York">
    </div>
    <div class="item">
      <img src="carousel-images/5.jpg" alt="New York">
    </div>
    <div class="item">
      <img src="carousel-images/6.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div style="margin-top:7px;color:black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div class="col-md-2" style="margin-top:0px;height:285px;float:left; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <center><h4 style="margin-top:125px;">Smatphones</h4></center>
    <center><button type="button" name="button" class="btn btn-primary" >View All</button></center>
  </div>
  <div id="myCarousel1" class="col-md-10 carousel slide" data-interval="false" data-ride="carousel1">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>

</ol>

<!-- Wrapper for slides -->
<?php
$query1="select * from product where subcat='Smartphone'";
$result1=mysqli_query($bd,$query1);

$num1=mysqli_num_rows($result1);
$cnt=0
 ?>

<div class="carousel-inner">
<div class="item active" id="ontop">
  <?php

while(($cnt<3)&&($cnt<$num1)&&$row1=mysqli_fetch_array($result1)){
    $name= $row1['name'];
   ?>
  <div class="col-md-3" style="name">
    <div class="" style="float:left;margin-left:150px;">
      <div class="" id="<?php echo $row1['name']; ?>">
        <center><h5 style="text-transform:upppercase;color:rgb(8, 43, 147);"><b><?php echo $row1['name']; ?></b></h5></center>
      </div>
      <a href="#" id="img-name"><img src="productimages/<?php echo $row1['image']; ?>" alt="Chicago" height="200px" width="150px"></a>
      <div class="" style="margin-top:9px;">
        <span  style="margin-top:15px;color:blue;" id="price"><?php echo $row1['price']; ?></span>
      <center><button type="button" class="btn btn-danger btn-xs pull-right" name="button" onClick="carting('<?php echo $name; ?>')">AddToCart</button></center>
      </div>
  </div>


</div>
<?php
$cnt++;

}
 ?>
</div>
<div class="item" id="ontop">
  <?php

while(($cnt<6)&&($cnt<$num1)&&$row1=mysqli_fetch_array($result1)){
  $name= $row1['name'];
   ?>
  <div class="col-md-3" style="margin-left:75px;float:left;">
    <div class="" style="float:left;margin-left:150px;">
      <div class="" id="name">
        <center><h5 style="text-transform:upppercase;color:rgb(8, 43, 147);"><b><?php echo $name; ?></b></h5></center>
      </div>
      <a href="#" id="img-name"><img src="productimages/<?php echo $row1['image']; ?>" alt="Chicago" height="200px" width="150px"></a>
      <div class="" style="margin-top:9px;">
        <span style="margin-top:5px;color:blue;" id="price"><?php echo $row1['price']; ?></span>
      <center><button type="button" class="btn btn-danger btn-xs pull-right" name="button" onClick="carting('<?php echo $name; ?>')">AddToCart</button></center>
      </div>
  </div>


</div>
<?php
$cnt++;

}
 ?>
</div>


</div>


<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel1" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel1" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
<div class="" style="margin-top:10px;">

</div>
<div class="carousel slide"style="margin-top:100px;color:black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div class="col-md-2" style="margin-top:0px;height:285px;float:left; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <center><h4 style="margin-top:125px;">Laptops</h4></center>
    <center><button type="button" name="button" class="btn btn-primary" >View All</button></center>
  </div>
  <div id="myCarousel2" class="col-md-10 carousel slide" data-ride="carousel" data-interval="false"  style="float:left;">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>

</ol>

<!-- Wrapper for slides -->
<?php
$query1="select * from product where subcat='Laptops'";
$result1=mysqli_query($bd,$query1);

$num1=mysqli_num_rows($result1);
$cnt=0
 ?>

<div class="carousel-inner">
<div class="item active" id="ontop">
  <?php

while(($cnt<3)&&($cnt<$num1)&&$row1=mysqli_fetch_array($result1)){
$name= $row1['name'];
   ?>
  <div class="col-md-3" style="margin-left:75px;float:left;">
    <div class="" style="float:left;margin-left:80px;">
      <div class=""id="name">
        <center><h5 style="text-transform:upppercase;color:rgb(8, 43, 147);"><b><?php echo $name; ?></b></h5></center>
      </div>
      <a href="#" id="img-name"><img src="productimages/<?php echo $row1['image']; ?>" alt="Chicago" height="200px" width="150px"></a>
      <div class="" style="margin-top:9px;">
        <span id="price"><?php echo $row1['price']; ?></span>
      <center><button type="button" class="btn btn-danger btn-xs pull-right" value="AddToCart" name="addcart" onClick="carting('<?php echo $name; ?>')">AddToCart</button>
      </div>
  </div>


</div>
<?php
$cnt++;

}
 ?>
</div>



</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel2" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel2" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>

<div class="" style="margin-top:100px; height:150px;">
  <?php include("include/footer.php"); ?>
</div>
<script>
$(document).ready(function(){

 var navOffset=$("#second").offset().top;
 /*$(window).scroll(function(){

   var scrollPos=$(window).scrollTop();

   if(scollPos>navOffset){
     $("#second").addClass('fixed');
   else{
     $("#second").removeClass('fixed');
   }
 }
});*/
check();
});
function carting(name){

//$.session.set("name",name);
//alert($.session.get("name"));

 $.ajax({

    url:"cart.php",
    type:"POST",
    traditional:true,
    data:{name1:name},
    dataType:"html",

    success:function(data){

    alert(data);
    check();
    }



  });
}
function check(){

  $.ajax({

    url:"updatecart.php",
    type:"POST",
    traditional:true,
    dataType:"html",

    success:function(data){

    $('#number').empty();
    $('#number').append(data);

    }



  });
}

</script>

    </body>
</html>
