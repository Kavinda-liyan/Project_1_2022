
<?php  

 $mysqli = new mysqli('localhost', 'root', '', 'sipsewana') or die(mysqli_error($mysqli)); 
?>

<!--collect-->

<?php
if(!isset($_SESSION['LoggedInUserId']))
{
  header("location:../index.html?login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="../images/logo1.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRYSTAL TECH COMPUTERS User</title>
  <link rel="stylesheet" href="../style/aboutstyle.css">
  <link rel="stylesheet" href="../style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
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
<!--NAVIGATION FROM HERE-->
<div class="containernavbar">
  <div class="boxnav" style="background-color: rgba(255, 255, 255, 0.125);">
<nav class="navbar navbar-dark navbar-expand-lg  bg-dark bg-opacity-75 " >
  
<a href="#" class="navbar-brand justify-content-center p-3" >CRYSTAL TECH COMPUTERS</a>
  <button class="navbar-toggler m-2" data-toggle="collapse" data-target="#coldow" ><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse justify-content-center"  id="coldow">
  <ul class="navbar-nav fw-bold hovef ">
    <li class="nav-item"></li><a href="#" class="navbar-brand justify-content-center m-2" ><img src="images/logo1.png" height="30px"><span class=" fw-bold " style="color: rgba(255, 255, 255, 0.808);  " > CTC COMMUNITY</span></a></li>
    <li class="nav-item"><a href="index.html" class="nav-link active m-2">HOME </a></li>
    <li class="nav-item"><a href="about.html" class="nav-link m-2">ABOUT US</a></li>
    <li class="nav-item"><a href="services.html" class="nav-link m-2">SERVICES</a></li>
    <li class="nav-item"><a href="store.php" class="nav-link m-2">STORE</a></li>
    <li class="nav-item"><a href="store.php" class="nav-link m-2">ACCOUNT</a></li>
    <li class="nav-item"><a href="login.html"  class="nav-link m-2">USER<img class="ulog p-1" src="images/login.png" width="30px" ></a></li>
    <li class="nav-item"><a href="cart.html"  class="nav-link m-2"><span class="p-1">CART</span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"> 
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/> 
    </svg></a></li>
  </ul>
  <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>

                                        <!----------------hide notification if userlogout  -->
                                        <?php
                    if(isset($_SESSION['LoggedInUserId']))
                     {

                    //connect db
                      $mysqli = new mysqli('localhost', 'root', '', 'sipsewana') or die(mysqli_error($mysqli));

                       $userid =$_SESSION['LoggedInUserId'];
                      

                      //get notfication
                      $notif = "SELECT * FROM notification WHERE memberid = '$userid' ORDER BY notid DESC";
                      $notifquery = mysqli_query($mysqli, $notif);
                      $nm_rows= mysqli_num_rows($notifquery);
                      
                    
                     echo' <li>
                        <a class="btn" href="#" role="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i><span class="badge">'; if($nm_rows>0){echo $nm_rows;} echo'</span></a>

                        <div id="noti" class="dropdown-menu" aria-labelledby="dropdown1">';
        
                      if($nm_rows>0)
                      {
                        while($notifcheck = mysqli_fetch_array($notifquery))
                        {
                        
                         $notdate = $notifcheck['date']; 
                        
                            // <!-------notification msg------------>
                          echo ' <a class="dropdown-item" href="not.php?mem='.$userid.'&date='.$notdate.'">';
                          if($notdate) {
                            $notdate = date("F d, Y, g:i a", strtotime($notdate));
                          } else {
                              $notdate = '';
                          }
                          echo' <small>'; echo $notdate ; echo'</small><br>';
                            echo' '.$notifcheck["msg"].' </a>';

                           
                        
                        }
                      }
                      else
                      {
                        echo '<a class="dropdown-item" href="#">No Notification Found!</a>';
                      }
                    echo'
                      </div>
                     </li>';

                    }?>
                </ul>
  
</div>
</nav>
</div>
</div>
<!--JAVA GRID IMAGES-->

<div class="container m-auto ">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-5 bg-gradient bg-opacity-75 " >
      <img src="images/Cardshop.png" alt="shop" style="width:100%;" class="mx-auto d-block img-fluid rounded-5 opacity-75">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-5 bg-gradient bg-opacity-75">
      <img src="images/Cardcom.png" alt="community" style="width:100% ;" class="mx-auto d-block img-fluid rounded-5 opacity-75">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-5 bg-gradient bg-opacity-75">
      <img src="images/Cardbrand.png" alt="community" style="width:100% ;" class="mx-auto d-block img-fluid rounded-5 opacity-75">
    </div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>