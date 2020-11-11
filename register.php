<?php
include('config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
    //Code for student ID
$count_my_page = ("studentid.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$userid=$hits[0]; 
$uname=$_POST['name'];
$course=$_POST['course'];
$check = empty($course);
$utype=$_POST['usertype'];
$c_no=$_POST['contact_no'];
$address=$_POST['address'];
$paswd=$_POST['password'];
$cpswd=$_POST['password_confirmation'];
$email=$_POST['email'];
$emailsql = "SELECT * FROM tblstudents WHERE EmailId='$email'";
$result = mysqli_query($con,$emailsql);
$row = mysqli_num_rows($result);
echo $row;

    if ($row < 1) 
    {   
        
    if($paswd==$cpswd)
    {  
        $hash = password_hash($paswd,PASSWORD_DEFAULT);
        if($check==True)
        {
            $sql=mysqli_query($con,"INSERT into faculty(Id,FName,ContactNo,Email,Address,Password) VALUES ('$userid','$uname','$c_no','$email','$address','$hash')");
            printf ("New Record has id %d.\n", mysqli_insert_id($con));
            header('location:register.php');
            mysqli_close($con);
        }
        else
        {
        $sql=mysqli_query($con,"INSERT into tblstudents(StudentId,FullName,MobileNumber,EmailId,Address,Course,Password) VALUES ('$userid','$uname','$c_no','$email','$address','$course','$hash')");
        printf ("New Record has id %d.\n", mysqli_insert_id($con));
        header('location:register.php');
        mysqli_close($con);
        }
    }
}
else
{
    ?>
             <script>
                  alert('Cant signup Email Address is already Exist ');
                  window.open('register.php','_self');
             </script>
    
    <?php
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
<script>
    function valid()
        {
        if(document.form1.password.value!= document.form1.password_confirmation.value)
        {
        alert("New Password and Confirm Password Field do not match  !!");
        document.form1.password_confirmation.focus();
        return false;
        }
        return true;
        }
</script>
 <!-- <script type="text/javascript">
$(document).ready(function(){
    $('#emailid').blur(function(){
        var email=$(this).val();
        $.ajax(
        {
            url:'check_availability.php',
            method:"POST",
            data:{e_mail:email},
            success:function(data)
            {
                if(data!='0')
                {
                    $('#availability').html('<span class="text-danger">Email ID not available!!</span>');
                    $('#submit').attr("disabled",true);
                }
                else{
                    $('#availability').html('<span class="text-success">Email ID is available!!</span>');
                    $('#submit').attr("disabled",false);
                }
            }
        });
    });
});
 </script>  -->
    <body style="background-image:url('lib.png');background-size: cover;">
      <?php include('navbar2.php')?>
       <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="background-color: rgba(255,255,255,0.2); margin-top: 25px; margin-bottom: 20px;" >
                    <div class="card-header text-center" style="background:rgba(128,0,0,0.7); color:white; font-family: sans-serif; font-size: 25px"><h3><u> Register</u><h3></div>
                        <div class="card-body" >
                            <form id="form1" name="form1" method="post" action="register.php" onSubmit="return valid();">
                                <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;font-family: sans-serif; font-size:14px;">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" style="background:rgba(255,255,255,0.5);" class="form-control" name="name"   autocomplete="offset-md-4" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_no" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;font-family: sans-serif; font-size:14px;">Contact No</label>

                            <div class="col-md-6">
                                <input id="contact_no" type="text" style="background:rgba(255,255,255,0.5);" class="form-control" name="contact_no" onkeypress="return valid1(event);" maxlength="10" autocomplete="offset-md-4" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="usertype" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;font-family: sans-serif; font-size:14px;">User Type</label>
                            <div class="col-md-6">
                               <!-- <label class="radio-inline"><input type="radio" name="usertype" onclick="maint(0);" >Faculty</label> -->
                                <label class="radio-inline"><input type="radio" name="usertype" onclick="maint(1);">Student</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;font-family: sans-serif; font-size:14px;">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" style="background:rgba(255,255,255,0.5);" class="form-control" name="address" autocomplete="offset-md-4" required autofocus>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" style="font-weight: bold;font-family: sans-serif; font-size:14px;" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="emailid" type="email" style="background:rgba(255,255,255,0.5);" class="form-control"  name="email" required>
                                <span id="availability" style="font-size:12px;"></span> 
                            </div>
                        </div>
                        <div class="form-group row">
                           <label for="sql" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;font-family: sans-serif; font-size:14px;"> Course <span style="color:red;">*</span></label>
                                <div class="col-md-6">
                                    <select id="course" class="form-control" name="course" required="required" placeholder="Choose">
                                    <option value="" disabled selected>Choose</option>
                                      <option value="BCA">BCA</option>
                                      <option value="B.TECH">B.TECH</option>
                                      <option value="BBA">BBA</option>
                                      <option value="MCA">MCA</option>
                                      <option value="MBA">MBA</option>
                                      <option value="MBA">FACULTY</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" style="font-weight: bold;font-family: sans-serif; font-size:14px;" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" style="background:rgba(255,255,255,0.5);" type="password" class="form-control" name="password" id="txtNewPassword" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" style="font-weight: bold;font-family: sans-serif; font-size:14px;" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" style="background:rgba(255,255,255,0.5);" type="password" class="form-control" name="password_confirmation" id="txtConfirmPassword" required>
                            </div>
                            <span id='msg'></span>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn" name="submit" style="background:rgba(128,0,0,1);color:white" id="submit" value="Submit" ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php include('footer.php'); ?>
 </body>
 </html>
 <script>
   function valid1(evt)
{
if(navigator.appName=="Microsoft Internet Explorer")
{
if(evt.keyCode>=48 && evt.keyCode<=58)
{
 }
 else
 {
 return false;
 }
 }
 else{
 if(evt.which>=48 && evt.which<=58 || evt.which==8)
 {
 }
 else{
 return false;
 }
 }
 }
function maint(x)
{
if(x==0)
{
        document.getElementById('course').disabled=true;
        document.getElementById('course').value="Not Applicable";
}
else
{
        document.getElementById('course').disabled=false;
        document.getElementById('course').value="";
        document.getElementById('course').focus();
}
return;
} 
 </script>