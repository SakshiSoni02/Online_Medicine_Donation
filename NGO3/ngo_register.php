<?php
session_start();
$conn = mysqli_connect("localhost","root");
if($conn){
	//echo"connection done";
	
}
mysqli_select_db($conn,'ngo');
//$sdb = mysqli_select_db($conn,'ngo');
//echo "12345";
if (isset($_POST['run_user'])) {
	//echo "whl";
	$name = mysqli_real_escape_string($conn, $_POST['ngoname']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$address = mysqli_real_escape_string($conn, $_POST['location']);
	$password = mysqli_real_escape_string($conn, $_POST['pass']);
    $repass = mysqli_real_escape_string($conn, $_POST['repass']);
 // echo $name;
//  echo"name";
	if ($name != "" && $password != "" && $repass != ""){
		echo"xyzzzz";
    // make sure the two passwords match
    if ($password === $repass){
        // make sure the password meets the min strength requirements
        if ( strlen($password) >= 5 && strpbrk($password, "!#$.,:;()") != false ){
            // next code block
        }
        else
            $error_msg = 'Your password is not strong enough. Please use another.';
    }
    else
        $error_msg = 'Your passwords did not match.';
}
else
    $error_msg = 'Please fill out all required fields.';

  $qu = " select * from ngoregistration where ngoname='$name'&& password ='$password'";
	$result = mysqli_query($conn, $qu);
	$num = mysqli_num_rows( $result);
	echo"num";
	echo $num;
	if($num == 1){
		echo"Name already registered";
		
	}
	else{
		$qy = "insert into ngoregistration(ngoname , contact ,email , location, password , repass) values ('$name' , '$contact' , '$email' , '$address' , '$password','$repass') ";
		mysqli_query($conn , $qy);
		header('location:ngo_login.php');
	}

	/*if ($password != $repass) {
	array_push($errors, "The two passwords do not match");
   }
	$user_check_query = "SELECT * FROM ngoregistration WHERE ngoname='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);


*/
}
 
?>
<Html>  
<head>   
<title>  
Registration Page  
</title> 
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="adminstyle.css"> 
</head>  
<style> 

body {  
    margin: 50px auto;  
    text-align: center;  
    width: 800px;  
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
input[type='button'] {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

input[type=submit]:hover {    
  color : #1A33FF ;    
}  

</style>
<body bgcolor="grey">  '
<br>  
<br>  

             
<form id="admin_form" method="post" action ="ngo_register.php" >  
<table> 

  <h1 style="color:black;">  NGO REGISTRATION FORM</h1>
<label> NGO Name </label>         
<input type="text" name="ngoname" size="15" required /> 
<br> <br>  
<label>
Contact :  
</label>  
  
<input type="Contact" name="contact" size="10"  required /> <br> <br>  
<label> 
Email:  
</label> 
<input type="email" id="email" name="email" required /> <br>    
<br> <br>  
 <label> 
 
Location : 
</label> 
<br>  <input name="location" >

</input>
<br> <br>  
  
 <label>
Password:  
 </label>
<input type="Password" id="pass" name="pass"  required /> <br>   
<br>  
 <label>
Confirm password: 
 </label> 
<input type="Password" id="repass" name="repass"  required /> <br> <br>  
<input type ="submit" name="run_user" value="Register"/> 

 <!--<a href="ngo_register.php"><input type="button" text-align:center name="run_user"  value="Submit"/> </a>-->
  </div>
</form>  
</body>  
</html>  