<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header('location: cliente_login.php');
        exit;
    }
    else 
    {
        header('location: index.php'); 
    }

?>