<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '12345', 'sipsewana') or die(mysqli_error($mysqli)); 

//DELETE PENDING REQUEST

if( isset($_GET['book']))
{

    $pbook = $_GET['book'];
    $pmem = $_GET['mem'];

    $delmemp = "DELETE FROM issuebook WHERE memberid ='$pmem' AND bookid='$pbook' AND issuedate IS NULL";

    $delrightp = $mysqli->query($delmemp);

    if($delrightp==true)
    {
        $_SESSION['msg'] = "Book Reservation Request Cancelled!";
        $_SESSION['ptype'] = "alert-danger";

        header("location:pending.php");

        }
    else
        {
            $_SESSION['msg'] = "ERROR!";
            $_SESSION['ptype'] = "alert-danger";

            header("location:pending.php");
           
        }
}