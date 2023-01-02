<!-- <html>
    <head>
        
    </head>
    <body>
        <h1>Book</h1>
    </body>
</html> -->
<?php
// session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli));  

//DELETE SECTION

if( isset($_GET['del']))
{

    $pid = $_GET['del'];

    $delitem = "DELETE FROM itemproducts WHERE item_id='$pid'";

    $delright = $mysqli->query($delitem);

    if($delright==true)
    {

        header("location:allitems.php?bookdel=1");

        }
    else
        {
            $_SESSION['message'] = "ERROR!";
            $_SESSION['type'] = "alert-danger";

            header("location:allitems.php");
           
        }
}