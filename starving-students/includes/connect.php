<?php
    define("DB_SERVER", "localhost"); // V: These lines are defining the server, user, password and name of the database inorder to form a connection
    define("DB_USER", "vcannings");
    define("DB_PASS", "JNMTX20+mjk=");
    define("DB_NAME", "vcannings"); 

    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME); // V: The connection varriable has been set to use these values

    if(mysqli_connect_errno()) { // V: If the connection does not work, terminate the connection 
        die("Database connection failed: " . 
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
        );
    }
?>