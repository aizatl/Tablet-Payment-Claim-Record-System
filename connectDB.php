<?php

$con=mysqli_connect("localhost", "root", "root", "device_management");
if (mysqli_connect_errno())     //check connection is establish
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 exit;   //terminate the script
 }

 ?>
