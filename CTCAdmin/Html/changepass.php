
 <?php
session_start();

$mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 

if(isset($_POST['reset'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    
    
    $sql = "SELECT * FROM adminlogin  WHERE  username = '$username'";
    $result = $mysqli->query($sql);
    $count = mysqli_num_rows($result);

     if ($count == 0)
        { 
        
        $_SESSION['message'] = "You can't change Username..!";
        $_SESSION['type'] = "alert-danger";
        header('location:changepassword.php');
       
        }
    
        elseif($password == $conpassword)
        {
            
        $mysqli->query("UPDATE adminlogin SET pass='$password' WHERE username = 'admin'") or die($mysqli->error);
        
        $_SESSION['message'] = "You have successfully changed your password..!";
        $_SESSION['type'] = "alert-success";
        header('location:changepassword.php');
        }
       else
        {
           
        $_SESSION['message'] = "Passwords do not match..!";
        $_SESSION['type'] = "alert-danger";
        header('location:changepassword.php');
       
        }
     
    }
?>