<?php 

$conn1= new mysqli('localhost','root','','fos_cheezy_v2_dhaka')or die("Could not connect to mysql".mysqli_error($conn1));
$conn2= new mysqli('localhost','root','','fos_cheezy_v2_dinajpur')or die("Could not connect to mysql".mysqli_error($conn2));
$conn3= new mysqli('localhost','root','','fos_cheezy_v2_barisal')or die("Could not connect to mysql".mysqli_error($conn3));
$conn4= new mysqli('localhost','root','','fos_cheezy_v2_jessore')or die("Could not connect to mysql".mysqli_error($conn4));
