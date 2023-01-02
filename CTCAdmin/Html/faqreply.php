<?php
$mysqli = new mysqli('localhost', 'root', '', 'crystaltech') or die(mysqli_error($mysqli)); 

if (isset($_POST['addreply'])) {
  $cid = $_POST['cid'];
  $reply = $_POST['reply'];
  $answer = "UPDATE faq SET reply='$reply' WHERE cid ='$cid'";
  $right = $mysqli -> query($answer);
  if($right==true)
        {
        header("location:success.html");
        }
        else
        {
       header("location:error.html");
        }
  
}  ?>