<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else{ 

  if(isset($_GET['inid']))
    {
    $id=$_GET['inid'];
    $status=0;
    $sql1 =mysqli_query($con,"UPDATE tblstudents set Status='$status'  WHERE id='$id'");
    header('location:regstud.php');
    }
     if(isset($_GET['id']))
    {
    $id=$_GET['id'];
    $status=1;
    $sql1 =mysqli_query($con,"UPDATE tblstudents set Status='$status'  WHERE id='$id'");
    header('location:regstud.php');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
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
   <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color: white">Manage Reg Students</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel" style="background:rgba(255,255,255,0.5);">
                        <div class="panel-heading text-center" style="background:rgba(128,0,0,0.7);color: white">
                          <h3><u>Reg Students</u></h3>
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                             <table id="myTable" class="table table-bordered table-hover" style="background:rgba(255,255,255,0.5);">
                            <thead>
                          <tr class="header">
                            <th>S. No.</th>
                             <th>Student ID</th>
                             <th>Name</th>
                             <th>Email ID</th>
                             <th>Contact Number</th>
                             <th>Registration Date</th>
                             <th>Status</th>
                             <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql=mysqli_query($con,'SELECT * from tblstudents');
                          $row=mysqli_fetch_array($sql);
                      

                              $cnt=1;
                              while($row=mysqli_fetch_array($sql))
                                    {?>
                                      <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['StudentId']; ?></td>
                                        <td><?php echo $row['FullName']; ?></td>
                                        <td><?php echo $row['EmailId']; ?></td>
                                        <td><?php echo $row['MobileNumber']; ?></td>
                                        <td><?php echo substr($row['RegDate'], 0); ?></td>
                                        <?php 
                                        if($row['Status']==1) 
                                        {
                                          echo '<td>Active</td>';
                                        }
                                        else
                                          {
                                          echo '<td>Inactive</td>';
                                        }
                                          ?>
                                          <td class="center">
                                            <?php if($row['Status']==1)
                                                      {?>
                                                <a href="regstud.php?inid=<?php echo htmlentities($row['id']);?>" onclick="return confirm('Are you sure you want to Inactive this student?');" >  <button class="btn btn-danger"> Inactive</button></a>
                                                <?php 
                                                } 
                                                else 
                                                {?>
                                                <a href="regstud.php?id=<?php echo htmlentities($row['id']);?>" onclick="return confirm('Are you sure you want to active this student?');"><button class="btn btn-primary"> Active</button></a> 
                                                <?php } ?>
                                          </td>
                                      </tr>
                                      <?php $cnt=$cnt+1;
                                    }?>
                          
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
    <script>
 $(document).ready(function(){  
      $('#myTable').DataTable();  
 }); 
</script>
</div>
</body>
</html>
<?php }?>