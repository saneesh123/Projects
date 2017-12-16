
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{


	$_SESSION['succ']="";
	if(isset($_POST['button']))
	{
	  $item_name=$_POST['itemname'];
	  $item_price=$_POST['itemprice'];
	  $item_image=$_FILES["itemimage"]["name"];
		$category=$_POST['categoryselect'];

		$item_status=$_POST['itemstatus'];
		$item_type=$_POST['itemtype'];

		$result=mysqli_query($bd,"select * from category where categoryname='$category'");
		$row=mysqli_fetch_array($result);
$cid=$row['cid'];

	  $result=mysqli_query($bd,"insert into items values('','$cid','$category','$item_name','$item_price','$item_status','$item_type','$item_image')");
	  $_SESSION['succ']="product successfully added";

	  move_uploaded_file($_FILES["itemimage"]["tmp_name"],"../food/images/".$_FILES["itemimage"]["name"]);
	}



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shoppin Portal | Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />



        <!-- HTML5  and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php include("include/slider.php") ?>

<aside class="right-side">
  <section>

		<div class="col-md-5">
  <form class="form-vertical" action="" method="post" enctype="multipart/form-data">
    <div class="form-header">
    <h3>  Insert Items </h3>
    </div>
		<h4 style="margin:top:5px;margin-bottom:5px;">Category</h4>
		<select name="categoryselect" id="categoryselect" class="form-control">
			<option>Select category</option>
			<?php
			$query="select * from category;";
			$result=mysqli_query($bd,$query);

			while($row=mysqli_fetch_array($result))
			{

				$cname=$row['categoryname'];
		 ?>
  <option  value="<?php echo $cname;?>"><?php echo $cname;?></option>
<?php } ?>
</select>
    <div class="form-group">
      Item Name:</br>
			<input type="text" name="itemname" class="form-control" placeholder="Enter product name"required>
    </div>
    <div class="form-group">
      Item Price:</br>
			<input type="text" name="itemprice" class="form-control"placeholder="Enter product price"required>
    </div>
    <div class="form-group">
     	Item image:</br>
			<input type="file" name="itemimage" id="itemimage" class="form-control"required>

    </div>
		<div class="form-group">
			item Status:</br>
			<select class="form-control" name="itemtype" id="itemtype">
				<option value="">select status</option>
				<option value="0">Veg</option>
				<option value="1">Non Veg</option>


			</select>
		</div>

<div class="form-group">
	item Status:</br>
	<select class="form-control" name="itemstatus" id="itemstatus">
		<option value="">select status</option>
		<option value="instoke">in stoke</option>
		<option value="out of stock">out of stock</option>


	</select>
</div>


    <div class="form-group" style="margin-top:5px;">
      <input type="submit" name="button" class="btn btn-primary" value="UpLoad">
    </div>
    <span style="color:green;"><?php  echo htmlentities($_SESSION['succ']); ?><?php  echo htmlentities($_SESSION['succ']=""); ?> </span>
  </form>
</div>


  </section>

</aside>



</div>


<script>
	$(document).ready(function(){
		$('#categoryselect').change(function(){
			/*alert("hai");
			var name=$('#categoryselect option:selected').text();
			alert(name);*/
			$.ajax({

				url:'fetch_subcategory.php',
				type:'POST',
				traditional:true,
				data:{category:$("#categoryselect option:selected").text()},
				dataType:"html",

				success: function (data, textStatus, jqXHR) {

											$("#subcategoryselect option").remove();


															$("#subcategoryselect").append(data);


								 }
			});

		});

	});
</script>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <script>
      		$(document).ready(function() {
      			$('.datatable-1').dataTable();
      			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
      			$('.dataTables_paginate > a').wrapInner('<span />');
      			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
      			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
      		} );
      	</script>
      </body>
      <?php } ?>
</html>
