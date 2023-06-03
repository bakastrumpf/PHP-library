<?php
define("SERVER_NAME", "localhost:3306");
define("DB_NAME", "LIBRARY");
define("DB_USER", "USERNAME");
define("DB_PASS", "PASSWORD");

$conn = mysqli_connect(SERVER_NAME, DB_USER, DB_PASS, DB_NAME)
    or die("Error: " . mysqli_connect_error());
