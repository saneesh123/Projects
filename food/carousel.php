<?php include "include/config.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Foody's</title>
    <link rel="stylesheet" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>

<link rel="stylesheet" href="css/font-awesome.css">
<style >
.container-fluid {
    position: relative;
    text-align: center;
    color: white;
}

.bottom-left {
    position: absolute;
    bottom:20px;
    left: 25px;
}

.top-left {
    position: absolute;
    top: 8px;
    left: 25px;
}

.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

.bottom-right {
    position: absolute;
    bottom:20 px;
    right: 25px;

}


.top{
  position: absolute;
  top: 5px;
  width:100%;
}
.bottom-center{
  position: absolute;
  bottom: 20px;
  right: 32%;

}
#cart:hover{
  cursor: pointer;
}
.navbar-collapse.collapse {
  display: block!important;
}

.navbar-nav>li, .navbar-nav {
  float: left !important;
}

.navbar-nav.navbar-right:last-child {
  margin-right: -15px !important;
}

.navbar-right {
  float: right!important;
}
.bottom-right:hover{
  cursor: pointer;
}
.modal-backdrop {
   background-color: black;
}


</style>
  </head>
  <body>
    <?php
    $item=$_GET['product'];


    $query="select * from items where name='$item'";
    $result=mysqli_query($bd,$query);

    $row=mysqli_fetch_array($result);
    $category=$row['category'];
     $category;
    $name=$row['name'];

    $qty=1;
    $cnt=1;
    $type=$row['type'];
    $btnid=100;
    include "include/product_details_nav.php";
    ?>
    <div class="col-md-6 col-md-offset-3">


    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
  <!-- Indicators -->
<?php
?>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active" >
      <div class="col-md-6 col-md-offset-3" >
        <div class="container-fluid" style="color:rgb(0, 10, 255);">
        <img src="images/<?php echo $row['image'];?>" class="img  img-rounded img-responsive" style="float:left;" onClick="itemclicked('<?php echo $name; ?>')">

        <!--<div class="top-left">Top Left</div>
        <div class="top-right">Top Right</div>-->
      <div class="top" style="color:rgb(36, 11, 1);margin-left:-5p"><center><h4><?php echo $name;?></h4></center></div>
        <div class="top-left">
          <?php if($type==0){?>
          <img src="images/veg.png" alt="" width="30px;" height="30px;">
        <?php }else{?>
          <img src="images/non-veg.png" alt="" width="30px;" height="30px;">
        <?php } ?>
        </div>
        <div class="bottom-left" style="color:Green;width:20%;font-size:20px;"><i class="fa fa-inr" aria-hidden="true"></i><b><?php echo $row['price']; ?></b></div>
        <div class="bottom-center">
          <span style="font-size:15px;">Qty:</span><button type="button" name="minus" class="btn btn-primary btn-xs "  id="<?php echo $btnid; ?>" onClick='decrement("<?php echo $cnt;?>","<?php echo $btnid; ?>")'disabled><i class="glyphicon glyphicon-minus"></i></button>
          <span style="width:25px;height:30px;font-size:15px;" id="<?php echo $cnt; ?>">1</span>
          <button type="button" name="add" class="btn btn-info btn-xs" onClick='increment("<?php echo $cnt;?>","<?php echo $btnid; ?>")'><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <div class="bottom-right"><i class="fa fa-shopping-cart" aria-hidden="true" style="color:red;font-size:35px;padding-right:10px;padding-bottom:10px;" onClick="addcart('<?php echo $cnt; ?>','<?php echo $name; ?>')"></i></div>

      </div>
      </div>
      <div class="col-md-6 col-md-offset-3" >
      <div class="jumbotron" >
      <p>Item Details:</p>
      <p><?php echo $row['details']; ?></p>
      </div>
      </div>
