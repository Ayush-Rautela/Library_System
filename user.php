<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:ulogin.php');
}
else{?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Library</title>
      <link rel="stylesheet" href="/css/app.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/template.css">
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

<body>

<style>
  {
    filter: grayscale(80%);
  }
</style>
                                                                                                                        

<?php include('navbar2.php');?>
<div class="w3-content w3-section" style="max-width:100%">
  <img class="mySlides" src="css/library3.jpg" style="width:100%">
  <img class="mySlides" src="css/71.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/book1.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/72.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/book12.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/book8.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/75.png" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/52.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/53.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="css/61.jpg" style="width:100%" "min-height: 50px" >
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
</body>
</html>
<?php } ?>