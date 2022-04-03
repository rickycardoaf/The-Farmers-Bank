<?php

$dbhost  = "gator3215";
$dbuser  = "hummions_avaloni";
$dbpass  = "SuNmoon123!dayna";
$dbname  = "hummions_loginuser";

//$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("Failed to connect!");
}

// if ($con->connect_error) {
//     die("Connection failed: " . $con->connect_error);
// }else{
// }