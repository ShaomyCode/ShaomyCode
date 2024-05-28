<?php
	include 'php/Connection.php';

	if(isset($_GET['DELbuildingID'])){

		$ResID = $_GET['DELbuildingID'];

		$sql = "DELETE FROM Building WHERE BuildingID =$ResID";
		$rs = mysqli_query($conn,$sql);

		echo "Successfully deleted";
		$conn->close();
		header('location:Admin.php');
	}
?>
