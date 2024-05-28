<?php
	
	// Get form data
	
	if(isset($_POST['submit']))
	{
	$fullname = $_POST['fullname'];
	$age = $_POST['age'];
	$contactNo = $_POST['contactNo'];
	$address = $_POST['address'];
	$email = $_POST['Email'];
	$buildingID = $_POST['BuildingID'];

	// Database connection settings
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'realstatesystem';

	// FOR BUILDINGS
	

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql = "INSERT INTO tenants(tenant, age, contactNo, address, email, BuildingID) VALUES ('$fullname','$age','$contactNo','$address','$email','$buildingID')";
	mysqli_query($conn, $sql);
	// MESSAGE
	
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.Quatation{
			font-size: 25px;
		width: 40%;
		display: block;
		box-shadow: 5px 5px 5px black;
		text-align: center;
		border:1px solid black;
		padding:40px;
		border-radius: 20px;
		position: relative;
		margin: auto;
		transform: translateY(40vh);
		}
	</style>
	<title></title>
</head>
<body>
	<p class="Quatation">
	<?php 
		echo "Quatation successfully submitted!";
	?>
	</p>
		<script src="Js/Directhome.js" type="text/javascript" language="javascript"></script>
		<body onload='setInterval("DirectHome()",2000)'></body>
</body>
</html>

