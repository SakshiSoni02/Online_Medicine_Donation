<?php
session_start();
$conn = mysqli_connect("localhost","root");
if($conn){
	//echo"connection done";
	
}
mysqli_select_db($conn,'ngo');

if (isset($_POST['reg_user'])) {
	$name  = mysqli_real_escape_string($conn, $_POST['name']);
	$location  = mysqli_real_escape_string($conn, $_POST['location']);
	$med  = mysqli_real_escape_string($conn, $_POST['med']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

	//echo $name;
	
		$qy = "insert into donatedmedtongo (name ,location,med,quantity)  values ('$name','$location','$med','$quantity')";
		mysqli_query($conn , $qy);
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
select {
   -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;       /* Remove default arrow */
     /* Add custom arrow */
	 position: relative;
  font-family: Arial;
  background-color: white;
}
select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

select-items div:hover, .same-as-selected {
  background-color: grey;
}
</style>  
</head>  
<body>  
<h1> NGO DONATION </h1>  
<form method="post"  action ="donatedtongo.php">  
<table>  
 <tr>  
    <td colspan="2"> <?php echo @$msg; ?> </td>  
 </tr>  
   

	<tr> 
    <td> <b> NGO Name </b> </td>  
    <td>  <input type="name" name="name"/ placeholder=" Enter name" > </td>  
  </tr>
  <tr> 
    <td> <b> Location </b> </td>
    <td>  <input type="text" name="location"/ placeholder=" Enter medicines" > </td> 
  </tr>
 <tr> 
    <td> <b> Medicines Donated </b> </td>  
    <td>  <input type="text" name="med"/ placeholder=" Enter medicines" > </td> 
  </tr>   	
	<tr> 
    <td> <b>Quantity of Medicine </b> </td>  
    <td>  <input type="quantity" name="quantity"/ placeholder=" Enter Quantity" > </td>  
  </tr>   
  
  <tr>  
   
  <tr>  
    <td colspan="2" align="center">  
    <input type ="submit" name="reg_user" value="Submit"/>
    <input type="reset" value="Reset"/>  
    </td>  
  </tr>  
</table>  
</form>  
</body>  
</html>  

?>  