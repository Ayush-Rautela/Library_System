<?php 
 	session_start();
	error_reporting(0);
	include('config.php');
	if($_SESSION['login']!=''){
	$_SESSION['login']='';
	}
 
   
   if(isset($_POST["okay"]))
      {
      	 $ph=$_POST["sid"];
		 $ph1=$_POST["sql"];
		 $ph7=$_POST["sqz"];
		$sql=mysqli_query($con,"SELECT Status,QId,Answer,FullName from tblstudents where StudentId='$ph' and QId='$ph1' and Answer='$ph7'");
		$result=mysqli_fetch_array($sql);
      	 if(mysqli_num_rows($sql) == 1)
  			{            
    			if($result['Status']==1)
      				{
				        $_SESSION['login']=$_POST["sid"];
				        $_SESSION['uname']=$result["FullName"];
				        echo "<script type='text/javascript'> document.location ='conpass.php'; </script>";
				    }
				    else 
				      {
				        echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
				      }
				  }  
				else{
				echo "<script>alert('Invalid Details');</script>";
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
                <label for="sid" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">User ID </label>
                <div class="col-md-6">
                  <input type="text" style="background:rgba(255,255,255,0.5);" id="sid" class="form-control" name="sid" placeholder="User ID" autocomplete="off">
	            </div>
	           </div>
            <div class="form-group row">
               <label for="sql" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;"> Category<span style="color:red;">*</span></label>
               		<div class="col-md-6">
                    	<select class="form-control" name="sql" required="required">
                          <option selected>--Select--</option>
						  <option value="1">What is your birthplace?</option>
						  <option value="2">What is your Mother's last name?</option>
						  <option value="3">What is your last name?</option>
						  <option value="4">What is your first pet name?</option>
						</select>
              		</div>
			</div>
			<div class="form-group row" style="margin-top:2%">
                <label for="sqz" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;">Your Answer </label>
                <div class="col-md-6">
                  <input type="text" style="background:rgba(255,255,255,0.5);" id="sqz" class="form-control" name="sqz" placeholder="Your Answer" autocomplete="off">
	            </div>
	         </div>
	         <div class="form-group text-center">
              <button type="submit" class="btn" style="background:rgba(128,0,0,1);color:white;" name="okay">Login</button>
              </div>
            </form>
	</body>
</html>