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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.css">
  </head>
  <body style="background-color:rgb(218, 218, 218);">
    <!--navbar -->
<?php include("include/main_header.php"); ?>
    <!--End navbar-->
    <!--Sidebar -->

    <!--Sidebar -->
    <!-- Main bod1y -->

  <div class="container">
  <div class="row">


      <?php $query1="select * from product";
      $result1=mysqli_query($bd,$query1);
      $cnt=1;
      while($row1=mysqli_fetch_array($result1)){
        $qty=1;
        $name=$row1['name'];
         ?>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="height:250px;">

          <img class="thumbnail" src="productimages/<?php echo $row1['image'];?>" alt="" width="100%" height="100%">

          <!--<div id="overlay-wrapper">
              <div id="overlay-content-box">
                    <center>  <span style=""><b><?php echo $row1['name']; ?></b></span></center>
                    <center style="margin-top:50%;height:0%;">
                            <span ><b><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row1['price']; ?></b></span>
                          <span style="margin-left:2%;"><b>Qty:</b></span>
                          <button type="button" name="minus" class="btn btn-info btn-xs"style="width:15px;height:15px;;" onClick='decrement("<?php echo $cnt;?>")'disabled>-</button>
                             <span style="color:rgb(0, 17, 245);" id="<?php echo $cnt; ?>"><b><?php echo $qty?></b></span>
                             <button type="button" name="add" class="btn btn-primary  btn-xs" style="width:15px;height:15px;"onClick='increment("<?php echo $cnt;?>")'>+</button>
                             <button type="button" name="button" class="btn btn-danger btn-xs" style="padding:5px;width:40px;margin-left:2%"onClick="addcart('<?php echo $cnt; ?>','<?php echo $name; ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </center>
              </div>
          </div>-->

       <div class="content" style="margin-top:2%;width:95%;height:98%;">
        <center>  <span style=""><b><?php echo $row1['name']; ?></b></span></center>


<center style="margin-top:50%;height:0%;">
        <span ><b><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row1['price']; ?></b></span>
      <span style="margin-left:2%;"><b>Qty:</b></span>
      <button type="button" name="minus" class="btn btn-info btn-xs"style="width:15px;height:15px;;" onClick='decrement("<?php echo $cnt;?>")'disabled>-</button>
         <span style="color:rgb(0, 17, 245);" id="<?php echo $cnt; ?>"><b><?php echo $qty?></b></span>
         <button type="button" name="add" class="btn btn-primary  btn-xs" style="width:15px;height:15px;"onClick='increment("<?php echo $cnt;?>")'>+</button>
         <button type="button" name="button" class="btn btn-danger btn-xs" style="padding:5px;width:40px;margin-left:2%"onClick="addcart('<?php echo $cnt; ?>','<?php echo $name; ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
</center>
</div>
      </div>


    <?php $cnt++;} ?>
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

  </script>
  </body>
</html>
