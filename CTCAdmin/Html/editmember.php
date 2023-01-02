<?php


$mysqli = new mysqli('localhost' , 'root' , '12345' , 'sipsewana') or die(mysqli_error($mysqli)); 

 
if(isset($_POST['regbtn']))

{


$id = $_POST['id'];           
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$pno = $_POST['pno'];
$password = $_POST['password'];
        
$sql= "UPDATE user_register SET fullname='$name', address='$address', email='$email', phonenumber='$pno', password='$password' WHERE `mem-id`='$id'";

                                                                                
        $right = $mysqli->query($sql);
   
        if($right==true)
        {
            header("location:member.php");
        }
        else
        {
        echo "Cant update member account";
        }

    }
?>