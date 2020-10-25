<?php 
require_once("includes/config.php");
if(!empty($_POST["studentid"])) {
  $studentid= strtoupper($_POST["studentid"]);
$sql =mysqli_query($con,"SELECT FullName,Status FROM tblstudents WHERE StudentId='$studentid'");
$result = mysqli_fetch_array($sql);
$cnt=1;
if(mysqli_num_rows($sql) == 1)
{
if($result['Status']==1)
{
echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
echo "<b>Student Name-</b>" .$result['FullName'];
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo htmlentities($result['FullName']);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
 else{
  
  echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
