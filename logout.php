<?php
session_start();
$con=mysqli_connect("localhost","root","","mysql");
session_destroy();
header("location:index.php")
?>