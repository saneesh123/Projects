<?php
include("include/config.php");
session_start();
error_reporting(0);
$_SESSION['m_succ']="";
$_SESSION['user']="";
$cid=$_GET['category'];
$result2=mysqli_query($bd,"select * from category where cid='$cid'");
$row2=mysqli_fetch_array($result2);
$category=$row2['categoryname'];
if (isset($_POST['login'])) {
  # code...
  $email=$_POST['email'];
  $password=$_POST['password'];


$query6="select * from user where email='$email' and password='$password'";
$result6=mysqli_query($bd,$query6);
$nums2=mysqli_num_rows($result6);

$row6=mysqli_fetch_array($result6);
if($nums2==1){
  $_SESSION['user']=$row6['name'];
}
else{
  $_SESSION['user']="";
}
}
if(isset($_POST['signup'])){
  $sname=$_POST['name'];
  $semail=$_POST['email'];
  $spassword=$_POST['password'];

  $query5="insert into user values('','$sname','$semail','$spassword')";
  $result5=mysqli_query($bd,$query5);
  $_SESSION['m_succ']="successfully registered";
}else{
  $_SESSION["m_succ"]="registeration unsuccessfull";
}
 ?>
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



<link rel="stylesheet" href="css/font-awesome.css">
<style>
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

div.scrollmenu {
    background-color: #ccc;
    overflow: auto;
    white-space: nowrap;
    margin-top:-5px;
    margin-bottom:10px;
}

div.scrollmenu a {
    display: inline-block;

    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu a:hover {
    background-color: #777;
}
.active{
  background-color:#14f5e8f5;
  color:#000;
}

</style>
  </head>
  <body style="margin:0px;padding:0px">
    <!--navbar -->
<?php include "include/item_navbar.php"; ?>
    <!--End navbar-->
    <!--Sidebar -->

    <!--Sidebar -->
    <!-- Main bod1y -->


<div class="container-fluid" style="top:10px;margin-left:0px;margin-right:0px;">
  <!-- Modal popup -->
<div class="modal fade " id="login" >
  <div class="modal-dialog">
    <div class="model-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" name="button">&times;</button>
        <h3><center>Login</center></h3>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email ID" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="" id="password" placeholder="Enter Password " class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="login" id="login" value="Login" class="btn btn-primary pull-right" onClick="modalclick()">
          </div>
          <div class="form-group">
            <label class=" pull-right">No account yet?<a herf="" data-toggle="modal" data-target="#register" data-dismiss="modal">SignUp here</a></label>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Modal Popup Ends -->
</div>

<div class="container-fluid" style="top:10px;margin-left:0px;margin-right:0px;">
<!-- Modal popup -->
<div class="modal fade " id="register" >
<div class="modal-dialog">
  <div class="model-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" name="button">&times;</button>
      <h3><center>Register</center></h3>
    </div>
    <div class="modal-body">
      <form method="post">
        <div class="form-group">
          <label class="pull-left">Name:</label>
          <input type="text" name="name" placeholder="Enter Name" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label class="pull-left">Email:</label>
          <input type="email" name="email" placeholder="Enter Email ID" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label class="pull-left">Password</label>
          <input type="password" name="password" value="" id="password" placeholder="Enter Password " class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="signup" id="signup" value="SignUp" class="btn btn-primary pull-right" >
        </div>
        <div class="form-group">
          <label class=" pull-right"><a herf="" data-toggle="modal" data-target="#login" data-dismiss="modal">Login here</a></label>
        </div>
      </form>

    </div>
  </div>

</div>
</div>

<!-- Modal Popup Ends -->
</div>
<div class="container-fluid" style="margin-top:50px;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php
       $cid=$_GET['category'];
       $result2=mysqli_query($bd,"select * from category where cid='$cid'");
       $row2=mysqli_fetch_array($result2);
       $category=$row2['categoryname'];
       $query1="select * from items where category='$category'";
          $result1=mysqli_query($bd,$query1);
          $cnt=1;
          $btnid=100;
          while($row1=mysqli_fetch_array($result1)){
            $qty=1;
            $name=$row1['name'];
            $type=$row1['type'];
  ?>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="float:left;margin-left:0px;margin:right:0px;color:black;">

        <img src="images/<?php echo $row1['image'];?>" class="img img-responsive img-rounded" style="float:left;" onClick="itemclicked('<?php echo $name; ?>')">

        <!--<div class="top-left">Top Left</div>
        <div class="top-right">Top Right</div>-->
      <div class="top" style="color:rgb(36, 11, 1);margin-left:-5px"><center><h4><?php echo $name;?></h4></center></div>
        <div class="top-left">
          <?php if($type==0){?>
          <img src="images/veg.png" alt="" width="30px;" height="30px;">
        <?php }else{?>
          <img src="images/non-veg.png" alt="" width="30px;" height="30px;">
        <?php } ?>
        </div>
        <div class="bottom-left" style="color:Green;width:20%;font-size:20px;"><i class="fa fa-inr" aria-hidden="true"></i><b><?php echo $row1['price']; ?></b></div>
        <div class="bottom-center">
          <span style="font-size:15px;">Qty:</span><button type="button" name="minus" class="btn btn-primary btn-xs " id="<?php echo $btnid; ?>" onClick='decrement("<?php echo $cnt;?>","<?php echo $btnid; ?>")'disabled><i class="glyphicon glyphicon-minus"></i></button>
          <span style="width:25px;height:30px;font-size:15px;" id="<?php echo $cnt; ?>">1</span>
          <button type="button" name="add" class="btn btn-info btn-xs" onClick='increment("<?php echo $cnt;?>","<?php echo $btnid; ?>")'><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <div class="bottom-right"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color:red;padding-right:10px;padding-bottom:10px;" onClick="addcart('<?php echo $cnt; ?>','<?php echo $name; ?>')"></i></div>

      </div>

    <?php $cnt++;
  $btnid++;} ?>
  </div>

</div>






    <!-- End Main Body -->



    <script>
      $(document).ready(function(){
        check();
    $('#same').removeClass('active');

    var cname="<?php echo $cid; ?>";
  //  alert(cname);
    $('#'+cname).addClass('active');

      /*  $( '.scrollmenu a' ).on( 'click', function() {
          $( this ).parent().find( 'a.active' ).removeClass( 'active' );
          $( this ).addClass( 'active' );
    });/
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
            //alert(pro);
            //window.location="carousel.php?product="+pro;
              window.location="item_clicked.php?product="+pro;
          }
    function  cartclicked(){
      window.location="cartitems.php";
    }
    function navselect(category){
      //alert(category);
      window.location="item_nav_select.php?category="+category;
    }

  </script>
  </body>
</html>
