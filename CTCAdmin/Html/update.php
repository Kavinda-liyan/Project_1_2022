<?php

session_start();

$mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 

 
    if(isset($_POST['update']))
    
    {
//image path to uploaded image
$target = "../upload/".basename($_FILES['cover']['name']); 



$pid = $_POST['item_id'];        
$name = $_POST['name'];
$sdiscription = $_POST['sdiscription'];
$price = $_POST['price'];
$dprice = $_POST['dprice'];
$quantity = $_POST['quantity'];
$cover = $_FILES['cover']['name'];


$publisher = $mysqli->real_escape_string($publisher);
        
$sql= "UPDATE itemproducts SET names='$name',  sdiscription='$sdiscription', price='$price',dprice='$dprice', quantity='$quantity', cover='$cover'";

                                                                                
        $right = $mysqli->query($sql);
   
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && ($right==true))
        {
    
            $_SESSION['message'] = "Item Has Been Updated!";
            $_SESSION['type'] = "alert-success";
    
            header("location:updatebooks.php");
        }
        else
        {
            $_SESSION['message'] = "Cant Update Item!Try Again!";
            $_SESSION['type'] = "alert-danger";
    
            header("location:updatebooks.php");
        }

    }
?>