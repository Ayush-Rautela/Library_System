<?php
      session_start();
      if(isset($_SESSION['uid']))
      {
        header('location:admin/ahome.php');
      }
    include('config.php');
    // if($_SESSION['alogin']!='')
    // {
    //   $_SESSION['alogin']='';
    // }
    // if(isset($_POST['alog']))
    // {
    //   if($_POST["vercode"]!= $_SESSION["vercode"] OR $_SESSION["vercode"]=='')
    //   {
    //     echo "<script>alert('Incorrect verification code');</script>";
    //   }
    //   else
    //   {
    //     $username=mysqli_real_escape_string($con,$_POST['a_name']);
    //     $password=mysqli_real_escape_string($con,md5($_POST['logpass']));
    //     $sql=mysqli_query($con,"SELECT UserName,Password FROM admin WHERE UserName='$username' and Password='$password'");
    //     $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    //     if(mysqli_num_rows($sql)==1)
    //     {
    //       $_SESSION['alogin']=$_POST['a_name'];
    //       echo "<script type='text/javascript'> document.location ='admin/home.php'; </script>";
    //     }
    //     else
    //     {
    //       echo "<script>alert('Invalid Details');</script>";
    //     }
    //   }
    // }
   
  if(isset($_POST['alog']))
 {
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='') 
   { 
    echo "<script>alert('Incorrect verification code');</script>";
   } 
else 
  { 
    $username=$_POST['a_name'];
    $password=$_POST['logpass'];
  $sql ="Select * from admin where UserName='$username' AND Password ='$password'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_num_rows($result);
    if($row == 1)
    { 
      $data = mysqli_fetch_assoc($result);
      $id = $data['id'];
      $_SESSION['uid']=$id;
      header('location:admin\ahome.php');
    }   
    else{
           ?>
           <script>
             alert('Username or password not match');
             window.open('alogin.php','_self');
           </script>
           <?php
        }
 }}
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Library</title>
      <link rel="stylesheet" href="/css/app.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script type="text/javascript">window.history.forward();</script>
      <style>
#footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
</style>
    </head>
    <body style="background-image:url('lib.png');background-size: cover;">
      <?php 
      include('a_navbar2.php');
      ?>
      <div class="container-fluid">
         <div class="card" style="background:rgba(255,255,255,0.2);width:70%;left:15%;margin-top:3%">

            <!-- Tabs Titles -->
            <h2 class="card-header text-center" style="background:rgba(128,0,0,0.7);color:white"><u>Admin Login</u></h2>
            <div id="card-body">
              <form role="form" method="post">
              <div class="form-group row" style="margin-top:2%">
                <label for="login" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">User ID </label>
                <div class="col-md-6">
                  <input type="text" style="background:rgba(255,255,255,0.5);" id="login" class="form-control" name="a_name" placeholder="login">
              </div>
            </div>
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">Password </label>
                <div class="col-md-6">
                  <input type="password" style="background:rgba(255,255,255,0.5);" id="password" class="form-control" name="logpass" placeholder="password">
                </div>
              </div>
               <div class="form-group row">
                <label for="vercode" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">Verification code : </label>
                  <div class="col-md-6">
                    <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width:150px; height: 25px;" />&nbsp;<img src="captcha.php" style="width: 100px;height: 28px;">
                  </div>
                </div> 
              <div class="form-group text-center">
              <button type="submit" class="btn" style="background:rgba(128,0,0,1);color:white;" name="alog">Login</button>
             <!-- <a class="" href="aforget.php" style="text-decoration:none;color:white;outline:none;margin-left:15px;">Forgot Password?</a>-->
              </div>
            </form>
        </div>
        </div>
      </div>
       <?php include('footer.php') ?>
    </body>
    </html>