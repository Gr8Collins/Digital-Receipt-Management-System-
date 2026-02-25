<?php
// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'great_collins_technologies';

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}