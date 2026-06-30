<?php

$host = "RDS-ENDPOINT";
$user = "admin";
$pass = "Admin@12345";
$db   = "companydb";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
 die("Connection Failed");
}

echo "Database Connected Successfully";

?>
