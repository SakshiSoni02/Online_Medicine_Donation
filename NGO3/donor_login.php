<?php
   session_start();
$conn = mysqli_connect("localhost","root");
if($conn){
	echo"";
	
}
mysqli_select_db($conn,'ngo');

if (isset($_POST['submiteed'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	
	$password = mysqli_real_escape_string($conn, $_POST['pass']);

 $sql ="SELECT * FROM donorregistration WHERE name = '$name' and password = '$password'";
//$row=mysqli_num_rows()
$query=mysqli_query($conn,$sql);
$row =mysqli_num_rows($query);
echo $row;
 if($row==1)
    {
    
        echo "<script>
        alert('login done') ;
        </script>";
        header('location: donorafterlogin.php');
    
    }
    else
     {
        echo "<script>
        alert('failed') ;
        </script>";
            
    
    }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
  <div class="main-container">
        <div class="container"  data-aos="zoom-in-up" data-aos-duration="1000"
        data-aos-easing="ease-in-out">
            <h1>DONOR Login</h1>
            <form id="ngo_form" action="donor_login.php" method="post">
                <label for="name" >Name</label>
                <input type="text" id="name" placeholder="Full name" name="name"
                required minlength="2" maxlength="100"/>
           <label for="password" >Password</label>
            <input type="password" id="password" placeholder="Enter Password" name="pass"
           required   />
                <br><br>
                 
				<input type="submit" name="submiteed" value="Login">
			</form>	
				<br>
				<form id="ngo_form" action="donor_registration.php" method="post">
				<input type="submit" name="submitid" value="Register ">
                          </form>
						  <br>
	                      <form id="ngo_form" action="index.php" method="post">
				
				<input type="submit" name="submitid" href="index.php" value=" back to home	">
                
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
<script src="adminstyle.js"></script>
</body>
</html>
