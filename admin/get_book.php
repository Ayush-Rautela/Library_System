<?php 
require_once("includes/config.php");
if(!empty($_POST["bookid"])) 
{
  $bookid=$_POST["bookid"];
 $sql =mysqli_query($con,"SELECT BookName,id FROM tblbooks WHERE (ISBNNumber='$bookid')");
$result = mysqli_fetch_array($sql);
$cnt=1;
if(mysqli_num_rows($sql) == 1)
{?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['BookName']);?></option>
<b>Book Name :</b> 
<?php  
echo htmlentities($result['BookName']);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}

 else{?>
  
<option class="others"> Invalid ISBN Number</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
