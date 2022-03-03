<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('location: new_login.php');
        exit;
    }
    else 
    {
        header('location: ../../pages/inicio_for_users.php'); 
    }
?>