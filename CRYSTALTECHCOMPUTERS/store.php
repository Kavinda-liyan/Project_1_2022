<?php
include('header.php');
require './PHP/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/store.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

  <!--Page layout-->
  <section>
    <div class="container-fluid">
      <div class="row">
        <!--SIDE BAR-->
        <div class="col-lg-3 col-md-4 pull-left">
          <div class="sbar">
            <!--Side Bar Categories-->
            <div class="card mb-3" style="background-color: rgba(255, 255, 255, 0.125);">


              <h3 class="justify-content-center text-light text-center " style=" font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold;">CATEGORIES</h3>
              <hr style="color: rgb(255, 255, 255);">
              <ul class="list-group m-3 categories" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">

                <?php
                $category_qry = mysqli_query($dbConnection, 'SELECT * FROM category');
                while ($row = mysqli_fetch_assoc($category_qry)) {
                  echo '<li class="list-group-item list-group-item-dark" onclick="create(' . $row['cat_id'] . ')"><span class="p-2">' . $row['category'] . '</span></button></li>';
                }
                ?>
                <!-- <button class="nav-link ">
                  <li class="list-group-item list-group-item-dark" onclick="create(15)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop icons" viewBox="0 0 16 16">
                      <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                    </svg> <span class="p-2">STORE</span>
                </button>
                </li>
                <button class="nav-link " onclick="create(15)">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop icons" viewBox="0 0 16 16">
                      <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                    </svg><span class="p-2">LAPTOPS</span>
                </button>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pc icons" viewBox="0 0 16 16">
                      <path d="M5 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H5Zm.5 14a.5.5 0 1 1 0 1 .5.5 0 0 1 0-1Zm2 0a.5.5 0 1 1 0 1 .5.5 0 0 1 0-1ZM5 1.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5ZM5.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1Z" />
                    </svg><span class="p-2">DESKTOPS</span>
                </a>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop icons" viewBox="0 0 16 16">
                      <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                    </svg><span class="p-2">GAMING LAPTOPS</span>
                </a>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-motherboard icons" viewBox="0 0 16 16">
                      <path d="M11.5 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5Zm2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5Zm-10 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM5 3a1 1 0 0 0-1 1h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3Zm0 1h3v3H5V4Zm6.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2Z" />
                      <path d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm1 11a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v11Z" />
                    </svg> <span class="p-2">MAIN BOARDS</span>
                </a>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-memory icons" viewBox="0 0 16 16">
                      <path d="M1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.586a1 1 0 0 0 .707-.293l.353-.353a.5.5 0 0 1 .708 0l.353.353a1 1 0 0 0 .707.293H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1Zm.5 1h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm5 0h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm4.5.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4ZM2 10v2H1v-2h1Zm2 0v2H3v-2h1Zm2 0v2H5v-2h1Zm3 0v2H8v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Z" />
                    </svg><span class="p-2">RANDOM ACCESS MEMORYS</span>
                </a>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-memory icons" viewBox="0 0 16 16">
                      <path d="M1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.586a1 1 0 0 0 .707-.293l.353-.353a.5.5 0 0 1 .708 0l.353.353a1 1 0 0 0 .707.293H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1Zm.5 1h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm5 0h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5Zm4.5.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-4ZM2 10v2H1v-2h1Zm2 0v2H3v-2h1Zm2 0v2H5v-2h1Zm3 0v2H8v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Zm2 0v2h-1v-2h1Z" />
                    </svg><span class="p-2">VIDEO GRAPHIC CARDS</span>
                </a>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-display icons" viewBox="0 0 16 16">
                      <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z" />
                    </svg><span class="p-2">MONITORS</span>
                </a>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-keyboard icons" viewBox="0 0 16 16">
                      <path d="M14 5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h12zM2 4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H2z" />
                      <path d="M13 10.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm0-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5 0A.25.25 0 0 1 8.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 8 8.75v-.5zm2 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5a.25.25 0 0 1-.25-.25v-.5zm1 2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5-2A.25.25 0 0 1 6.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 6 8.75v-.5zm-2 0A.25.25 0 0 1 4.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 4 8.75v-.5zm-2 0A.25.25 0 0 1 2.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 8.75v-.5zm11-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0A.25.25 0 0 1 9.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 9 6.75v-.5zm-2 0A.25.25 0 0 1 7.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 7 6.75v-.5zm-2 0A.25.25 0 0 1 5.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 5 6.75v-.5zm-3 0A.25.25 0 0 1 2.25 6h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5A.25.25 0 0 1 2 6.75v-.5zm0 4a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm2 0a.25.25 0 0 1 .25-.25h5.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-5.5a.25.25 0 0 1-.25-.25v-.5z" />
                    </svg><span class="p-2">KEYBOARDS & MOUSE</span>
                </a>
                </li>
                <a href="#" class="nav-link ">
                  <li class="list-group-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection icons" viewBox="0 0 16 16">
                      <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z" />
                    </svg><span class="p-2">OTHER ACCESSORIES</span>
                  </li>
                </a> -->

              </ul>
              <hr style="color: rgb(255, 255, 255);">
            </div>
            <!--Side Bar Brands-->
            <div class="card mb-3" style="background-color: rgba(255, 255, 255, 0.125);">

              <h3 class="justify-content-center text-light text-center " style=" font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold;">TOP BRANDS</h3>
              <hr style="color: rgb(255, 255, 255);">
              <ul class="list-group m-3 categories" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
                <a href="store.php?brand=MSI" class="nav-link ">
                  <li class="list-group-item list-group-item"><img src="Images/Brand icons/icon msi.png" width="40"><span class="p-2 brands ">MSI</span></li>
                </a>
                <a href="store.php?brand=ASUS" class="nav-link ">
                  <li class="list-group-item list-group-item"><img src="Images/Brand icons/icon asus.png" width="40"><span class="p-2 brands">ASUS</span></li>
                </a>
                <a href="store.php?brand=DELL" class="nav-link ">
                  <li class="list-group-item list-group-item"><img src="Images/Brand icons/icon dell.png" width="40"><span class="p-2 brands">DELL</span></li>
                </a>
                <a href="store.php?brand=LENOVO" class="nav-link ">
                  <li class="list-group-item list-group-item"><img src="Images/Brand icons/icon lenovo.png" width="40"><span class="p-2 brands">LENOVO</span></li>
                </a>
                <a href="store.php?brand=ACER" class="nav-link ">
                  <li class="list-group-item list-group-item"><img src="Images/Brand icons/icon acer.png" width="40"><span class="p-2 brands">ACER</span></li>
                </a>
                <a href="store.php?brand=HP" class="nav-link ">
                  <li class="list-group-item list-group-item"><img src="Images/Brand icons/icon hp.png" width="40"><span class="p-2 brands">HP</span></li>
                </a>
              </ul>
              <hr style="color: rgb(255, 255, 255);">

            </div>
          </div>
        </div>
        <!--CARDS-->
        
        <div class="col-lg-9 col-md-8 pull-left">
        
          <div class="Product-Sort" style="background-color: rgba(255, 255, 255, 0.125); border-radius: 0.2rem;">
            <div class="row">
              <div class="col-md-4 pull-left">
              <h1 class="text-light px-2" style="font-weight: bold;">SHOP</h1>

              </div>
              <div class="col-md-4 pull-right">
                <div class="popularity p-2">
                  <select name="popularity" id="popularity" class="form-control" style="font-weight: bold;">
                    <option value="pop">Sort by Popularity</option>
                    <option value="hightolow">Price High to Low</option>
                    <option value="lowtohigh">Price Low to High</option>

                  </select>
                </div>

              </div>
              <div class="col-md-4 pull-right">
                <div class="popularity p-2">
                <div class="input-group">
                <!-- seaqrch -->
                
                <input type="search" id="name" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" id="submit"  class="btn btn-outline-primary" onclick="javascript:window.location='store.php?name='+document.getElementById('name').value">search</button>
                <!-- <?php
                

