<?php 
    session_start();
    
    unset($_SESSION['id']);
    unset($_SESSION['userName']);
    unset($_SESSION['email']);

    header('Location: index.php');
?>
