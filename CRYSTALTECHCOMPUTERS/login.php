<?php include('./PHP/login.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-dark text-dark container " style="font-weight: bold;  ">
    <section class="" style="background-color: #00000043;" >
        <div class=" bg-dark py-5  h-100">
          <div class=" ">
            <div class="row ">
              <div class="card shadow-2-strong align-items-center col-12 col-lg-4" style="border-radius: 1rem; background-color: white; border-color:red;">
                <div class="card-body  p-5 text-center">
      
                    <h3 class="mb-5" style="font-weight: bold;"><span style="color: red">C</span>RYSTAL <span style="color: red">T</span>ECH <span style="color: red">C</span>OMPUTERS</h3>
                    <h3 class="mb-5">Sign in</h3>
                <form action="login.php" method="post" name="login-form">
                  <div class="form-outline mb-4">
                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email"/>
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="userpassword"/>
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div>
      
                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                  </div>
      
                  <button class="btn btn-danger btn-lg btn-block" type="submit">Login</button>
                </form>
                  <hr class="my-4 bg-dark">
      
                  <a href="Registrationf.html" style="text-decoration: none;"><p class="text-dark">New User? Register Here</p></a>
                  
      
                </div>
              </div>
              <div class="col-12 col-lg-8">
                <img src="images/loging.jpg" width="100%" height="100%" style="border-radius: 15px; opacity: 0.5;  border-color:red;" >


              </div>
            </div>
          </div>
        </div>
      </section>
</body>

    
    <!--JAVA SCRIPT FROM HERE-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>