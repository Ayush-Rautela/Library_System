<?php
$con=mysqli_connect("localhost","root","","library");
session_start();
session_destroy();
header("location:../alogin.php")
?>