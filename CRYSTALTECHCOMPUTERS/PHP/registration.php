<?php
$userName = $_POST['userName'];
$useraddress = $_POST['useraddress'];
$phoneNumber = $_POST['phoneNumber'];
$nicNumber = $_POST['nicNumber'];
$email = $_POST['email'];
$cemail = $_POST['cemail'];
$userpassword = md5($_POST['userpassword']) ;
$cpassword = md5($_POST['cpassword']);
if (!empty($userName) || !empty($address) || !empty($phoneNumber) || !empty($nicNumber) || !empty($email) || !empty($cemail)  || !empty($password) || !empty($cpassword))
{
    $host ="localhost";
    $dbUsername ="root";
    $dbPassword ="";
    $dbname ="crystaltech";

    //create connection...
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()){
        die('Connection Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    

    }
    elseif($_POST['email']!=$_POST['cemail']){
        echo '<script>alert("Email confirmation does not match")</script>';
        die();

    }
    elseif($_POST['userpassword']!=$_POST['cpassword']){
        echo '<script>alert("Password confirmation does not match")</script>';
        die();

    }
    elseif($_POST['userpassword']<8){
        echo '<script>alert("Password should be 8 characters")</script>';

    }
    elseif($_POST['email']==$_POST['cemail'] && $_POST['userpassword']==$_POST['cpassword'])
    {
        $SELECT = "SELECT email From userreg Where email= ? Limit 1";
        $INSERT = "INSERT Into userreg (userName, useraddress, phoneNumber , nicNumber, email, cemail, userpassword, cpassword ) values(?, ?, ?, ?, ?, ?, ?, ?)";

        //prepare

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();
            $stmt =$conn->prepare($INSERT);
            $stmt->bind_param("ssisssss",$userName, $useraddress, $phoneNumber, $nicNumber, $email, $cemail, $userpassword, $cpassword);
            $stmt->execute();
            echo '<script>alert("Registerd Successfully!")</script>';
            
            header('location: ../login.php');
        }
        else{
            echo '<script>alert("Already registerd using this email")</script>';
            header('location: ../login.php');
        }
        $stmt->close();
        $conn->close();

    }
    else{
        echo '<script>alert("Password or Email did not matching")</script>';
        die();
    }

}
else{
    echo '<script>alert("All field are required")</script>';
        die();
}
?>