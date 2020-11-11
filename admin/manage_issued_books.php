<?php
session_start();
error_reporting(0);
$con=mysqli_connect('localhost','root','','mysql');
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['return']))
{
$rid= intval($_GET['rid']);
$fine=$_POST['fine'];
$rstatus=1;
$sql=mysqli_query($con,"UPDATE tblissuedbookdetails SET fine='$fine',RetrunStatus='$rstatus' where id='$rid'");
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
            
                  $sql = mysqli_query($con ,"SELECT tblstudents.FullName,tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine,tblissuedbookdetails.RetrunStatus FROM tblissuedbookdetails JOIN tblstudents ON tblstudents.StudentId=tblissuedbookdetails.StudentID JOIN tblbooks ON tblbooks.id=tblissuedbookdetails.BookId where tblissuedbookdetails.id=$rid");
                // $sql = mysqli_query($con ," SELECT * FROM tblissuedbookdetails JOIN tblstudents ON tblstudents.StudentId=tblissuedbookdetails.StudentID JOIN tblbooks ON tblbooks.id=tblissuedbookdetails.BookId where tblissuedbookdetails.id=$rid");
               // $sql = mysqli_query($con ,"select * from tblissuedbookdetails inner join tblstudents on tblissuedbookdetails.StudentID=tblstudents.StudentId where tblissuedbookdetails.id=$rid"); 
               // $sql = mysqli_query($con ,"SELECT * from tblstudents INNER JOIN tblissuedbookdetails ON tblstudents.StudentId=tblissuedbookdetails.StudentID where tblissuedbookdetails.id=$rid");                              
               //$sql = mysqli_query($con ,"SELECT * from tblissuedbookdetails where id='$rid'");
               $rows1 = mysqli_num_rows($sql);
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
                  <label>Book Returned Status :</label>
                  <?php if($rows['RetrunStatus']=="1")
                          {
                              echo htmlentities("Returned");
                          } else 
                          {
                              echo $rows['Not Return Yet'];
                          }?>
                </div>
                <div class="form-group">
                  <label>Fine (in Rs) :</label>
                    <?php 
                    if($rows['fine']=="")
                    {?>
                      <input class="form-control" type="text" name="fine" id="fine"  required />
                    <?php }else 
                    {
                      echo $rows['fine'];
                    }?>
                </div>
                <?php if($rows['RetrunStatus']==0)
                        {?>
                            <button type="submit" name="return"  class="btn" style="background:rgba(128,0,0,1); color:white">Return Book </button>
              </div>
                        <?php }}?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>