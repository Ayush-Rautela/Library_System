<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$bookname=$_POST['bookname'];
$category=$_POST['category'];
$author=$_POST['author'];
$isbn=$_POST['isbn'];
$price=$_POST['price'];
$sql=mysqli_query($con,"INSERT INTO  tblbooks(BookName,CatId,AuthorId,ISBNNumber,BookPrice) VALUES('$bookname','$category','$author','$isbn','$price')");
if(mysqli_insert_id($con))
{
$_SESSION['msg']="Book Listed successfully";
header('location:manage-books.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-books.php');
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
                <h4 class="header-line" style="color: white">Add Book</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="panel" style="background:rgba(255,255,255,0.5);">
                    <div class="panel-heading text-center" style="background: rgba(128,0,0,0.7); color:white"><h3><u>Book Info</u></h3>
                    </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Book Name<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="bookname" autocomplete="off"  required />
                        </div>
                        <div class="form-group">
                            <label> Category<span style="color:red;">*</span></label>
                                <select class="form-control" name="category" required="required">
                                <option value=""> Select Category</option>
                                <?php 
                                $status=1;
                                $sql_= "SELECT * from  tblcategory where Status=$status";
                                $results = mysqli_query($con,$sql_);
                                //$results=mysqli_fetch_array($sq1l);
                                $cnt=1;
                                
                                if(mysqli_num_rows($results) > 0)
                                {
                                foreach($results as $result)
                                {               ?>  
                                <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
                                 <?php }} ?> 
                                </select>
                        </div>
                        <div class="form-group">
                            <label> Author<span style="color:red;">*</span></label>
                                <select class="form-control" name="author" required="required">
                                <option value=""> Select Author</option>
                                <?php 
                                $sql_="SELECT * from  tblauthors";
                                $results = mysqli_query($con,$sql_);
                                $cnt=1;
                                if(mysqli_num_rows($results) > 0)
                                {
                                foreach($results as $result)
                                {               ?>  
                                <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['AuthorName']);?></option>
                                 <?php }} ?> 
                                </select>
                        </div>
                        <div class="form-group">
                            <label>ISBN Number<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="isbn"  required="required" autocomplete="off"  />
                                <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
                        </div>
                        <div class="form-group">
                            <label>Price<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="price" autocomplete="off"   required="required" />
                        </div>
                        <button type="submit" name="add" class="btn" style="background: rgba(128,0,0,1);color:white">Add </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
</body>
</html>
<?php }?>