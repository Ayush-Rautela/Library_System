<?php
session_start();
error_reporting(0);
include('config.php');

if(isset($_POST['ulog']))
{   
  //code for captach verification
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  
    {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
  else {
         $email=$_POST['login'];
         $password=($_POST['logpass']);
         $utype =$_POST['utype'];
         if($utype=='Student')
         {
          $sql =mysqli_query($con,"SELECT * FROM tblstudents  WHERE EmailId='$email'");
          $row = mysqli_num_rows($sql);
          if($row == 1)
          { 
            $data = mysqli_fetch_assoc($sql);
            if(password_verify($password,$data['Password']))
            {
            $id = $data['id'];
            session_start();
            $_SESSION['uid']=$id;
            header('location:dashboard.php');
            }
          
          else{
            ?>
            <script>
              alert('Invalid Credentials <?php echo $utype ?>');
              window.open('ulogin.php','_self');
            </script>
            <?php
         }
        }
        else{
          ?>
          <script>
            alert('Invalid Credentials <?php echo $utype ?>');
            window.open('ulogin.php','_self');
          </script>
          <?php 

         }
        } 
         else
         {            
          $sql =mysqli_query($con,"SELECT * FROM faculty WHERE Email='$email' and Password='$password'");
          $row = mysqli_num_rows($sql);
          if($row == 1)
          { 
            $data = mysqli_fetch_assoc($sql);
            if(password_verify($password,$data['Password']))
            {
            $id = $data['Id'];
            session_start();
            $_SESSION['uid']=$id;
            header('location:dashboard.php');
            }
          else{
            ?>
            <script>
              alert('Invalid Credentials <?php echo $utype ?>');
              window.open('ulogin.php','_self');
            </script>
            <?php
              }
        }
        else{
          ?>
          <script>
            alert('Invalid Credentials <?php echo $utype ?>');
            window.open('ulogin.php','_self');
          </script>
          <?php
         }
        }
      }}
      

//           $sql =mysqli_query($con,"SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId='$email' and Password='$password'");
//           $result=mysqli_fetch_array($sql);
//           if(mysqli_num_rows($sql) == 1)
//           {            
//           if($result['Status']==1)
//           {
//             $_SESSION['stdid']=$result['StudentId'];
//             $_SESSION['login']=$_POST['login'];
//             echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
//           }
//   else 
//     {
//         echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
//     }
//   }  
// else{
// echo "<script>alert('Invalid Details');</script>";
// }
// }
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
      <?php include('u_navbar2.php')?>
      <div class="container-fluid">
         <div class="card" style="background:rgba(255,255,255,0.2);width:70%;left:15%;margin-top:3%">

            <!-- Tabs Titles -->
            <h2 class="card-header text-center" style="background:rgba(128,0,0,0.7);color:white"><u>User Login</u></h2>
            <div id="card-body">
              <form role="form" method="post" class="form">
              <div class="form-group row" style="margin-top:2%">
                <label for="login" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">Email </label>
                <div class="col-md-6">
                  <input type="text" style="background:rgba(255,255,255,0.5);" id="login" class="form-control" name="login" placeholder="Email" required autofocus>
             </div>   
            </div>
            <div class="form-group row">
                           <label for="sql" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;font-family: sans-serif; font-size:14px;">UserType <span style="color:red;">*</span></label>
                                <div class="col-md-6">
                                    <select id="utype" class="form-control" name="utype" required="required" placeholder="Choose">
                                    <option value="" disabled selected>Choose</option>
                                      <option value="Student">Student</option>
                                      <option value="Faculty">Faculty</option>
                                    </select>
                                </div>
                        </div>
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">Password </label>
                <div class="col-md-6">
                  <input type="password" style="background:rgba(255,255,255,0.5);" id="password" class="form-control" name="logpass" placeholder="password" required autofocus>
                </div>
              </div>
               <div class="form-group row">
                <label for="vercode" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">Verification code : </label>
                  <div class="col-md-6">
                    <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width:150px; height: 25px;" />&nbsp;<img src="captcha.php" style="width: 100px;height: 28px;">
                  </div>
                </div> 
              <div class="form-group text-center">
              <button type="submit" class="btn" style="background:rgba(128,0,0,1);color:white;" name="ulog">Login</button>
              <a class="" href="fordemo.php" style="text-decoration:none;color:white;outline:none;margin-left:15px;">Forgot Password?</a>
              </div>
            </form>
        </div>
        </div>
      </div>
       <?php include('footer.php') ?>
    </body>
    </html>
  