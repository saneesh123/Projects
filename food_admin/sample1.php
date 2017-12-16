<?php
include("include/config.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shopping</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style4.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.css">
  </head>
  <body >
    <!--navbar -->
<?php include("include/main_header.php"); ?>
    <!--End navbar-->
    <!--Sidebar -->
<?php include("include/main.sidebar.php"); ?>
    <!--Sidebar -->
    <!-- Main bod1y -->
<div class="col-md-12" id="content" style="margin-left:150px">
  <div class="row">
    <?php include("include/config.php");
     $query="select * from product";
     $result=mysqli_query($bd,$query);
     while($row=mysqli_fetch_array($result))
     {
     ?>
     <div class="col-md-3">

         <img src="productimages/<?php echo $row['image']; ?>" alt="" >
<div class="overlay">
        <div class="content">
            <span style="top:10px;color:black;"><center><h3><u><?php echo $row['name']; ?></u></h3></center></span>

          <span style="float:left;margin-right:10px;margin-left:60px;color:black;margin-top:140px;"><b><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['price']; ?></b></span>
              <input type="number" name="number" value="1" min="1" style="color:black;margin-top:140px;width:35px;height:20px;margin-right:10px;float:left;">
              <button type="button" name="button" style="margin-top:140px;" class="btn btn-danger btn-xs"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
      </div>
     </div>
   </div>
<?php } ?>

     </div>
  </div>


    <!-- End Main Body -->

</div>

    <script>
      $(document).ready(function(){
        check();
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

        if(width<=50){
        document.getElementById("content").style.marginLeft='50px';
      }else{
        document.getElementById("content").style.marginLeft='150px';
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
    </script>
  </body>
</html>
