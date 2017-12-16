<?php
session_start();
error_reporting(0);
include("include/config.php");
if($_SESSION['alogin']=='')
{
  header("location:http://localhost/food_admin/indexx.php");
}
if(isset($_POST['submit']))

{
$pass=$_POST['password'];
$newpass=$_POST['newpassword'];
$conpass=$_POST['confirmpassword'];

  $query="SELECT * from admin where password='$pass';";
  $result=mysqli_query($bd,$query);
  $row=mysqli_fetch_array($result);
  $num=mysqli_num_rows($result);

  $id=$row['id'];
    if($num>0)
        {
          if($newpass==$conpass)
            {
              $query1="UPDATE admin SET password='$newpass' where id='$id';";
              mysqli_query($bd,$query1);
              $_SESSION['error']="Password updated successfully";
            }else{
              $_SESSION['error']="New password and confirm password not matching";

            }
        }else{
          $_SESSION['error']="Old password not correct";

        }
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php include("include/slider.php"); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->



            <section>
              <div class="wrapper">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-5">
                    <div class="span9">
                        <div class="content">

                          <div class="module">
                            <div class="module-head">
                              <h3>Admin Change Password</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
              {?>
                                <div class="alert alert-success">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <?php echo htmlentities($_SESSION['error']);?><?php echo htmlentities($_SESSION['error']="");?>
                                </div>
              <?php } ?>
                                <br />

                    <form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();"style="margin-right:20%;">

              <div class="form-group">
              <label class="control-label" for="basicinput">Current Password</label>
              <div class="controls">
              <input class="form-control" type="password" placeholder="Enter your current Password"  name="password" class="span8 tip" required>
              </div>
              </div>


              <div class="form-group">
              <label class="control-label" for="basicinput">New Password</label>
              <div class="controls">
              <input class="form-control" type="password" placeholder="Enter your new current Password"  name="newpassword" class="span8 tip" required>
              </div>
              </div>

              <div class="form-group">
              <label class="control-label" for="basicinput">Confirm Password</label>
              <div class="controls">
              <input class="form-control" type="password" placeholder="Enter your new Password again"  name="confirmpassword" class="span8 tip" required>
              </div>
              </div>

                                  <div class="control-group">
                                    <div class="controls">
                                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          </div>



                        </div><!--/.content-->
                      </div><!--/.span9-->
                    </div>
                      </div>
                  </div><!--/.container-->
                </div><!--/.wrapper-->
              </section>

            </aside><!-- /.right-side -->

        <!-- add new calendar event modal -->


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

    </body>
</html>
