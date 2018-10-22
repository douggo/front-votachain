<?php
    require_once("usuario-session.php");

    logout();
    header("Location: index.php");
    
    die();