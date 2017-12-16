<?php
include("include/config.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shopping</title>
    <link rel="stylesheet" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<link rel="stylesheet" href="css/font-awesome.css">
<style>
.bottom-left{
  bottom:0px;
  left:0px;
}
</style>
  </head>
  <body>
    <!--navbar -->
<?php include("include/main_header.php"); ?>
    <!--End navbar-->
    <!--Sidebar -->

    <!--Sidebar -->
    <!-- Main bod1y -->


<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fixedheight">
        <div class="col-lg-3 col-md-3 col-sm-6 col-sm-12 fixedheight" style="background-color:red;">
          <center>hbsf</center>
          <div class="bottom-left">
            32554
          </div>

        </div>
    </div>
  </div>
</div>





    <!-- End Main Body -->



    <script>
      $(document).ready(function(){
        check();

        $( 'ul.nav li' ).on( 'click', function() {
          $( this ).parent().find( 'li.active' ).removeClass( 'active' );
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
      function decrement(id){

        var qty=$('#'+id).text();
        if(qty==2)
        {
           $("button[name='minus']").attr("disabled", "disabled").button('refresh');
        }
        qty--;
        $('#'+id).empty();
        $('#'+id).append(qty);
      }
      function increment(id){

        var qty=$('#'+id).text();
        if(qty>=1){
          $("button[name='minus']").removeAttr("disabled").button('refresh');
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
      function productclicked(pro)
      {
        alert(pro);
        window.location="http://localhost/shop/carousel.php?product="+pro;
      }
      function navselect(cate){

      window.location="http://localhost/shop/navselect.php?category="+cate;
      }
    function  cartclicked(){
      window.location="http://localhost/shop/cartitems.php";
    }

  </script>
  </body>
</html>
