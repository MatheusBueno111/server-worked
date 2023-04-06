<?php 

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "worked";

$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
