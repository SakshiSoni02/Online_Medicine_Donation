<?php
 
$user = 'root';
$password = '';
 $database = 'ngo';
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = "SELECT * FROM donatedmed  ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        <h1>List Of Medicine's Donated</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                
                <th>Donor Name</th>
                <th>Email id</th>
				<th>Med Name</th>
				
				<th>Quantity</th>
				<th>Type</th>
				<th>Expiry Date</th>
				<th>Images</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
             
                <td><?php echo $rows['username'];?></td>
				<td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['medname'];?></td>
				<td><?php echo $rows['quantity'];?></td>
				<td><?php echo $rows['type'];?></td>
				<td><?php echo $rows['expdate'];?></td>
			<td><img src="<?php echo $rows['image'];?>" width="100" height="100"> </td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
 
</html>