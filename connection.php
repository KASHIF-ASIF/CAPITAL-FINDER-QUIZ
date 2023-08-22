<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "country_capital_quiz"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
    ?>