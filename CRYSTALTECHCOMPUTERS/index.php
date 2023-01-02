<?php
include('header.php');
include('./PHP/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRYSTAL TECH COMPUTERS</title>
  <link rel="stylesheet" href="style/aboutstyle.css">
  <link rel="stylesheet" href="style/h1.css">
  <link rel="stylesheet" href="style/slideshow.css">
  <link rel="stylesheet" href="style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  
  
</head>

<body class="bg-dark">
  <!--HEADER FROM HERE-->
  <div class="containermy">
    <div class="boxx1">
      <header>
        <img src="images/logo.png">
      </header>
    </div>
  </div>
  ?>
  <!--NAVIGATION FROM HERE-->
  <?php include('navbar.php') ?>
  <!--JAVA GRID IMAGES-->

  <!-- Slideshow container -->
 


  <div class="container m-auto ">
  <hr style="background-color:aliceblue;">
  <h1 class="text-light text-center"><span>HOT</span> <span>DEAL!</span></h1>

  <div class="container">


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="images/promo1.jpg" style="width:100%">
  <div class="text">New Items</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="images/promo2.jpg" style="width:100%">
  <div class="text">Visit our shop</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="images/promo3.jpg" style="width:100%">
  <div class="text">Trustable delivery service</div>
</div>



</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

  </div>
  <!-- promotion -->
  <hr style="background-color:aliceblue;">
    <div class="row">
    
      <?php
      $run_qry = mysqli_query($dbConnection, 'SELECT * FROM promotion');
      while ($row = mysqli_fetch_assoc($run_qry)) {
        echo '<div class="col-12 col-sm-12 col-md-12 col-lg-3 p-3 ">';
        echo '<div class="card bg-image hover-overlay hover-zoom hover-shadow ripple" style="background-color: rgba(165, 42, 42, 0.068); color:#fff;">
              <img src="http://localhost/ctcadmin/images/news/' . $row['cover'] . '" alt="' . $row['topic'] . '" class="img-rounded img-fluid w-100 card-img-top" height="250" />
             
              <div class="card-body">
                <h3 class="card-title">'.$row['topic'].'</h3>
                <p>'.$row['msg'].'</p>
               
              </div>
            </div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>


  <footer class="bg-dark text-center text-lg-start opacity-75">
    <!-- Copyright -->
    <div class="text-light text-center p-3" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
      © 2022 Copyright:
      <a class="text-light" href="#">CRYSTAL TECH COMPUTERS</a>
      | ProjectCconcept
    </div>
    <!-- Copyright -->
  </footer>

  <!--Login -->


  <!--JAVA SCRIPT FROM HERE-->

  <script>let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
}</script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>