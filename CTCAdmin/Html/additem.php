<?php

$mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 
 
if(isset($_POST['uploadbtn']))
    
{
//image path to uploaded image
$target = "../upload/".basename($_FILES['cover']['name']); 
//$aim = "../upload/".basename($_FILES['fimage']['name']); 
//$way = "../upload/".basename($_FILES['simage']['name']); 

    $brand = $_POST['brand'];    
$category = $_POST['category'];
$name = $_POST['name'];
$sdiscription = $_POST['sdiscription'];
$price = $_POST['price'];
$dprice = $_POST['dprice'];
$quantity = $_POST['quantity'];
$cover = $_FILES['cover']['name'];
//$fimage = $_FILES['fimage']['name'];
//$simage = $_FILES['simage']['name'];

//Get current date 

//$currentdate = date('Y-m-d');

$quantity = $mysqli->real_escape_string($quantity);

        
 $sql= "INSERT INTO itemproducts (brand,category, names, sdiscription, price, dprice, quantity, cover) VALUES ('$brand','$category','$name','$sdiscription','$price','$dprice','$quantity','$cover')";
 $right = $mysqli -> query($sql);
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && ($right==true))
        {
        header("location:success.html");
        }
        else
        {
       header("location:error.html");
        }

    }

    if(isset($_POST['addI']))
    {
        $cat = $_POST['cat'];

        $add_cat = "INSERT INTO category(category) VALUES ('$cat')";
        $add_query = mysqli_query($mysqli, $add_cat);

        if($add_query)
        {
            header("location:additems.php?add");

        }
        else
        {
            header("location:error.html");
        }

        
    }
    if(isset($_POST['addB']))
    {
        $bar = $_POST['bra'];

        $add_bar = "INSERT INTO brand(brandname) VALUES ('$bar')";
        $add_query = mysqli_query($mysqli, $add_bar);

        if($add_query)
        {
            header("location:additems.php?add");

        }
        else
        {
            header("location:error.html");
        }

    }
?>