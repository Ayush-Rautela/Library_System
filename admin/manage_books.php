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
      $sql1=mysqli_query($con,"DELETE from tblbooks where id='$id'");
      $_SESSION['delmsg']="Book Deleted";
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
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="js/custom.js"></script>
  
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <link href="css/style.css" rel="stylesheet" /> 
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
 <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="color:white">Manage Books</h4>
            </div>
             <div class="row">
            <?php if($_SESSION['error']!="")
            {?>
        <div class="col-md-6">
        <div class="alert alert-danger"  >
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
                           <h3><u>Book List</u></h3>
                        </div>
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-bordered table-hover" >  
                          <thead>  
                               <tr>  
                                    <th>SNo.</th>
                                    <th>BookName</th>
                                    <th>ISBN NO.</th>
                                    <th>Book Price</th>
                                    <th>Registration Date</th>
                                    <th>Updation Date</th> 
                               </tr>  
                          </thead>  
                          <?php 
                          $sql=mysqli_query($con,"SELECT * from  tblbooks");
                          $cnt=1; 
                          while($row = mysqli_fetch_array($sql))  
                          {?>
                            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['BookName']; ?></td>
                <td><?php echo $row['ISBNNumber']; ?></td>
                <td><?php echo $row['BookPrice']; ?></td>
                <td><?php echo $row['RegDate']; ?></td>
                <td><?php echo $row['UpdationDate']; ?></td>
                <td class="center">
                  <a href="edit_book.php?bookid=<?php echo $row['id'];?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button></a> 
                  <a href="manage_books.php?del=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></a>
                </td>
              </tr>
                           <?php $cnt=$cnt+1;}
                            ?>  
                     </table>  
               </div>
                         </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>