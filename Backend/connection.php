<?php

//Database Connection
define('HOST', 'localhost');
define('DB_USER_NAME', 'root');
define('DB_USER_PASSWORD', '');
define('DB_NAME', 'database');

//$db_connection = mysqli_connect('localhost', 'root', '', 'wesbite'); 
//this is another way to do database connectio :D

$db_connection = mysqli_connect(HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
if (!$db_connection) 
{
    echo "Connection Error ";
}
?>