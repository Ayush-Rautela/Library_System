<?php
include('config.php');
 if(isset($_POST['login']))
 {
$username=$_POST['username'];
$password=$_POST['password'];
$sql ="Select * from admin where UserName='$username' AND Password ='$password'";
$result = mysqli_query($con,$sql);
$row = mysqli_num_rows($result);
  if($row == 1)
  {
    $data = mysqli_fetch_assoc($result);
    $id = $data['id'];
    session_start();
    $_SESSION['uid']=$id;
    header('location:dashboard.php');

  }   
  else{
           ?>
           <script>
             alert('Username or password not match');
             window.open('index.php','_self');
           </script> -->
           <?php
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
<?php include('navbar2.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line" style="color:white">ADMIN LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel" style="background:rgba(255,255,255,0.2);">
<div class="panel-heading text-center" style="background:rgba(128,0,0,0.8);color:white"><h2><u>
 LOGIN FORM</u></h2>
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Username</label>
<input class="form-control" type="text" name="username" style="background:rgba(255,255,255,0.5);" required />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" style="background:rgba(255,255,255,0.5);" required />
</div>
 <button type="submit" name="login" class="btn" style="background:rgba(128,0,0,1);color:white">LOGIN </button>
 <button type="button" name="login" class="btn" style="background:rgba(128,0,0,1);color:white">SIGN UP </button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
</body>
</html>
