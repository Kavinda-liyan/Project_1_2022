<?php
session_start();
//connect db

$mysqli = new mysqli('localhost','root','','crystaltech') or die(mysqli_error($mysqli));

if(isset($_POST['comment']))
{

    $user = $_POST['user'];
    $cmtmsg = $_POST['commsg'];
    $cmtdate = date('Y-m-d H:i:s');

 

        $cmt = "INSERT INTO comments(member,comment,comdate) VALUES ('$user','$cmtmsg','$cmtdate')";
        $cmtresult = mysqli_query($mysqli,$cmt);

        if($cmtresult==true)
        {
            header("location:contact.php#comments");
        }
        else
        {
            $_SESSION['cmsg'] = "Sorry! Send Comment!";
            $_SESSION['ctype'] = "alert-danger";
            header("location:contact.php#comments");
        }
   

}