<?php 

    session_start();
    session_destroy();
    unset($_SESSION['id']);
    header("location:./Login/index.php");

?>