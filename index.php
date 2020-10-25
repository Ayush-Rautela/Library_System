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
    <body style="background-image:url('lib.png');background-size: cover;">
      <?php include('navbar2.php')?>
      <div class="container-fluid">
       <?php include('showcase.php') ?>
        <div class="row">
          <div id="about" class="container text-center" style="background:rgba(255,255,255,0.5);margin-top: 10px;margin-bottom: 20px;">
            <h3>AGI LIBRARY</h3>
            <p><em>The Book Hub!</em></p>
            <p>We have created a Library website for AGI. This library consists each and every book of every department that is related to AGI family. Whether it's AIHM department or AIMCA or AITS or FCSA. Apart from that library also has its own collection of previous years Question Paper. Since the sole motto of the library is to provide every infromation that is in it's hand, the library also provide Newspapers to the students as well as to the faculty. The Library welcomes every student and faculty to share the ideas for the welfare of library. Anyone can search for books through this portal, to issue and reserve the book one needs to have the authorized ID of the Institute through which he or she can login in to his/her account for the further procedure.</p>
          </div>
          <div class="col-md-8 col-lg-8 text-center" id="contact" style="margin-left: 220px;">
            <div class="card" style="background:rgba(255,255,255,0.5);">
            <h1 class="card-header text-center" style="background-color:rgba(  128, 0, 0,0.8);color: white"><u>Contact</u></h1>
           <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" autocomplete="none" style="background: rgba(255,255,255, 0.5);color:white;" name="name" value="" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" autocomplete="none" style="background: rgba(255,255,255, 0.5);color:white;" value="" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <textarea name="message" class="form-control" rows="8" cols="80" placeholder="Enter your Message........" style="background: rgba(255,255,255, 0.5);color:white;"></textarea>
              </div>
              <button type="submit" class="btn" style="background-color:rgba(128,0,0,1);color:white" name="">Send Message</button>
            </div>
          </form>
          </div>
        </div>
        </div>
      </div>
      <?php include('footer.php') ?>
    </body>
</html>
