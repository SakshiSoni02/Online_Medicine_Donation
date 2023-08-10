
<?php
session_start();
$conn = mysqli_connect("localhost","root");

mysqli_select_db($conn,'ngo');
//$con=mysqli_select_db($conn,'ngo');
if($conn){
	//echo"connection done";
	if (isset($_POST['save'])) {
		echo"clicked";
	$name =  mysqli_real_escape_string($conn, $_POST['username']);
	$email =  mysqli_real_escape_string($conn, $_POST['email']);
	$medname = mysqli_real_escape_string($conn, $_POST['med']);
	$quantity = mysqli_real_escape_string($conn, $_POST['qun']);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$expdate = mysqli_real_escape_string($conn, $_POST['date']);
	//$image = mysqli_real_escape_string($conn, $_POST['pic']);
	
	//print_r($_FILES['pic']);
	$img_loc = $_FILES['pic']['tmp_name'];
	$img_name =  $_FILES['pic']['name'];
	$uname=$_POST['med'];
	$img_ext = pathinfo($img_name , PATHINFO_EXTENSION );
	
	$img_des = "uplodedfiles/".$uname.".".$img_ext;
	
	move_uploaded_file($img_loc ,$img_des );
	
	$qurey = "INSERT INTO `donatedmed`( `username`, `email`, `medname`, `quantity`, `type`, `expdate`, `image`) VALUES ('$name ','$email','$medname','$quantity','$type','$expdate','$img_des')";

  mysqli_query($conn,$qurey);
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
input[type=radio] { width:20px; }  
input[type=checkbox]{ width:20px; }  
* {  
    padding: 0;  
    margin: 0;  
    box-sizing: border-box;  
}  
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
  
} 

input[type=submit]:hover {    
  color: #1A33FF;    
}    
.select-dropdown,
.select-dropdown * {
	margin: 0;
	padding: 0;
	position: relative;
	box-sizing: border-box;
}
.select-dropdown {
	position: relative;
	background-color: #E6E6E6;
	border-radius: 4px;
}
.select-dropdown select {
	font-size: 1rem;
	font-weight: normal;
	max-width: 100%;
	padding: 8px 24px 8px 10px;
	border: none;
	background-color: transparent;
		-webkit-appearance: none;
		-moz-appearance: none;
	appearance: none;
}
.select-dropdown select:active, .select-dropdown select:focus {
	outline: none;
	box-shadow: none;
}
.select-dropdown:after {
	content: "";
	position: absolute;
	top: 50%;
	right: 8px;
	width: 0;
	height: 0;
	margin-top: -2px;
	border-top: 5px solid #aaa;
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
}


</style>  
</head>  
<body>  
<h1> MEDICINE DONATION FORM </h1>  
<form id="admin_form" method="post" enctype="multipart/form-data" action ="donate_medicine.php">  
<table>  
 <tr>  
    <td colspan="2"> <?php echo @$msg; ?> </td>  
 </tr> 
  
   <tr> 
    <td> <b>Enter your Name </b> </td>  
    <td>  <input type="text" name="username" placeholder="Enter Name" required  > </td>  
  </tr> 
   <tr> 
    <td> <b>Enter your Email </b> </td>  
    <td>  <input type="email" name="email" placeholder=" Enter Email" required > </td>  
  </tr> 
   <tr> 
    <td> <b> Medicines You Want To Donate </b> </td>  
    <td>  <input type="text" name="med"/ placeholder=" Enter medicines" required > </td>  
  </tr>    
  <tr> 
    <td> <b>Quantity of Medicine </b> </td>  
    <td>  <input type="text" name="qun"/ placeholder=" Enter Quantity" required> </td>  
  </tr> 
  
<tr> 
    <td> <b>Type of Medicine</b> </td>  <div class="select-dropdown"style="width:200px;">
    <td> 
	<select name="type" required >
	<option value = "slect type">Select</opyion>
	<option value = "tablet">Tablet</opyion>
	<option value = "slect injection">Injection</opyion>
	<option value = "syrup">Syrup</opyion>
	<option value = "capsule">Capsule</opyion>
	<option value = "drops">Drops</opyion>
	<option value = "inhaler">Inhaler</opyion>

</select>


	</td>  </div>
</tr>
<tr>
    <td> <b>Expiry Date of medicine </b> </td>  
    <td>  <input type="Date" name="date"/ placeholder=" Enter date" required > </td>  

  </tr>     
  <tr>  
    <td> <b> Select Medicine Images</b> </td>  
    <td> <input type="file" name="pic"/ required > </td>  
  </tr>  
 
  <tr>
  <h2>Ready to donate?</h2>
  <h4>Medicines you want to donate must meet the following criteria</h4>
 <input type="checkbox" id="vehicle1" name="vehicle1" value="1" required>
<label for="vehicle1"> Is not a controlled substance</label><br>
<input type="checkbox" id="vehicle2" name="vehicle2" value="2" required>
<label for="vehicle2"> Will not expire in at least 1 month</label><br>
<input type="checkbox" id="vehicle3" name="vehicle3" value="3" required>
<label for="vehicle3"> Is in sealed packaging</label><br>
<input type="checkbox" id="vehicle4" name="vehicle4" value="4" required>
<label for="vehicle3"> Image uploaded should be clear</label><br>

   </tr>
  <tr>  
    <td colspan="2" align="center">  
    <input type ="submit" name="save" value="Donate"/>  
    <input type="reset" value="Reset"/>  
    </td>  
  </tr>  
</table>  
</form>  
</body>  
</html>  
