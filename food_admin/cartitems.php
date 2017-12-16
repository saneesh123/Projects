<?php
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

  <div class="container" style=" color:black;height:100%; width:100%;margin-left:100px;margin-right:200px;">

    <table border="">
      <thead>
        <th>#</th>
        <th>PRODUCT IMAGE</th>
        <th>PRODUCT NAME</th>
        <th>QUALITY</th>
        <th>PRICE</th>
        <th>TOTAL</th>
      </thead>
      <tbody>
      <?php
      $cnt=1;
      $query="select * from cart;";
      $result=mysqli_query($bd,$query);
      $totid=1;
      while($row=mysqli_fetch_array($result)){
        $name= $row['name'];
          ?>
            <tr>
              <td style="width:25px;">
                  <?php echo $cnt; ?>
              </td>
              <td>
                <img src="productimages/<?php echo $row['image']; ?>" alt="" height="180px" width="200px" >
              </td>
              <td>

                <h3 style="width:250px;margin-left:100px;"><?php echo $name; ?></h3>

              </td>
              <td>
                <?php
$quantity=$row['quantity'];
                 ?>
              <input type="number" name="quantity" value="<?php echo $quantity; ?>"id="<?php echo $cnt;?>" style="width:50px;height:30px;margin-left:25px;float:left;" min="1" onClick='checking("<?php echo $cnt;?>","<?php echo$name; ?>","<?php echo $totid;?>");' >

              </td>
              <td>
                <i class="fa fa-inr" aria-hidden="true" style="margin-left:50px;margin-right:5px;"></i><span style="width:250px;margin-right:10px;color:blue;" id="price"><?php echo $row['price']; ?></span>
              </td>
              <td>

                <i class="fa fa-inr" aria-hidden="true" style="margin-left:15px;"></i><span id="<?php echo $totid; ?>" style="margin-left:15px; color:blue;" ><?php echo $total=$row['quantity']*$row['price']; ?></span>
                  <button type="button" name="button" class="btn btn-danger" style="margin-left:250px;margin-top:30px;" onClick="removing('<?php echo $name; ?>')">Remove</button>
                </td>
              </tr>
      <?php
      $cnt++;
      $totid++;

      }
     ?>
   </tbody>
 </table>
    </div>


<script>
$(function(){
  check();

})

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
function removing(name){

  $.ajax({

    url:"removecart.php",
    type:"POST",
    traditional:true,
    data:{name1:name},
    dataType:"html",

    success:function(data){

    check();
    location.reload();
  }



  });

}
function checking(count,name,id){
var value=$('#'+count).val();
alert(value);
alert(name);

  var pri=$("#").text();
alert(pri);

  var tot=pri*value;

    $("#"+id).empty();
  $("#"+id).append(tot);


}

</script>

    </body>
</html>
