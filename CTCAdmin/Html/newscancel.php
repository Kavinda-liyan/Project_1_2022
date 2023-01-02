<?php

$mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli)); 

//DELETE SECTION

if( isset($_GET['newsid']))
{

    $promoid = $_GET['newsid'];

    $delnews = "DELETE FROM promotion WHERE promoid ='$promoid'";

    $delright = $mysqli->query($delnews);

    if($delright==true)
    {
        header("location:../Dashboard.php?delnews=1");

        }
    else
        {
            header("location:../Dashboard.php?error#issue_data");
           
        }
}