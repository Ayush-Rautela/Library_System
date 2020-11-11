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
    <!-- BOOTSTRAP CORE STYLE  -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="js/custom.js"></script>
  
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
        input[type='password']{
            background:rgba(255,255,255,0.5);
        }
    </style>
  </head>
<body style="background-image: url('lib.png');
background-repeat: no-repeat;
background-size: cover;">
    <!------MENU SECTION START-->
<?php include('u_navbar2.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line" style="color: white">Welcome <?php echo $_SESSION['uname']; ?>, Change your Password</h4>
</div>
</div>           
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel" style="background:rgba(255,255,255,0.2);">
<div class="panel-heading text-center" style="background:rgba(128,0,0,0.8);color:white"><h2><u>
Change Password</u></h2>
</div>
<div class="panel-body">
<form role="form" method="post" name="chngpwd">
<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="newpassword" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>
<div class="form-group text-center">
 <button type="submit" name="change" class="btn" style="background:rgba(128,0,0,1);color:white" onSubmit="return confirm('Your password has been changed, select ok to go back to Login !!');">Change </button> 
</div>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
  <?php include('footer.php'); ?>
</body>
</html>
