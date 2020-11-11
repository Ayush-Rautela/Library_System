<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['uid'])==0)
{   
    header('location:index.php');
}
else{ 
    if(isset($_POST['update']))
    {
    $bname=$_POST['Bname'];
    $price=$_POST['price'];
    $isbn=$_POST['isbn'];

    $bookid=intval($_GET['bookid']);
    $sql1=mysqli_query($con,"UPDATE tblbooks SET BookName='$bname',BookPrice='$price' ,ISBNNumber='$isbn' where id='$bookid'");
    $_SESSION['updatemsg']="Publisher updated successfully";
    header('location:manage_books.php');
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
      </style>
</head>
<body style="background-image: url('lib.png');
background-repeat: no-repeat;
background-size: cover;">
      <!------MENU SECTION START-->
<?php include('includes/navbar2.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper" >
        <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color:white">Edit Book</h4> 
            </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <div class="panel" style="background:rgba(255,255,255,0.2);">
          <div class="panel-heading text-center" style="background:rgba(128,0,0,0.7);color:white">
            <h2><u>Book Info</u></h2>
          </div>
          <div class="panel-body">
              <form role="form" method="post">
              <?php 
              $pubid=intval($_GET['pubid']);
              $sql=mysqli_query($con,"SELECT * from tblcategory where id=$pubid ");
              $rows=mysqli_fetch_array($sql);
                              ?> 
                <div class="form-group">
                  <label>Book Name</label>
                  <input class="form-control" type="text" name="Bname" value="<?php echo $rows['CategoryName'];?>" required />
                </div>
                <div class="form-group">
                    <label>Price<span style="color:red;">*</span></label>
                    <input class="form-control" type="text" name="price" autocomplete="off"   required="required" />
                </div>
                <div class="form-group">
                    <label>ISBN NO.<span style="color:red;">*</span></label>
                    <input class="form-control" type="text" name="isbn" autocomplete="off"   required="required" />
                </div>
                </div>
                <button type="submit" name="update" class="btn" style="background:rgba(128,0,0,1); color:white">Update </button>
              </form>
            </div>
          </div>
        </div>
      
</body>
</html>