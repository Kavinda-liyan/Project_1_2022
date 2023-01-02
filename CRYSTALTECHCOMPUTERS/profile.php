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
  <link rel="stylesheet" href="style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
  
</head>
<body class="bg-dark">
    <div class="container">
        <div class="card my-5" style="width: 50%; margin: auto;">
            <img src="images/avatar.jpg" class="rounded mx-auto d-block" style="width: 150px;"
            alt="Avatar" />
            <h2 class="text-center"></h2>
            <?php
           
         
              $userid = $_SESSION['id'];
            
            
      $run_qry = mysqli_query($dbConnection, "SELECT * FROM userreg WHERE id = $userid");
      while ($row = mysqli_fetch_assoc($run_qry)) {
        
        
        
          echo'  <hr style="color:red; height:5px;">';
           echo ' <h4 class="text-center" style="color:#21A7FF ;"> <i class="fa fa-user px-2" style="color:#21A7FF ;"> </i>User Profile</h4>
            <hr style="color:red; height:5px;">
            
              <div class="container" >
              <div class="row mx-2 my-2 py-2">
                <div class="col-lg-4">
                  <h5 class="mb-0">User Name</h5>
                </div>
                <div class="col-lg-8">
                  <p class="text-muted mb-0">'.$row['userName'].'</p>
                </div>
             </div>

             <div class="row mx-2 my-2 py-2 ">
                <div class="col-lg-4">
                  <h5 class="mb-0">Address</h5>
                </div>
                <div class="col-lg-8">
                  <p class="text-muted mb-0">'.$row['useraddress'].'</p>
                </div>
             </div>
             <div class="row mx-2 my-2 py-2 ">
                <div class="col-lg-4">
                  <h5 class="mb-0">Phone Number</h5>
                </div>
                <div class="col-lg-8">
                  <p class="text-muted mb-0">'.$row['phoneNumber'].'</p>
                </div>
             </div>
             <div class="row mx-2 my-2 py-2 ">
                <div class="col-lg-4">
                  <h5 class="mb-0">NIC Number</h5>
                </div>
                <div class="col-lg-8">
                  <p class="text-muted mb-0">'.$row['nicNumber'].'</p>
                </div>
             </div>
             <div class="row mx-2 my-2 py-2 ">
                <div class="col-lg-4">
                  <h5 class="mb-0">Email</h5>
                </div>
                <div class="col-lg-8">
                  <p class="text-muted mb-0">'.$row['email'].'</p>
                </div>
             </div>';
      }
      ?>
             <div class="row  ">
                <div class="container">
                  <button type="submit" style="width: 100%;" class="btn btn-danger my-2">Edit Profile</button>
                </div>
                
             </div>
             <hr style="color:red; height:5px;">
            <h4 class="text-center " style="color: green;"> <i class="fa-solid fa-circle-dot px-2"></i>Active Status</h4>
            <hr style="color:red; height:5px;">
             <div class="row mx-2 my-2 py-2 ">
                <div class="col-lg-4">
                  <h5 class="mb-0">Status</h5>
                </div>
                <div class="col-lg-8">
                  <p class="text-muted mb-0"><i class="fa fa-toggle-on" style="color: green;"> </i> Active</p>
                </div>
             </div>
             
             <hr style="color:red; height:5px;">
            <h4 class="text-center">Shopping Cart</h4>
            <hr style="color:red; height:5px;">
             <div class="row mx-2 my-2 py-2 ">
                <div class="col-lg-4">
                  <h5 class="mb-0">Cart</h5>
                </div>
                <div class="col-lg-8">
                <a href="cart.php" class="btn btn-primary  active" role="button" aria-pressed="true" style="width:100%;">View</a>


                </div>
             </div>
              </div>
                      
              
            </row>
        </div>
        
           
  <!--Main layout-->
  <main style="margin-top: 58px;">
    <div class="container pt-4"></div>
  </main>
  <!--Main layout-->
            </div>
        </section>
    </div>

    
</body>
</html>