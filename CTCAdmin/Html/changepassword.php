<!------Adding collect.php------->
<?php require_once 'changepass.php'; ?>

<html>
<head>
<title>CTC Login Form</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/aos.css">
     <link rel="stylesheet" type="text/css" href="../Css/Resetpass.css">
    </head>
<body>


          <?php
           if (isset($_SESSION['message']))
           { 
            echo'<div class="alert ';echo ($_SESSION['type']) ;echo '" role="alert">
            <center>';?>  <?php echo ($_SESSION['message']) ;?>
            <?php unset ($_SESSION['message']); ?> <?php echo '</center></div>';

           }?>


     <div class="loginbox">
    <img src="../Images/loginlogo.png" id="login" class="avatar">

         <h1>Reset Your Password</h1>
         <form action="changepass.php" method="post">

             <input type="text" name="username" placeholder="Enter Username" required>

             <input type="password" name="password" placeholder="Enter New Password" required>
             <input type="password" name="conpassword" placeholder="Confirm Password" required>
             
             
             <input type="submit" name="reset" value="Reset Password">
             <a href="../index.html">Go back to Login Page</a><br>
                        
                    
         </form>
    </div>  
</body>

</html>