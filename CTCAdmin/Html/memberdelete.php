<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli)); 

//DELETE SECTION

if( isset($_GET['delete']))
{

    $memid = $_GET['delete'];

    $delmem = "DELETE FROM userreg WHERE 'id' ='$memid'";

    $delright = $mysqli->query($delmem);

    if($delright==true)
    {

        header("location:member.php?memdel=1");

        }
    else
        {
            $_SESSION['message'] = "ERROR!";
            $_SESSION['type'] = "alert-danger";

            header("location:member.php");
           
        }
}