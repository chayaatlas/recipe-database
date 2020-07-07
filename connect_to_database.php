<?php

//define constants
DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'my_recipes');

//make the connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) OR die('Could not connect to MYSQL: ' . mysqli_connect_error() );

?>