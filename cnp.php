 <?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:ulogin.php');
}
else{?>
 <?php
        $con=mysqli_connect("localhost","root","","clg");
        $id = $_POST['sid'];
        $pass = $_POST['ps'];
              if(isset($_POST["ok"]))
      {
      	$sql_ins=mysqli_query($con,"UPDATE signup SET password='$pass' where id = $id");
      	if ($sql_ins) 
      	{ 
          ?>
       <script>
          alert("password changed sucessfully");
          window.location.href="signin.php";
       </script>
      	
        <?php
      }
      	else
      	{
          ?>
          <script>
            alert("password is not changed");
            window.location.href="cnp.php";
          </script>
      	 <?php 


      	}
      }
      ?>

  <html>
  <head>
  <title>fordemo</title>
   
</head>
<link rel="stylesheet" type="text/css" href="for.css">
<body>
    <form method="POST" action="" name="form1" onSubmit="return valid();">
      <div class="main">
      <div class="header">
                 <div class="h1">
           <td>LIBRARY MANAGMENT SYSTEM</td>
           </div>
      
      </div>
        <div class="center">
        
          <div class="center1">
                         <div class="e1">
                  <td> PASSWORD RECOVERY</td>
                          </div>
          </div>
               
    <div class="data">
      <div class="e2">
  <table align="center">
      <tr>
          <td class="d1">Enter your id</td>
          <td><input type="text" name="sid" placeholder="Enter your id" class="d2"></td>
        </tr>
         <tr>
          <td class="d1">Enter your new password</td>
         <td><input type="password" name="nw" placeholder="Enter your password" class="d2"></td>
        </tr>
    <tr>
      <td class="d1">confirm password</td>
      <td><input type="password" name="ps" placeholder="confirm password" class="d2"></td>
    </tr>
   </table>
   <div class="e3">
       <tr>
    <td><input type="submit" name="ok" value="submit" class="e4"></td>
        </tr>
   </div>   
</div>

        </div>
      </div>
      <script>
    function valid()
        {
        if(document.form1.nw.value!= document.form1.ps.value)
        {
        alert("New Password and Confirm Password Field do not match  !!");
        document.form1.ps.focus();
        return false;
        }
        return true;
        }
</script>
    </form>
</body>
</html>