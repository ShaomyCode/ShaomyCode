<?php
	include 'php/Connection.php';

	if(isset($_GET['deleteid'])){

		$TenantID = $_GET['deleteid'];

		$sql = "DELETE FROM tenants WHERE ID =$TenantID";
		$rs = mysqli_query($conn,$sql);

		echo "Successfully deleted";
		header('location:Admin.php');
	}
?>
