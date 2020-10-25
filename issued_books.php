<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else
{ 
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
                <h4 class="header-line" style="color: white">Manage Issued Books</h4>
    </div>
    

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel" style="background:rgba(255,255,255,0.5);">
                        <div class="panel-heading text-center" style="background: rgba(128,0,0,0.7);color:white">
                          <h3><u>Issued Books </u></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="issueb">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Fine (in ₹)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $sid=$_SESSION['stdid'];
                                    $sql="SELECT tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblstudents.StudentId='$sid' order by tblissuedbookdetails.id desc";
                                    $query = mysqli_query($con,$sql);
                                    $result=mysqli_fetch_array($query);
                                    $cnt=1;
                                    if(mysqli_num_rows($query) > 0)
                                    {?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['BookName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['ISBNNumber']);?></td>
                                            <td class="center"><?php echo htmlentities($result['IssuesDate']);?></td>
                                            <td class="center"><?php if($result['ReturnDate']=="")
                                            {?>
                                            <span style="color:red">
                                             <?php   echo htmlentities("Not Return Yet"); ?>
                                                </span>
                                            <?php } else {
                                            echo htmlentities($result['ReturnDate']);
                                        }
                                            ?></td>
                                              <td class="center"><?php echo htmlentities($result['fine']);?></td>
                                         
                                        </tr>
                                    <?php $cnt=$cnt+1;} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
    </div>
</div>

     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('footer.php');?>
    

</body>
<script>  
 $(document).ready(function(){  
      $('#issueb').DataTable();  
 });  
 </script>  
</html>
<?php } ?>
