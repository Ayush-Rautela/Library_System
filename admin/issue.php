<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['uid'])==0)
    {   
header('location:index.php');
}
else{ 
  if(isset($_POST['issue']))
  {
    $studentid=strtoupper($_POST['studentid']);
    $bookid=$_POST['bookdetails'];
    $sql=mysqli_query($con,"INSERT INTO  tblissuedbookdetails(StudentID,BookId) VALUES('$studentid','$bookid')");
    if(mysqli_insert_id($con))
    {
      $_SESSION['msg']="Book issued successfully";
      header('location:book_trans.php');
    }
    else 
    {
      $_SESSION['error']="Something went wrong. Please try again";
      header('location:book_trans.php');
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
      <script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 
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
                <h4 class="header-line" style="color: white">Issue a New Book</h4>
            </div>
        </div>
      <div class="content-wrapper">
        <div class="container">
              
            <div class="row">
              <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
                <div class="panel panel-info" style="background:rgba(255,255,255,0.2)" >
                  <div class="panel-body">
                    <form role="form" method="post">
                      <div class="form-group">
                        <label>Student id<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" style="background:rgba(255,255,255,0.5);" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
                      </div>
                      <div class="form-group">
                        <span id="get_student_name" style="font-size:16px;"></span>
                      </div>
                      <div class="form-group">
                        <label>ISBN Number or Book Title<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" style="background:rgba(255,255,255,0.5);" name="booikid" id="bookid" onBlur="getbook()"  required="required" />
                      </div>
                      <div class="form-group">
                        <select  class="form-control" name="bookdetails" style="background:rgba(255,255,255,0.5);" id="get_book_name" readonly>
                        </select>
                      </div>
                      <div class="form-group text-center">
                      <button type="submit" name="issue" id="submit" class="btn" style="background-color:rgba(128,0,0,1);color:white">Issue Book </button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php }?>