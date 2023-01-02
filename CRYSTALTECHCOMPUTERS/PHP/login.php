<?php
session_start();
?>

<?php
if (isset($_POST["email"]) && isset($_POST["userpassword"])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "crystaltech";

    //create connection...
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $select_user = "SELECT * FROM userreg WHERE email='$email'";
    $run_qry = mysqli_query($conn, $select_user);
    if (mysqli_num_rows($run_qry) > 0) {
        while ($row = mysqli_fetch_assoc($run_qry)) {
            $hashedPassword = md5($userpassword);
            if ($hashedPassword == $row['userpassword']) {
                echo '<script>alert("Login Successfully!")</script>';
                $_SESSION['id'] = $row['id'];
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['email'] = $row['email'];
                
                header('location:index.php');
            } else {
                echo '<script>alert("Incorrect Email or Password!")</script>';
            }
        }
    } else {
        echo '<script>alert("Incorrect Email or Password!")</script>';
    }
}
?>