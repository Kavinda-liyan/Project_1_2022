<?php
session_start();
$mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli)); 
 
if(isset($_POST['newssubmit'])){
//image path to uploaded image
$target = "../Images/News/".basename($_FILES['cover']['name']); 
        
$topic = $_POST['topic'];
$msg = ($_POST['msg']);
$cover = $_FILES['cover']['name'];

$topic = $mysqli->real_escape_string($topic);

$msg = $mysqli->real_escape_string($msg);




        
$news="INSERT INTO promotion(topic, msg, cover) VALUES ('$topic','$msg','$cover')";


$newsright = mysqli_query($mysqli,$news);
   
        if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && $newsright==true)
        {
    
          $_SESSION['news'] = "New Promotion Ad added to your website!";
          $_SESSION['ntype'] = "alert-success";
  
          header("location:../Dashboard.php#promo");
    
            
        }
        else
        {
          $_SESSION['news'] = "Cant add new Promotion Ad!";
          $_SESSION['ntype'] = "alert-danger";
  
          header("location:../Dashboard.php#promo");
    
           
        }

     }
?>