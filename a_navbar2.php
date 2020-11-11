
<link rel="stylesheet" type="text/css" href="css/template.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="outer-wrap">
  <header class="masthead" style="background-color:rgba(  128, 0, 0,0.8);">
    <!--div class="sidebar-switcher">
      Back to home: <a href="First"><i class="fa fa-arrow-circle-right"></i><span class="screen-reader-text">Remove sidebar</span></a>
    </div>< .sidebar-switcher -->

  <div class="centered">
    <div class="site-branding">

      <h1 class="site-title"><a href="home.php"><i title="Back to home"class="fas fa-book-open" style="color: white;font-size: 34px; text-decoration: none;padding: 10px;"></i></a>Library Management System </h1>
    </div><!-- .site-title -->
  </div><!-- .centered -->

    <div class="main-menu" >
      <div class="nav-mixed menu" class="navbar navbar-fixed-top">
        <nav id="multi-level-nav"  class="multi-level-nav" role="navigation">
          <ul>
            <li><a class="nav-link" href="index.php"><i class="fas fa-home" style="font-size: 30px;"></i></a></li>
          </ul>
        </nav><!-- #multi-level-nav .multi-level-nav -->

       <!-- <nav id="social-menu" class="social-menu" role="navigation">
          <ul>
            <li><a href="https://twitter.com"><span class="screen-reader-text">Twitter</span></a></li>
            <li><a href="https://github.com"><span class="screen-reader-text">Github</span></a></li>
            <li><a href="https://www.linkedin.com"><span class="screen-reader-text">LinkedIn</span></a></li>
            <li><a href="http://dribbble.com"><span class="screen-reader-text">Dribbble</span></a></li>
            <li><a href="http://instagram.com"><span class="screen-reader-text">Instagram</span></a></li>
          </ul>
        </nav>--> <!-- .social-menu -->
      </div><!-- .mixed-menu -->
      </div><!-- main-menu -->
    </header><!-- .masthead -->
<!-- slider  -->
</div>
<!--div class="w3-content w3-section" style="max-width:100%">
  <img class="mySlides" src="upload/c11.jpg" style="width:100%">
  <img class="mySlides" src="upload/c22.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="upload/c33.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="/css/book12.jpg" style="width:100%" "min-height: 50px" >
  <img class="mySlides" src="/css/book8.jpg" style="width:100%" "min-height: 50px" >

</div-->

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
