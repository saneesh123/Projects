<?php
include("include/config.php");
session_start();
error_reporting(0);
$_SESSION['m_succ']="";
$_SESSION['user']="";
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
    <title>Shopping</title>
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
  right: 38%;

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
    background-color: #333;
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
  background-color:white;
  color:black;
}



</style>
  </head>
  <body style="margin:0px;padding:0px">

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="float:left;margin-left:0px;margin:right:0px;color:black;">

          <button type="button" class="btn btn-primary btn-xs" name="button" disabled ><i class="glyphicon glyphicon-minus"></i></button>


          <a href="" name="minus" class="btn btn-primary" style="width:10px;height:15px;padding-top:0px;" id="<?php echo $btnid; ?>" onClick='decrement("<?php echo $cnt;?>","<?php echo $btnid; ?>")'disabled>-</a>
          <a href="" name="add" class="btn btn-info " style="width:10px;height:15px;padding-top:0px;padding-bottom:2px;" onClick='increment("<?php echo $cnt;?>","<?php echo $btnid; ?>")'>+</a>

      </div>


  </div>
</div>
</div>






    <!-- End Main Body -->



    <script>
      $(document).ready(function(){
        check();


        $( '.scrollmenu a' ).on( 'click', function() {
          $( this ).parent().find( 'a.active' ).removeClass( 'active' );
          $( this ).addClass( 'active' );
    });
        $("#side-btn").click(function(){
          $("#sidebar").toggleClass('visible');
        });

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

  </script>
  </body>
</html>
