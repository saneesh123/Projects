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
          <style >
          #cart:hover{
            cursor: pointer;
          }
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
            color:black;
          }

          </style>
      </head>
      <body >
      <?php include("include/main_header.php"); ?>

<div class="table-responsive container" style="color:black;">

        <table border="solid rgba(91, 91, 91, 0.26);" class="table table-hover">
          <thead class="thead-drak">
            <tr>
            <th class="col-xs-1" style="padding-left:2%;">#</th>
            <th class="col-xs-3">ITEM NAME</th>
            <th class="col-xs-2">QUANTITY</th>
            <th class="col-xs-2">PRICE</th>
            <th class="col-xs-1">SUBTOTAL</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $cnt=1;
          $cntid=1000;
          $query="select * from cart;";
          $result=mysqli_query($bd,$query);
          $num=mysqli_num_rows($result);
          $totid=100;
          $subtot=0;
          $count=0;
          while($row=mysqli_fetch_array($result)){
            $name=$row['name'];

?>
                <tr>
                  <td style="padding-left:2%;">
                      <?php echo $cnt; ?>
                  </td>

                  <td>

                    <h3 ><?php echo $name; ?></h3>

                  </td>
                  <td>
                    <?php
                  $pri= $row['price'];
    $quantity=$row['quantity'];
    $total=$row['quantity']*$row['price'];
    $subtot=$subtot+$total;

                     ?>
                  <input type="number" name="quantity" value="<?php echo $quantity; ?>"id="<?php echo $cntid;?>"  min="1" onClick='checking("<?php echo $cntid;?>","<?php echo $name; ?>","<?php echo $totid;?>","<?php echo $num; ?>","<?php echo $pri;?>")' style="width:50px;" >

                  </td>
                  <td>
                    <i class="fa fa-inr" aria-hidden="true" ></i><span  id="price"><?php echo $row['price']; ?></span>
                  </td>
                  <td>

                    <i class="fa fa-inr" aria-hidden="true" ></i><span id="<?php echo $totid; ?>"  ><?php echo $total;?></span>
                      <span  onClick="removing('<?php echo $name; ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                    </td>
                  </tr>
          <?php
          $cnt++;
          $totid++;
          $cntid++;
          }
         ?>


       </tbody>
     </table>

</div>
<div class="col-md-3 pull-right"style="font-family:sans-sarif;">
  <div class="" >
        <span style="font-size:20px;">Total </span><span style="margin-left:25px;font-size:20px;">=</span>
        <i class="fa fa-inr" aria-hidden="true" style="margin-left:40px;" ></i><span id="subtotal" style=""><?php echo $subtot;?></span>
  </div>

    <div class="" style="margin-top:20px;" >
        <label for="" style="float:left;padding:10px;">VAT:</label>
        <select class="selectpicker form-control" id="vatid" style="width:80px;float:left;"  >
          <option value="">select</option>
          <?php $query3="select * from tax; ";
          $result3=mysqli_query($bd,$query3);
        while($row3=mysqli_fetch_array($result3)){
          $vname=$row3['vatname']." ".$row3['tax']."%"; ?>
        <option value="GST 10%"><?php echo $vname; ?></option>
      <?php }?>
      </select>
        <label style="padding:10px;"><i class="fa fa-inr" aria-hidden="true"  id="tax">0</i></label>

  </div>
  <div style="width:100%;height:auto;margin-top:20px;">
        <span style="font-size:20px;color:green;">Grand Total =</span>
      <i class="fa fa-inr" aria-hidden="true" ></i><label id="grandtotal" style="color:green;"><?php echo $subtot;?></label>


  </div>
  <button type="button" name="button" class="btn btn-success btn-lg">PLACE ORDER</button>
</div>



<script>
$(document).ready(function(){
  check();

$('#vatid').change(function(){
  var vat=$('#vatid option:selected').text();

  tot=$('#subtotal').text();
  tot=parseInt(tot);

  var grandtot=$('#grandtotal').text();
  grandtot=parseInt(grandtot);
  var vattax=0;
  switch(vat){
    case 'GST 10%':vattax=tot*(10/100);

                    $('#tax').empty();
                    $('#tax').append(vattax);
                    grandtot=tot+vattax;
                    $('#grandtotal').empty();
                    $('#grandtotal').append(grandtot);
                    break;
    case 'SGT 5%':vattax=tot*(5/100);

                    $('#tax').empty();
                    $('#tax').append(vattax);
                    grandtot=tot+vattax;
                    $('#grandtotal').empty();
                    $('#grandtotal').append(grandtot);
                    break;
    case 'Service Tax 2%':vattax=tot*(2/100);

                    $('#tax').empty();
                    $('#tax').append(vattax);
                    grandtot=tot+vattax;
                    $('#grandtotal').empty();
                    $('#grandtotal').append(grandtot);
                    break;
    default:        grandtot=tot;

                        $('#tax').empty();
                        $('#tax').append(0);

                        $('#grandtotal').empty();
                        $('#grandtotal').append(grandtot);
                        break;
  }

})
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
  return 1;
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
function checking(count,name,id,cou,price){
var value=$('#'+count).val();

//alert(value);
//alert(name);
//alert(count);
//alert(price);
//alert(cou);
  var tot=price*value;

    $('#'+id).empty();
  $('#'+id).append(tot);
  var subtot=$('#subtotal').text();
  var num=parseInt(subtot);
totalcal(cou);

}
function totalcal(cou)
{

  var id=100;
  tot=0;
  while(cou>0)
  {

    var val=$('#'+id).text();

    val=parseInt(val);

    tot=tot+val;
    cou--;
    id++;
  }

  $('#subtotal').empty();
$('#subtotal').append(tot);

//alert(tot);
var grandtot=$('#grandtotal').text();
grandtot=parseInt(grandtot);
//alert("grandtotal:"+grandtot);
var vat=$('#vatid option:selected').text();
//alert(vat);
var vattax=0;

switch(vat){
  case 'GST 10%':vattax=tot*(10/100);

                  $('#tax').empty();
                  $('#tax').append(vattax);
                  grandtot=tot+vattax;
                  //alert(grandtot);
                  $('#grandtotal').empty();
                  $('#grandtotal').append(grandtot);
                  break;
  case 'SGT 5%':vattax=tot*(5/100);

                  $('#tax').empty();
                  $('#tax').append(vattax);
                  grandtot=tot+vattax;

                  $('#grandtotal').empty();
                  $('#grandtotal').append(grandtot);
                  break;
  case 'Service Tax 2%':vattax=tot*(2/100);

                  $('#tax').empty();
                  $('#tax').append(vattax);
                  grandtot=tot+vattax;
                  $('#grandtotal').empty();
                  $('#grandtotal').append(grandtot);
                  break;
  default:           grandtot=tot;

                      $('#tax').empty();
                      $('#tax').append(0);

                      $('#grandtotal').empty();
                      $('#grandtotal').append(grandtot);

                  break;
}

}
function navselect(category){

// alert(category);



  window.location="sample2.php?category="+category;

}


</script>

    </body>
</html>
