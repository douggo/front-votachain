<?php
    require_once("usuario-session.php");

    logout();
    echo "<script> location.replace('index.php'); </script>";
    
    die();