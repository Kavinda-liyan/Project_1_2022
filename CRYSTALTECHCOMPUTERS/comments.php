



<?php

$mysqli = new mysqli('localhost' , 'root' , '' , 'crystaltech') or die(mysqli_error($mysqli));

if (isset($_POST['addfaq'])) {
  $userid = $_POST['user'];
  $question = $_POST['question'];
  $itemid = $_POST['itemid'];
  $addfaq = "INSERT INTO faq(itemid,userid,msg) VALUES('$itemid','$userid','$question')";
  $right = $mysqli -> query($addfaq);
  if( $right==true)
        {
        header("location:success.html");
        }
        else
        {
       header("location:error.html");
        }
  
}  


?>