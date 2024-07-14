<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "skinaesthetic";
$_SESSION['success'] = "";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
