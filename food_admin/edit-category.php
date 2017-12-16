<?php
include("include/config.php");

$id=$_GET['id'];


if(isset($_POST['submit']))
{
$pname=$_POST['categoryname'];


$query="UPDATE category SET categoryname='$pname'where id='$id';";
$result=mysqli_query($bd,$query);

}

$query="select * from category where id='$id';";
$result=mysqli_query($bd,$query);
$row=mysqli_fetch_array($result);
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

     </head>
     <body class="skin-black">
         <!-- header logo: style can be found in header.less -->
           <?php include("include/slider.php") ?>
 <aside class="right-side">
   <section>
     <div class="col-md-8">
     <form class="form-vertical" action="" method="post">
       <div class="form-group">
         Category Name:
         <input class="form-control" type="text" name="categoryname" value="<?php echo $row['categoryname']; ?>" required>
       </div>

         <input type="submit" name="submit" class="btn btn-primary" value="Change">
       </div>
     </form>
   </div>
       <section>
             

 </section>

   	</div><!--/.wrapper-->



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
         <script src="scripts/datatables/jquery.dataTables.js"></script>
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

 </html>
