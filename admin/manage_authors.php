<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = mysqli_query($con,"DELETE from tblauthors  WHERE id='$id'");
$_SESSION['delmsg']="Author deleted";
header('location:manage_authors.php');

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
                    <h4 class="header-line" style="color: white">Manage Authors</h4>
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
            <?php if($_SESSION['updatemsg']!="")
            {?>
                <div class="col-md-6">
                    <div class="alert alert-success" >
                     <strong>Success :</strong> 
                     <?php echo htmlentities($_SESSION['updatemsg']);?>
                    <?php echo htmlentities($_SESSION['updatemsg']="");?>
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
            <div class="col-md-12">
                <!-- Advanced Tables -->
                    <div class="panel" style="background:rgba(255,255,255,0.5);">
                        <div class="panel-heading text-center" style="background:rgba(128,0,0,0.7);color: white">
                           <h3><u>Authors Listing</u></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="myauth">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Author</th>
                                            <th>Creation Date</th>
                                            <th>Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sql1 = mysqli_query($con, "SELECT * from  tblauthors");
                                    $cnt=1;
                                    if(mysqli_num_rows($sql1)> 0)
                                    {
                                    while($result=mysqli_fetch_array($sql1))
                                    {               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['AuthorName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['creationDate']);?></td>
                                            <td class="center"><?php echo htmlentities($result['UpdationDate']);?></td>
                                            <td class="center">

                                            <a href="edit-author.php?athrid=<?php echo htmlentities($result['id']);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>
                                          <a href="manage_authors.php?del=<?php echo htmlentities($result['id']);?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php $cnt=$cnt+1;}} ?>                                      
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
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#myauth').DataTable();  
 });  
 </script>  
<?php } ?>