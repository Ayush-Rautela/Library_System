

<!-- DATATABLE STYLE  -->
    <link href="../js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<!-- DATATABLE SCRIPTS  -->
    <script src="../js/dataTables/jquery.dataTables.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="outer-wrap">
  <header class="masthead" style="background-color:rgba(  128, 0, 0,0.8);">
    <div class="sidebar-switcher">
      Logout <a href="logout.php"><i class="fa fa-sign-out"></i><span class="screen-reader-text">Remove sidebar</span></a>
    </div><!-- .sidebar-switcher -->

  <div class="centered">
    <div class="site-branding">

      <h1 class="site-title"><a href="First"><i title="Back to home"class="fas fa-book-open" style="color: white;font-size: 34px; text-decoration: none;padding: 10px;"></i></a>Library management system </h1>
    </div><!-- .site-title -->
  </div><!-- .centered -->

    <div class="main-menu" >
      <div class="nav-mixed menu" class="navbar navbar-fixed-top">
        <nav id="multi-level-nav"  class="multi-level-nav" role="navigation">
          <ul>
            <li><a class="nav-link" href="ahome.php">Dashboard</a></li>
            <li class="dropdown">
              <a class="dropdown" data-toggle="dropdown" href="#">Publication
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="addpublication.php">Add Publication</a></li>
                <li><a class="nav-link" href="manage_publication.php">Manage Publication</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown" data-toggle="dropdown" href="#">Authors
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="add_author.php">Add Author</a></li>
                <li><a class="nav-link" href="manage_authors.php">Manage Author</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown" data-toggle="dropdown" href="#">Books
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="add_book.php">Add Book</a></li>
                <li><a class="nav-link" href="book_trans.php">Manage Add Books</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown" data-toggle="dropdown" href="#">Issue Book
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="issue.php">Issue Book</a></li>
                <li><a class="nav-link" href="book_trans.php">Manage Issued Books</a></li>
              </ul>
            </li>
            <li><a href="regstud.php">Registered User</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
      
          </ul>
        </nav>
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
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
