<?php
session_start();
include('./PHP/comment.php');
?>

<!-- db -->

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="style/aboutus.css">
  

</head>

<body class="bg-dark">
  <!--HEADER FROM HERE-->
  <div class="containermy">
    <div class="boxx1">
      <header>
        <img src="Images/logo.png">
      </header>
    </div>
  </div>
  <!--NAVIGATION FROM HERE-->
  <!--NAVIGATION FROM HERE-->
  <?php include('navbar.php') ?>
  <!--ABOUTUS-->
  <div class="container aboutus">
    <div class="about m-2">
      <hr style="color: white;">
      <h1 class="abotus"><span style="color: red;">A</span>BOUT <span style="color: red;">U</span>S</h1>
      <hr style="color: white;">

    </div>
    <section>
      <div class="text container">
        <h2>ABOUT US</h2>
        <p>Started as a small business in the year 2020, our group has now grown into a leading business occupying the Computer market in Sri Lanka.
          Today, it has evolved into a computerized website and sales platform.
          Started from the concept of Mr. P.I.Siriwardana, this website is a job of 30 employees working in various departments.<br>
          Our company consists of computer hardware engineers with years of experience.

        </p>
      </div>
    </section>
    <hr style="color: white;">
    </div>
    <section>
    <div class="row">
      <div class="col-12 details fa-pull-left boxfloat">
        <div class="locations text-center">
          <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" style="width: 50 ; ">
            <path fill="currentColor" d="M288 896h448q32 0 32 32t-32 32H288q-32 0-32-32t32-32z" />
            <path fill="currentColor" d="M800 416a288 288 0 1 0-576 0c0 118.144 94.528 272.128 288 456.576C705.472 688.128 800 534.144 800 416zM512 960C277.312 746.688 160 565.312 160 416a352 352 0 0 1 704 0c0 149.312-117.312 330.688-352 544z" />
            <path fill="currentColor" d="M544 384h96a32 32 0 1 1 0 64h-96v96a32 32 0 0 1-64 0v-96h-96a32 32 0 0 1 0-64h96v-96a32 32 0 0 1 64 0v96z" />
          </svg>
          <p>CRYSTAL TECH COMPUTERS(Pvt)Ltd</p>
          <p>No 209/A Periyamulla,Negombo</p>
        </div>
      </div>

      <div class="col-12 details fa-pull-left boxfloat">
        <div class="row locations text-center">
          <div class="col-lg-6">
        <h4><i class="fa fa-envelope"></i> Mail</h4>
          <p>contactcrystal@hotmail.com</p>
          <p>salescrystal@hotmail.com</p>
          </div>
        
          <div class="col-lg-6">
          <h4><i class="fa fa-contact-card"></i> Contact </h4>
          <p>Telephone : 0312222112 (Works Hours only)<br>Whatsapp : 0774411211</p>
        </div>
        
      </div>

      

    </div>
    </section>


 

  <section>
    <div class="container-fluid">
      <h2 style="color: aliceblue;">
        What's on Your Mind
      </h2>
      <div class="p-3">
        <div class="commentx col-md-12">
          <form id="algin-form" action="about.php" method="post" name="commentForm">
            <div class="form-group cmt">
              <h4 style="color: aliceblue;">Leave a comment</h4>
              <label for="message" style="color: aliceblue;">Message</label>
              <textarea name="msg" id="" msg cols="30" rows="5" class="form-control" style="background-color: rgba(255, 255, 255, 0.164);" placeholder="your comments..."></textarea>
            </div>
            <div class="form-group cmt">
              <button id="post" class="btn btn-secondary my-1" name="commbtn" type="submit">Post Comment</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
            <!-- <div class="form-group cmt">
              <label for="name" style="color: aliceblue;">Name</label>
              <input type="text" name="name" id="fullname" class="form-control" style="background-color: rgba(255, 255, 255, 0.164);" placeholder="Full name...">
            </div>
            <div class="form-group cmt">
              <label for="email" style="color: aliceblue;">Email</label>
              <input type="text" name="email" id="email" class="form-control" style="background-color: rgba(255, 255, 255, 0.164);" placeholder="Email...">
            </div> -->


            

  <!--JAVA GRID IMAGES-->
<section>
  <!-- Copyright -->
  <div class="text-light text-center p-3 align-baseline" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
    © 2022 Copyright:
    <a class="text-light" href="#">CRYSTAL TECH COMPUTERS</a>
    | ProjectCconcept
  </div>
  </section>
  <!-- Copyright -->
  <!--JAVA SCRIPT FROM HERE-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>