// Instantiate DB & connect 

if(isset($_GET['name']))
{

   $name = $_GET['name'];

   $search = "SELECT * FROM itemproducts WHERE names LIKE '%$name%' OR brand LIKE '%$name%'";

   $squery = mysqli_query($dbConnection,$search);

   $book_rows= mysqli_num_rows($squery);

   if($book_rows > 0)
   {

    echo '<center><div class="d-flex justify-content-center" id="bookcard">';
   
      //fetch cover images from database  
      while ($row = mysqli_fetch_array($squery)) 
      {
  
                    echo '<div class="card">
                            <img src="http://localhost/ctcadmin/images/news/' . $row['cover'] . '" alt="' . $row['names'] . '" class="card-img-top" height="250"/>
                            <div class="card-body">
                              <h5 class="card-title">' . $row['names'] . '</h5>
                              <p class="card-text">' . substr($row['sdiscription'], 0, 20) . '</p>
                              <a href="./productdetail.php?id=' . $row['item_id'] . '" class="btn btn-primary">View</a>
                            </div>
                          </div>';
                   
      
   } 
   echo'</center></div>';
  
   }
   else
   {
       echo ' <center><font color="#ffff99"><h3><i class="fa fa-certificate"></i> &nbsp;Product Not Found!</h3></font></center>';
   }
}

