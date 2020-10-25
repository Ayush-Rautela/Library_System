<?php

$con=mysqli_connect('localhost','root','','library');


if(isset($_POST['e_mail']))
{
 $emailId=mysqli_real_escape_string($con,$_POST['e_mail']);

 $query=mysqli_query($con," SELECT * FROM tblstudents WHERE EmailId='".$emailId."'");

 echo mysqli_num_rows($query);
}
?>