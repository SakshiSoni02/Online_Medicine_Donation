
<?php
 session_start();
$conn = mysqli_connect("localhost","root");
if($conn){
	echo"";
	
}
mysqli_select_db($conn,'ngo');
echo "";
if (isset($_POST['sub'])) {
	echo"name";
	$name = mysqli_real_escape_string($conn, $_POST['ngoname']);
	
	$password = mysqli_real_escape_string($conn, $_POST['pass']);
echo $name;
 $sql ="SELECT * FROM ngoregistration WHERE ngoname = '$name' and password = '$password'";
// echo"xyzzz";
 
//$row=mysqli_num_rows()
$query=mysqli_query($conn,$sql);
$row =mysqli_num_rows($query);
echo"done";
 if($row==1)
    {
    
        echo "<script>
        alert('login done') ;
        </script>";
        header('location:ngoafterlogin.php');
    
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
            <h1>NGO Login</h1>
            <form id="ngo_form" action="ngo_login.php" method="post">
                <label for="name" >Name</label>
                <input type="text" id="name" placeholder="Full name" name="ngoname"  minlength="2" maxlength="100"/>
                   <label for="password" >Password</label>
                         <input type="password" id="password" placeholder="Enter Password" name="pass"   />
                             <br><br>
                 
				     <input type="submit" name="sub" value="Login">
		         	</form>	
				
				<form id="ngo_form" action="ngo_register.php" method="post">
				<input type="submit" name="submitiid" value="Register ">
                          </form>
						  <br>
	                      <form id="ngo_form" action="index.php" method="post">
				
				<input type="submit" name="submitiiid" href="index.php" value=" back to home	">
                
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
