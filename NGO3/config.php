<?php




?>
require 'config.php';

if(isset($_POST["submit"])){
	
	$name = $_POST["n"];
$email = $_POST["e"];
$password = $_POST["p"];
$address = $_POST["add"];
$mbile = $_POST["m"];
$duplicate = mysqli_query($conn,"SELECT * FROM donorregistration WHERE name = '$name' OR email = '$email' ");
if(mysqli_num_rows($duplicate)>0){
	echo 
	"<script> alert('Name or email has Already Taken');</script>";
}
else {
	if(password != null){
	$query = "INSERT INTO  donorregistration VALUES('','$name','$email','$password','$address','$mobile')";
	mysqli_query($conn,$query);
	echo 
	"<script> alert('Registration Successful');</script>";
}
else {
	echo 
	"<script> alert('Registration failed');</script>";
}
}
}