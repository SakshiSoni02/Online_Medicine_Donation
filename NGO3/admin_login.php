<?php
session_start();
$conn = mysqli_connect("localhost","root");
if($conn){
	//echo"connection done";
	
}
mysqli_select_db($conn,'ngo');

  if(isset($_POST['submit']))
    { 
//echo "name";
        $Name=$_POST['Name'];
        $Password=$_POST['Password'];

 $sql ="SELECT * FROM adminlogin WHERE Name = '$Name' and Password = '$Password'";
 //echo"xyzzz";
 
//$row=mysqli_num_rows()
$query=mysqli_query($conn,$sql);
$row =mysqli_num_rows($query);
//echo"done";
 if($row==1)
    {
    
        echo "<script>
        alert('login done') ;
        </script>";
        header('location:admin.php');
    
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
            <h1>Admin Login</h1>
            <form id="admin_form" action="admin_login.php" method="post">
                <label for="name" >Name</label>
                <input type="text" id="Name" placeholder="Full name" name="Name"
                required minlength="2" maxlength="100"/>
                <label for="password" >Password</label>
                <input type="password" id="Password" placeholder="Enter Password" name="Password"
                required   />
                <br><br>
                <input type="submit" name="submit" value="Log in">
                
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
