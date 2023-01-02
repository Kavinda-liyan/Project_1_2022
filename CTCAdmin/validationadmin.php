<?php
session_start();

$mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 

if(isset($_POST['logbtn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sqladmin = "SELECT * FROM adminlogin  WHERE  username = '$username' AND pass = '$password'";
    $resultadmin = $mysqli->query($sqladmin);
    $admincount = mysqli_num_rows($resultadmin);
    $adminrow = mysqli_fetch_row($resultadmin);

    if ($admincount == 1) {

        $_SESSION['LoggedUser'] = $adminrow[0];

       // $admin = $_SESSION['LoggedUser'];

        header("location: Dashboard.php");
    } else {
        
        header('location: html/loginerror.html');
        
    }
    
}
?>




