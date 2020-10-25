<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
$author=$_POST['author'];
$sql=mysqli_query($con,"INSERT INTO  tblauthors(AuthorName) VALUES('$author')");
if(mysqli_insert_id($con))
{
$_SESSION['msg']="Author Listed successfully";
header('location:manage_publication.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage_publication.php');
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
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="js/custom.js"></script>
  
   
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
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
                    <h4 class="header-line" style="color: white">Add Author</h4>
                </div>
            </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="panel" style="background:rgba(255,255,255,0.5);">
                    <div class="panel-heading text-center" style="background: rgba(128,0,0,0.7); color:white"><h3><u>
                        Author Info</u></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Author Name</label>
                                <input class="form-control" type="text" name="author" autocomplete="off"  required />
                            </div>
                            <button type="submit" name="create" class="btn" style="background: rgba(128,0,0,1);color:white">Add </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </body>
</html>
<?php }?>