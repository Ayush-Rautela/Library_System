
<!DOCTYPE html>
<html>
<head>

  <title>userDashboard</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="public/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>

<style>
  {
    filter: grayscale(80%);
  }
</style>
                                                                                                                        
<link rel="stylesheet" type="text/css" href="css/template.css">
<div class="outer-wrap">
  <header class="masthead"style="background-color:rgba(  128, 0, 0,0.8);">
    <div class="sidebar-switcher">
      Back to home: <!--<a href="#" class="sidebar-left-toggle"><i class="fa fa-align-left"></i><span class="screen-reader-text">Move sidebar to the left</span></a>--> <!--<a href="#" class="sidebar-right-toggle"><i class="fa fa-align-right"></i><span class="screen-reader-text">Move sidebar to the right</span></a> --><!--<a href="#" class="no-sidebar-toggle"><i class="fa fa-align-justify"></i><span class="screen-reader-text">Display content vertically</span></a> --> <a href="project1/index1.php"><i class="fa fa-arrow-circle-right"></i><span class="screen-reader-text">Remove sidebar</span></a>
    </div><!-- .sidebar-switcher -->
    
  <div class="centered">
    <div class="site-branding">

      <h1 class="site-title"><a href="project1/index1.php"><i title="Back to home"class="fas fa-book-open" style="color: white;font-size: 34px; text-decoration: none;padding: 10px;"></i></a>Library management system </h1>
    </div><!-- .site-title -->
  </div><!-- .centered -->

    <div class="main-menu">
      <div class="nav-mixed menu">
        <nav id="multi-level-nav" class="multi-level-nav" role="navigation">
          <ul>
            <li><a href="#">User Dashboard</a></li>
            <li><a href="#"> Issued books</a></li>
      
            <li><a href="res_book">Reserve book</a></li>
            <li><a href="#">User Detail</a></li>
          </ul>
        </nav><!-- #multi-level-nav .multi-level-nav -->

        <nav id="social-menu" class="social-menu" role="navigation">
          <ul>
            <li><a href="https://twitter.com"><span class="screen-reader-text">Twitter</span></a></li>
            <li><a href="https://github.com"><span class="screen-reader-text">Github</span></a></li>
            <li><a href="https://www.linkedin.com"><span class="screen-reader-text">LinkedIn</span></a></li>
            <li><a href="http://dribbble.com"><span class="screen-reader-text">Dribbble</span></a></li>
            <li><a href="http://instagram.com"><span class="screen-reader-text">Instagram</span></a></li>
          </ul>
        </nav> <!-- .social-menu -->
      </div><!-- .mixed-menu -->
      </div><!-- main-menu -->
    </header><!-- .masthead -->
<!-- slider  -->
</div>
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