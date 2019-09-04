<?php
    //nom e acuerdo para que esta
    //session_start();
    
    define('DB_HOST', "localhost");
    define('DB_USER', "pilar");
    define('DB_PASS', "pilar");
    define('DB_DB', "ejemplo_charla");
    
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DB);
    mysqli_set_charset($db, "utf8");
