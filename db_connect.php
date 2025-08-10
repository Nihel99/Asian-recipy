<?php
$host = 'localhost';     
$db   = 'asia'; 
$user = 'root';         
$pass = '';              
$charset = 'utf8';       

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$conn->set_charset($charset)) {
    die("Error loading character set '$charset': " . $conn->error);
}
?>
