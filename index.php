<?php
    
// header("location: .\pages\inicio.php")
    
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('location: .\pages\inicio.php');
        exit;
    }
    else 
    {
        header('location: .\pages\inicio_for_users.php'); 
    }
?>
