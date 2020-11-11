<?php 
 	session_start();
	error_reporting(0);
	include('config.php');
   if(isset($_POST["okay"]))
      {
        $from = "rohitsinghgusain03@gmail.com";
        $to=$_POST['sid'];
        $usertype = $_POST['utype'];
        if($usertype=='Student')
        {
		      $sql=mysqli_query($con,"SELECT * from tblstudents where EmailId='$to'");
		      $result=mysqli_fetch_array($sql);
      	  if(mysqli_num_rows($sql) == 1)
  			  {         					
       //  $Emailid = $result['EmailId']; 
            $id = $result['id'];
            session_start();
            $_SESSION['login'] = $id;
            $_SESSION['utype']= $usertype;
        //$_SESSION['uname']=$result['FullName'];
            $sub = "Password Reset";
            $username = $result['FullName'];
            $body = "Hi,$username.Click here to reset your password http://localhost/libphp/libphp/conpass.php";
            if(mail($to,$sub,$body,$from))
           {
            ?>
          
        <script>
          alert('Check your mailbox');
          window.open('fordemo.php','_self');
        </script>
          <?php
        }
        else
        {
          ?>
          <script>
          alert('Email Sending Failed');
          window.open('fordemo.php','_self');
        </script>
        <?php
				//echo "<script type='text/javascript'> document.location ='conpass.php'; </script>";
        }
      }  
		else
		{
				echo "<script>alert('Invalid Details');</script>";
		}
      
    }
    else{

      $sql=mysqli_query($con,"SELECT * from faculty where Email='$to'");
		      $result=mysqli_fetch_array($sql);
      	  if(mysqli_num_rows($sql) == 1)
  			  {         					
       //  $Emailid = $result['EmailId']; 
            $id = $result['Id'];
            session_start();
            $_SESSION['login'] = $id;
            $_SESSION['utype']= $usertype;
            $sub = "Password Reset";
            $username = $result['FName'];
            $body = "Hi,$username.Click here to reset your password http://localhost/libphp/libphp/conpass.php";
            if(mail($to,$sub,$body,$from))
            {
             ?>
           
         <script>
           alert('Check your mailbox');
           window.open('fordemo.php','_self');
         </script>
           <?php
         }
         else
         {
           ?>
           <script>
           alert('Email Sending Failed');
           window.open('fordemo.php','_self');
         </script>
         <?php
         }
       }
       else
       {
         ?>
        <script>
        alert("Invalid Email Address");
        </script>
        <?php
       }  
    }
  }
    
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
            <h2 class="card-header text-center" style="background:rgba(128,0,0,0.7);color:white"><u>Forgot Password?</u></h2>
            <div id="card-body">
              <form role="form" method="post">
              <div class="form-group row" style="margin-top:2%">
                <label for="sid" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">Email ID </label>
                <div class="col-md-6">
                  <input type="text" style="background:rgba(255,255,255,0.5);" id="sid" class="form-control" name="sid" placeholder="User ID" autocomplete="off">
	            </div>
	           </div>
            <div class="form-group row">
               <label for="sql" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;"> Category<span style="color:red;">*</span></label>
               		<div class="col-md-6">
                   <select id="utype" class="form-control" name="utype" required="required" placeholder="Choose">
                                    <option value="" disabled selected>Choose</option>
                                      <option value="Student">Student</option>
                                      <!--<option value="Faculty">Faculty</option>-->
                                    </select>
              		</div>
			</div>
	         <div class="form-group text-center">
              <button type="submit" class="btn" style="background:rgba(128,0,0,1);color:white;" name="okay">Login</button>
              </div>
            </form>
	</body>
</html>