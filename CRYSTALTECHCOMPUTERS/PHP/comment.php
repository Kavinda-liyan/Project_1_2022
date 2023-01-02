<?php
require './PHP/dbcon.php';

if (isset($_POST['commbtn'])) {
  if(!isset($_SESSION['userName'])){
    $name = 'Anonymous';
  }else{
    $name = $_SESSION['userName'];
  }
  $comment = $_POST['msg'];
  $cmtdate = date('Y-m-d H:i:s');
  if (!empty($name) || !empty($email)){
  $query = "INSERT INTO comments(member,comment,comdate) VALUE('$name','$comment',' $cmtdate')";

  $query_run = mysqli_query($dbConnection, $query);

  if ($query_run) {
    echo '<script>alert("Comment added!")</script>';
  } else {
    echo '<script>alert("Error occured!")</script>';
  }
}
else{
  echo '<script>alert("Error occured!")</script>';
}
}
