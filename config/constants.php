<?php

    //start session
    session_start();


    //create constants to store non repeating values
    define('SITEURL', 'http://localhost:8080/Business-Mind/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'business-mind');
    
    //execute query and save data in the database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>