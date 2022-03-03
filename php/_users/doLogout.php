<?php
session_start();
if(isset($_SESSION['id'])){
    // se você possui algum cookie relacionado com o login deve ser removido
    // session_destroy();
    unset($_SESSION['id']);
    header("location: ../../");
    exit();
}else{
    echo "<h1>ERRO ao fazer Logout</h1>";
}
?>