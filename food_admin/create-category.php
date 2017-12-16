
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
	  $cname=$_POST['categoryname'];
    echo $cname;

    $result1=mysqli_query($bd,"select * from category");
    $nums=mysqli_num_rows($result1);
    $cid=$nums+1;
	  $result=mysqli_query($bd,"INSERT into category values('','$cid','$cname')");
	  $_SESSION['succ']="category successfully added";

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




    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
          <?php include("include/slider.php") ?>
<aside class="right-side">
  <section>

		<div class="col-md-5">
  <form class="form-vertical" action="" method="post" enctype="multipart/form-data">
    <div class="form-header">
    <h3>  ADD CATEGORY </h3>
    </div>
    <div class="form-group">
      <input type="text" name="categoryname" class="form-control" placeholder="Enter Category name"required>
    </div>

    <div class="form-group" style="margin-top:5px;">
      <input type="submit" name="button" class="btn btn-primary" value="ADD">
    </div>
    <span style="color:green;"><?php  echo htmlentities($_SESSION['succ']); ?><?php  echo htmlentities($_SESSION['succ']=""); ?> </span>
  </form>
</div>
<div class="col-md-8">
<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Category Name</th>


      <th>Action</th>
    </tr>
  </thead>
  <tbody>

<?php $query=mysqli_query($bd,"select * from category;");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
    <tr>
      <td><?php echo htmlentities($cnt);?></td>
      <td><?php echo htmlentities($row['categoryname']);?></td>


      <td>
      <a href="edit-category.php?id=<?php echo $row['id']?>" ><i class="fa fa-pencil-square-o"></i></a>
      <a href="delete-category.php?id=<?php echo $row['id']?>" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a></td>
    </tr>
    <?php $cnt=$cnt+1; } ?>

</table>
</div>





  </section>

</aside>


</div>

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
