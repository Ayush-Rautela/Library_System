<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['uid'])==0)
  { 
header('location:ulogin.php');
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
<?php include('dashnav.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color: white">USER'S DASHBOARD</h4>
            </div>

        </div>
             
             <div class="row" >



            
                 <div class="col-md-3 col-sm-3 col-xs-6" >
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x" style="color:white"></i>
                            <?php 
                            $sid=$_SESSION['stdid'];
                            $sql1=mysqli_query($con,"SELECT id from tblissuedbookdetails where StudentID='$sid'");
                            $issuedbooks=mysqli_num_rows($sql1);
                            ?>
                            <h3 style="color:white"><?php echo htmlentities($issuedbooks);?> </h3>
                            <span style="color:white">Book Issued</span>
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x" style="color:white"></i>
                            <?php 
                            $rsts=0;
                            $sql2 =mysqli_query($con,"SELECT id from tblissuedbookdetails where StudentID='$sid' and RetrunStatus='$rsts'");
                            $returnedbooks=mysqli_num_rows($sql2);
                            ?>
                          <h3 style="color:white"><?php echo htmlentities($returnedbooks);?></h3>
                          <span style="color:white">Books Not Returned Yet</span>
                        </div>
                    </div>
        </div>


            
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