</div>




    <?php
    $query1="select * from items where category='$category' and name!='$name' ";
    $result1=mysqli_query($bd,$query1);
    $cnt++;
    $btnid=101;
    while($row1=mysqli_fetch_array($result1)){
      $name1=$row1['name'];
      $type1=$row1['type'];
    ?>

    <div class="item">

      <div class="col-md-6 col-md-offset-3" >
        <div class="container-fluid" style="color:rgb(0, 10, 255);">
        <img src="images/<?php echo $row1['image'];?>" class="img img-responsive img-rounded"  style="float:left;" >

        <!--<div class="top-left">Top Left</div>
        <div class="top-right">Top Right</div>-->
      <div class="top" style="color:rgb(36, 11, 1);margin-left:-5p"><center><h4><?php echo $name1;?></h4></center></div>
        <div class="top-left">
          <?php if($type1==0){?>
          <img src="images/veg.png" alt="" width="30px;" height="30px;">
        <?php }else{?>
          <img src="images/non-veg.png" alt="" width="30px;" height="30px;">
        <?php } ?>
        </div>
        <div class="bottom-left" style="color:Green;width:20%;font-size:20px;"><i class="fa fa-inr" aria-hidden="true"></i><b><?php echo $row1['price']; ?></b></div>
        <div class="bottom-center">
          <span style="font-size:15px;">Qty:</span><button type="button" name="minus" class="btn btn-primary btn-xs "  id="<?php echo $btnid; ?>" onClick='decrement("<?php echo $cnt;?>","<?php echo $btnid; ?>")'disabled><i class="glyphicon glyphicon-minus"></i></button>
          <span style="width:25px;height:30px;font-size:15px;" id="<?php echo $cnt; ?>">1</span>
          <button type="button" name="add" class="btn btn-info btn-xs" onClick='increment("<?php echo $cnt;?>","<?php echo $btnid; ?>")'><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <div class="bottom-right"><i class="fa fa-shopping-cart" aria-hidden="true" style="color:red;font-size:35px;padding-right:10px;padding-bottom:10px;" onClick="addcart('<?php echo $cnt; ?>','<?php echo $name; ?>')"></i></div>

      </div>
      </div>


    <div class="col-md-6 col-md-offset-3" >
    <div class="jumbotron" >
    <p>Item Details:</p>
    <p><?php echo $row1['details']; ?></p>
    </div>
    </div>
    </div>
  <?php $btnid++;$cnt++;} ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="background-image:none;">
    <!--<span class="glyphicon glyphicon-chevron-left" style="color:black;"></span>-->
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next" style="background-image:none;">
  <!--  <span class="glyphicon glyphicon-chevron-right"  style="color:black;"></span>-->
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>

  <script>
    $(document).ready(function(){
      check();

      $( '.scrollmenu a' ).on( 'click', function() {
        $( this ).parent().find( 'a.active' ).removeClass( 'active' );
        $( this ).addClass( 'active' );
  });
      /*$( 'ul.nav li' ).on( 'click', function() {
        $( this ).parent().find( 'li.active' ).removeClass( 'active' );
        $( this ).addClass( 'active' );
  });
      $("#side-btn").click(function(){
        $("#sidebar").toggleClass('visible');
      });*/

    });
    function downtoggel(){
    var top=$('#myNavbar').offset().top;

    if(top<51){

      document.getElementById("side-btn").style.marginTop='200px';
    }else{
      document.getElementById("side-btn").style.marginTop='15px';
    }
  }

    function slidecontent(){

      var width=$('#content').offset().left;

      if(width<=100){
      document.getElementById("content").style.marginLeft='300px';
    }else{
      document.getElementById("content").style.marginLeft='100px';
    }
    }
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

    function decrement(id,btnid){
  //alert(btnid);
      var qty=$('#'+id).text();
      if(qty==2)
      {
         $("#"+btnid).attr("disabled", "disabled").button('refresh');
      }
      qty--;
      $('#'+id).empty();
      $('#'+id).append(qty);
    }
    function increment(id,btnid){
  //alert(btnid);
      var qty=$('#'+id).text();
      if(qty>=1){
        $("#"+btnid).removeAttr("disabled").button('refresh');
      }
      qty++;
      $('#'+id).empty();
      $('#'+id).append(qty);
    }
    function addcart(id,name){

      var qty=$('#'+id).text();

      $.ajax({

         url:"cart.php",
         type:"POST",
         traditional:true,
         data:{name1:name,id1:qty},
         dataType:"html",

         success:function(data){

         alert(data);
         check();
         }



       });
    }
    function itemclicked(pro)
        {
          alert(pro);
          window.location="carousel.php?product="+pro;
        }
  function  cartclicked(){
    window.location="cartitems.php";
  }
  function navselect(category){
    alert(category);
    window.location="item_nav_select.php?category="+category;
  }
  $(".carousel").swipe({
alert("swipe");
  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});
  </script>
</body>

</html>
