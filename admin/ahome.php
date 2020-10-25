<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['uid'])==0)
  { 
header('location:..\alogin.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Admin Dash Board</title>
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="js/custom.js"></script>
  
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link href="css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <style>
        
        #footer {
          position: relative;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: red;
          color: white;
          text-align: center;
        }
      </style>
</head>
<body style="background-image: url('lib.png');
background-repeat: no-repeat;
background-size: cover;">
      <!------MENU SECTION START-->
<?php include('includes/navbar2.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper" >
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color: white">ADMIN DASHBOARD</h4>
            </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-success back-widget-set text-center">
                      <i class="fa fa-book fa-5x" style="color: white"></i>
                          <?php
                              $sql=mysqli_query($con,"SELECT id from tblbooks ");
                              $row=mysqli_num_rows($sql);
                            ?>
                        <h3 style="color: white"></h3>
                          <span style="color: white">Books Listed <?php echo "<br>".htmlentities($row); ?></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="alert alert-info back-widget-set text-center">
                        <i class="fa fa-bars fa-5x" style="color: white"></i>
                            <?php
                                $sql1=mysqli_query($con,"SELECT id from tblissuedbookdetails ");
                                $row1=mysqli_num_rows($sql1);
                              ?>
                        <h3 style="color: white"> </h3>
                        <span style="color: white">Times Book Issued <?php echo "<br>".htmlentities($row1) ?></span>
                  </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-recycle fa-5x" style="color: white"></i>
                            <?php
                            $status=1;
                                $sql2=mysqli_query($con,"SELECT id from tblissuedbookdetails where RetrunStatus='$status'");
                                $row2=mysqli_num_rows($sql2);
                              ?>
                        <h3 style="color: white"></h3>
                        <span style="color: white">Times Books Returned <?php echo "<br>".htmlentities($row2); ?></span>
                  </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="alert alert-danger back-widget-set text-center">
                        <i class="fa fa-users fa-5x" style="color: white"></i>
                            <?php
                                $sql3=mysqli_query($con,"SELECT id from tblstudents ");
                                $row3=mysqli_num_rows($sql3);
                              ?>
                        <h3 style="color: white"></h3>
                        <span style="color: white">Registered Users <?php echo "<br>".htmlentities($row3);?>
                           </span>
                  </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-success back-widget-set text-center">
                          <i class="fa fa-user fa-5x" style="color: white"></i>
                            <?php
                                $sql4=mysqli_query($con,"SELECT id from tblauthors ");
                                $row4=mysqli_num_rows($sql4);
                              ?>
                          <h3 style="color: white"></h3>
                          <span style="color: white">Publisher Listed <?php echo "<br>".htmlentities($row4); ?></span>
                    </div>
            </div>
            <div class="col-md-3 col-sm-3 rscol-xs-6">
                    <div class="alert alert-info back-widget-set text-center">
                          <i class="fa fa-file-archive-o fa-5x" style="color: white"></i>
                            <?php
                                $sql5=mysqli_query($con,"SELECT id from tblcategory ");
                                $row5=mysqli_num_rows($sql5);
                              ?>
                          <h3 style="color: white"> </h3>
                          <span style="color: white">Listed Categories <?php echo "<br>".htmlentities($row5) ?></span>
                    </div>
            </div>
        </div>
        <div class="row">
              <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                  <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="lib.png" alt="" />
                            </div>
                        <div class="item">
                            <img src="lib.png" alt="" />
                        </div>
                        <div class="item">
                            <img src="lib.png" alt="" />
                        </div>
                    </div>
                  </div>
              </div>
        </div>
     </div>
    </div>
  <?php include('includes/footer.php');?>  
</body>
</html>
<?php } ?>
