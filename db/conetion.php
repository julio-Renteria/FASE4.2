<?php


$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "db_sistema_sena";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Error connecting " . mysqli_connect_error());
}



//OTRA

//Conexion a BD
