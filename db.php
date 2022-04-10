<?php

session_start();

$dbConn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php-crud'
);

// if(isset($dbConn)) {
//     echo "Connected to the database";
// }
?>