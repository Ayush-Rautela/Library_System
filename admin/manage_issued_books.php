<?php
session_start();
error_reporting(0);
$con=mysqli_connect('localhost','root','','library');


if(isset($_POST['return']))
{
$rid=intval($_GET['rid']);
$fine=$_POST['fine'];
$rstatus=1;
$sql=mysqli_query($con,"UPDATE tblissuedbookdetails set fine='$fine',RetrunStatus='$rstatus' where id='$rid'");
$_SESSION['msg']="Book Returned successfully";
header('location:book_trans.php');
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
      </style>
</head>
<body style="background-image: url('lib.png');
background-repeat: no-repeat;
background-size: cover;">
      <!------MENU SECTION START-->
<?php include('includes/navbar2.php');?>
<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color: white">Manage Issued Books</h4>
              </div>
             <div class="row">
                <?php if($_SESSION['error']!="")
                {?>
                  <div class="col-md-6">
                  <div class="alert alert-danger" >
                   <strong>Error :</strong> 
                   <?php echo htmlentities($_SESSION['error']);?>
                  <?php echo htmlentities($_SESSION['error']="");?>
                  </div>
                  </div>
                <?php } ?>
                <?php if($_SESSION['msg']!="")
                {?>
                  <div class="col-md-6">
                  <div class="alert alert-success" >
                   <strong>Success :</strong> 
                   <?php echo htmlentities($_SESSION['msg']);?>
                  <?php echo htmlentities($_SESSION['msg']="");?>
                  </div>
                  </div>
                <?php } ?>
                <?php if($_SESSION['delmsg']!="")
                {?>
                  <div class="col-md-6">
                  <div class="alert alert-success" >
                   <strong>Success :</strong> 
                   <?php echo htmlentities($_SESSION['delmsg']);?>
                  <?php echo htmlentities($_SESSION['delmsg']="");?>
                  </div>
                  </div>
                <?php } ?>
             </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
            <div class="panel" style="background:rgba(255,255,255,0.2); ">
              <div class="panel-heading text-center" style="background:rgba(128,0,0,0.7);color:white">
                <h2><u>Issued Books</u></h2>
              </div>
            <div class="panel-body text-center">
              <form role="form" method="post">
              <?php 
              $rid=intval($_GET['rid']);
              $sql=mysqli_query($con,"SELECT tblstudents.FullName,tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine,tblissuedbookdetails.RetrunStatus from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblissuedbookdetails.id=$rid ");
              $rows=mysqli_fetch_array($sql);
                              ?> 
                <div class="form-group">
                  <label>Student Name :</label>
                  <?php echo $rows['FullName'];?>
                </div>
                <div class="form-group">
                  <label>Book Name :</label>
                  <?php echo $rows['BookName'];?>
                </div>
                <div class="form-group">
                  <label>ISBN :</label>
                  <?php echo $rows['ISBNNumber'];?>
                </div>
                <div class="form-group">
                  <label>Book Issue Date :</label>
                  <?php echo $rows['IssuesDate'];?>
                </div>
                <div class="form-group">
                  <label>Book Returned Date :</label>
                  <?php if($rows['ReturnDate']=="")
                          {
                              echo htmlentities("Not Return Yet");
                          } else 
                          {
                              echo $rows['ReturnDate'];
                          }?>
                </div>
                <div class="form-group">
                  <label>Fine (in ₹) :</label>
                    <?php 
                    if($rows['fine']=="")
                    {?>
                      <input class="form-control" type="text" name="fine" id="fine"  required />
                    <?php }else 
                    {
                      echo $rows['fine']."₹";
                    }?>
                </div>
                <?php if($rows['RetrunStatus']==0)
                        {?>
                            <button type="submit" name="return" id="submit" class="btn" style="background:rgba(128,0,0,1); color:white">Return Book </button>
              </div>
                        <?php } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>