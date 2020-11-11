<?php 
session_start();
include('config.php');
error_reporting(0);
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['update']))
{    
$sid=$_SESSION['uid'];  
$fname=$_POST['fullanme'];
$mobileno=$_POST['mobileno'];

$sql="UPDATE tblstudents set FullName='$fname',MobileNumber='$mobileno' where id='$sid'";
$query = mysqli_query($con,$sql);
echo '<script>alert("Your profile has been updated")</script>';
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
            /*CUSTOM AVATAR STYLE*/
  .p_avatar{
    vertical-align: middle;
    width: 80px;
    height: 80px;
    border-radius: 50%;
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
                    <h4 class="header-line" style="color: white">My Profile</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel" style="background:rgba(255,255,255,0.2);">
                        <div class="panel-heading text-center" style="background:rgba(128,0,0,0.7);color:white">
                           <h3><u>My Profile</u></h3>
                        </div>
                    <div class="panel-body" style="color: white">
                        <form name="signup" method="post">
                        <?php 
                        $sid=$_SESSION['uid'];
                        $sql="SELECT * from  tblstudents  where id='$sid' ";
                        $query =mysqli_query($con,$sql);
                        $result=mysqli_fetch_array($query);
                        $cnt=1;
                        if(mysqli_num_rows($query) == 1)
                        {              ?>  
                            <div class="form-group">
                                <label style="color:black;font-size: 17px;">Student ID : </label>
                                <!-- <span style="color: green;font-weight: bold;font-size: 18px;"> -->
                                    <?php echo htmlentities($result['StudentId']);?>
                                <!-- </span> -->
                               
                            </div>
                            <div class="form-group">
                                <label style="color:black;">Name: </label>
                                <?php echo htmlentities($result['FullName']);?>
                            </div>
                            <div class="form-group">
                                <label style="color:black;">Reg Date : </label>
                                <?php echo htmlentities($result['RegDate']);?>
                            </div>
                            <?php if($result['UpdationDate']!=""){?>
                            <div class="form-group">
                                <label style="color:black;">Last Updation Date : </label>
                                <?php echo htmlentities($result['UpdationDate']);?>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label style="color:black;">Profile Status : </label>
                                <?php if($result['Status']==0){?>
                                <span style="color: red; font-weight: bold">Inactive</span>
                                <?php } else { ?>
                                <span style="color: green">Active</span>
                                <?php }?>
                            </div>
                            <div class="form-group">
                                <label style="color:black;">Enter Full Name</label>
                                <input class="form-control" type="text" name="fullanme" value="<?php echo htmlentities($result['FullName']);?>" style="background:rgba(255,255,255,0.5);" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label style="color:black;">Mobile Number :</label>
                                <input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result['MobileNumber']);?>" style="background:rgba(255,255,255,0.5);" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label style="color:black;">Enter Email</label>
                                <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result['EmailId']);?>" style="background:rgba(255,255,255,0.5);"  autocomplete="off" required readonly />
                            </div>
                            <?php } ?>
                            <button type="submit" name="update" class="btn" style="background:rgba(128,0,0,1);color:white;" id="submit">Update Now </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>