?> -->
          
  
  
</div>
                    


                  </div>
                  

                </div>

              </div>
            </div>

          
          <?php


          ?>

          <section id="cart">
            <div class="container">
              <div class="row text-lg-center text-md-center py-2 ">


                <div class="row">

                  <?php


                  $product_sql_qry = '';

                  if (isset($_GET['categoryId'])) {
                    $product_sql_qry = 'SELECT * FROM itemproducts where category = ' . $_GET['categoryId'] . '';
                  } else if (isset($_GET['brand'])) {
                    $product_sql_qry = 'SELECT * FROM itemproducts where brand = "' . $_GET['brand'] . '"';
                  } else {
                    $product_sql_qry = 'SELECT * FROM itemproducts';
                  }


                  $product_qry = mysqli_query($dbConnection, $product_sql_qry);

                  while ($row = mysqli_fetch_assoc($product_qry)) {
                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-3 p-2">';
                    echo '<div class="card">
                            <img src="http://localhost/ctcadmin/images/news/' . $row['cover'] . '" alt="' . $row['names'] . '" class="card-img-top" height="250"/>
                            <div class="card-body">
                              <h5 class="card-title">' . $row['names'] . '</h5>
                              <p class="card-text">' . substr($row['sdiscription'], 0, 20) . '</p>
                              <a href="./productdetail.php?id=' . $row['item_id'] . '" class="btn btn-primary">View</a>
                            </div>
                          </div>';
                    echo '</div>';
                  }
                  ?>
                  

                </div>

              </div>

            </div>

        </div>
        </div>
  </section>

  </div>
  </div>

  </div>
  </div>
  </section>

  <!--JAVA GRID IMAGES-->

  <!-- Copyright -->
  <div class="text-light text-center p-3 align-baseline" style="background-color: rgba(255, 255, 255, 0.125); font-weight: bold;">
    © 2022 Copyright:
    <a class="text-light" href="#">CRYSTAL TECH COMPUTERS</a>
    | ProjectCconcept
  </div>
  <!-- Copyright -->
  <!--JAVA SCRIPT FROM HERE-->
  <script>
    function create(categoryId) {
      var url = window.location.href;

      if (url.indexOf('?') > -1) {
        var urlArr = url.split('?');
        url = urlArr[0];
      }

      url += `?categoryId=${categoryId}`;

      window.location.href = url;
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>

</html>