<?php
$dbuser="root";
$dbhost="localhost";
$dbpass="";
$conn=mysqli_connect($dbhost,$dbuser,$dbpass);
if(!$conn){
  die("mysql could not connect" .mysqli_error($conn));
}
// echo "connected successfully";
$sql1="CREATE DATABASE if not exists user_db";
$retval1=mysqli_query($conn,$sql1);
if(!$retval1){
    die("database could not be created" .mysqli_error($conn));
}
// echo "database created successfully";

$sql2="CREATE TABLE if not exists userdetails(
     user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     user_name VARCHAR(20) NOT NULL,
     phone VARCHAR(20) NOT NULL,
     emergency_contacts VARCHAR(150) NOT NULL,
     Blood_grp VARCHAR(20) NOT NULL,
     Vehicle_no VARCHAR(20) NOT NULL)";
mysqli_select_db($conn,"user_db");
$retval2=mysqli_query($conn, $sql2);
if(!$retval2){
    die("could not create table". mysqli_error($conn));
}
// echo "table created successfully";
$user=$_POST['user'];
$phone=$_POST['phone'];
$emergency=$_POST['Emergency'];
$blood=$_POST['grp'];
$vehicle_no=$_POST['vno'];
$sql3="INSERT INTO userdetails(user_name,phone,emergency_contacts,Blood_grp,Vehicle_no) VALUES('$user','$phone','$emergency','$blood','$vehicle_no')";
$retval3=mysqli_query($conn,$sql3);
if(!$retval3){
    die("record not inserted".mysqli_error($conn));
    
}
// echo "record created successfully<br>";
// echo "name: $user<br>
//       pass: $pass";



?>

