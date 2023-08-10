<?php
session_start();
$conn = mysqli_connect("localhost","root");
if($conn){
	//echo"connection done";
	
}
mysqli_select_db($conn,'ngo');

if (isset($_POST['reg_user'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['pass']);
	$address = mysqli_real_escape_string($conn, $_POST['add']);
	$mobile = mysqli_real_escape_string($conn, $_POST['mob']);
	//echo $name;
	$qu = " select * from donorregistration where name='$name'&& password ='$password'";
	$result = mysqli_query($conn, $qu);
	$num = mysqli_num_rows( $result);
	if($num == 1){
		echo"Name already registered";
		
	}
	else{
		echo "registration done";
		$qy = "insert into donorregistration(name , email , password ,address , mobile) values ('$name' , '$email' , '$password' , '$address' , '$mobile') ";
		mysqli_query($conn , $qy);
		header('location:donor_login.php');
	}
	

}
?>
<! Doctype html>  
<html lang="en">  
<head>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <title> Registration Form </title>  
<style> 

body {  
    margin: 50px auto;  
    text-align: center;  
    width: 800px;  
}  
input[type=reset] {  
  border: 3px solid;    
  border-radius: 2px;    
  color: ;    
  display: block;    
  font-size: 1em;    
  font-weight: bold;    
  margin: 1em auto;    
  padding: 1em 4em;    
 position: relative;    
  text-transform: uppercase;    
}    
input[type=reset]::before   
{    
  background: #fff;    
  content: '';    
  position: absolute;    
  z-index: -1;    
}    
input[type=reset]]:hover {    
  color: #1A33FF;    
}    
input {  
    border: 2px solid #ccc;  
    font-size: 1rem;  
    font-weight: 100;  
    font-family: 'Lato';  
    padding: 10px;  
}  
form {  
    margin: 20px auto;  
    padding: 20px;  
    border: 5px solid #ccc;  
    background: grey;  
}  
h1 {  
    font-family: sans-serif;  
  display: block;  
  font-size: 2rem;  
  font-weight: bold;  
  text-align: center;  
  letter-spacing: 3px;  
  color: black;  
    text-transform: uppercase;  
}  
    input {    
  border: 3px solid;    
  border-radius: 2px;    
  color: black ;    
  display: block;    
  font-size: 1em;    
  font-weight: bold;    
  margin: 1em auto;    
  padding: 1em 4em;    
 position: relative;    
  text-transform: uppercase;    
}    
input[type=submit]::before   
{    
  background: #fff;    
  content: '';    
  position: absolute;    
  z-index: -1; 
align: center;  
text-align: center;
  
} 


input[type=submit]:hover {    
  color : #1A33FF ;    
}  


</style>  
</head>  
<body>  
<h1> DONOR Registration Form </h1>  
<form method="post" action ="donor_registration.php" >  
<table>  
 <tr>  
    <td colspan="2"> <?php echo @$msg; ?> </td>  
 </tr>  
 <label for="name">Name</label>
  <input type="text" name="name"  required ><br>
   <label for="email">Email</label>
  <input type="text" name="email"  required ><br>
   <label for="password">Password</label>
  <input type="password" name="pass"  required ><br>
   <label for="address">Address</label>
  <input type="text" name="add"  required ><br>
   <label for="mobile">Mobile Number</label>
  <input type="text" name="mob"  required ><br>
 
 
  
  <tr>  
    <td colspan="2" >  
    <input type ="submit" href = "donor_login.php"name="reg_user" value="Register"/  required >  
    <input type="reset" value="Reset"/>  
    </td>  
  </tr>  

</table>  
</form>  
</body>  
</html>  
/*
<?php  
extract($_POST);  
if(isset($save))  
{  
$dob=$yy."-".$mm."--".$dd;  

$img=$_FILES['pic']['name'];  
if($return)  
{  
$msg="<font color='red'>".ucfirst($e)." already exists choose another email </font>";  
}  
else  
{  
$msg= "<font color='blue'> your data saved </font>";  
}  
}  
?>  */