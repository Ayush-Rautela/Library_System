<?php
session_start();
include('config.php');
error_reporting(0);
if(strlen($_SESSION['uid'])==0)
{   
header('location:ulogin.php');
}
else
{ 
  $usertype = $_SESSION['user'];
if(isset($_POST['change']))
  {
    if($usertype=='Student')
    {
      $password=$_POST['password'];
      $cpassword=$_POST['confirmpassword'];
      $hash = password_hash($cpassword,PASSWORD_DEFAULT);
      $id=$_SESSION['uid'];
      $sql =mysqli_query($con,"SELECT * FROM tblstudents WHERE id='$id'");
      if(mysqli_num_rows($sql) == 1)
      {
        $con1=mysqli_query($con,"UPDATE tblstudents set Password='$hash' where id='$id'");
        $msg="Your Password succesfully changed";
      }
      else 
      {
      $error="Your current password is wrong";  
      }
    }
    else
    {
      $password=$_POST['password'];
      $cpassword=$_POST['confirmpassword'];
      $hash = password_hash($cpassword,PASSWORD_DEFAULT);
      $id=$_SESSION['uid'];
      $sql =mysqli_query($con,"SELECT * FROM faculty WHERE Id='$id'");
      if(mysqli_num_rows($sql) == 1)
      {
        $con1=mysqli_query($con,"UPDATE faculty set Password='$hash' where Id='$id'");
        $msg="Your Password succesfully changed";
      }
      else 
      {
        $error="Your current password is wrong";  
      }



    }
  } 

?>
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
        input[type="password"]{
          background:rgba(255,255,255,0.5);
        }
      </style>
</head>
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
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
<h4 class="header-line" style="color: white">Admin Change Password</h4>
</div>
</div>
 <?php if($error){?><div class="col-md-6">
                    <div class="alert alert-danger" ><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                    </div><?php } 
        else if($msg){?><div class="col-md-6">
                    <div class="alert alert-success" ><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                    </div><?php }?>            
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel" style="background:rgba(255,255,255,0.2);">
<div class="panel-heading text-center" style="background:rgba(128,0,0,0.8);color:white"><h2><u>
Change Password</u></h2>
</div>
<div class="panel-body">
<form role="form" method="post" onSubmit="return valid();" name="chngpwd">

<div class="form-group">
<label>Current Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="newpassword" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>
<div class="form-group text-center">
 <button type="submit" name="change" class="btn" style="background:rgba(128,0,0,1);color:white">Change </button> 
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
<?php }?>