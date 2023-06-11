<?php

$host="localhost";
$username="root";
$password="";
$db="your_phone_shop";
$mysql=new mysqli($host,$username,$password,$db);
if ($mysql->connect_error)
die("error while connecting to database");

?>