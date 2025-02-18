<?php


$host="localhost"; // Host name
$user="root"; // Mysql username
$pass=""; // Mysql password
$db="login";

//Create a connection
$conn=new mysqli($host,$user,$pass,$db);

//Check connection
if($conn->connect_error){
    echo "Database connection failed".$conn->connect_eroor;
}