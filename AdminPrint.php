<?php
	include 'php/Connection.php';
	$TenantID = $_GET['emailid'];
	if(isset($_POST['Update'])){

		// GET FROM FORM
		$name = $_POST['Name'];
		$Age = $_POST['Age'];
		$ContactNo = $_POST['ContactNo'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
		$BuildingNo = $_POST['BuildingNo'];

		$sql = "UPDATE Tenants SET Tenant='$name',Age='$Age',ContactNo='$ContactNo',Address='$Address',Email = '$Email',BuildingID='$BuildingNo' WHERE Id='$TenantID' ";
		$rs = mysqli_query($conn,$sql);

		echo "Successfully updated";
		header('location:Admin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
   	<script src="https://kit.fontawesome.com/83786b8894.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="Css/Adminpage/Adminupdate.css">
	<title>Updating</title>

</head>
<body>
<!-- HEADER -->
	<header>
		
		<nav class="Navigator-Head">
			<ul>
				 <?php 

						$sql = "SELECT admin FROM admin";
						$rs = mysqli_query($conn,$sql);
						
						if($rs){
							while($row = mysqli_fetch_assoc($rs)){
								echo "<li><p class='Nav-Select'><i class='fa-solid fa-user-tie'></i>".$row['admin']."</p></li>";
							}
						}
				 
				 ?> 
				<li><a href="Aboutus.php"><i class="fa-solid fa-people-line"></i> About Us</a></li>
				<li> <h3><i class="fa-solid fa-building-user"></i>SpotOnLiving <h3> </li>
				<li><a href="Zonepage.php"><i class="fa-solid fa-list"></i> Zones</a></li>
				<li><a href="ContactUs.php"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
			</ul>
		</nav>
	</header>	
	<main>
		<div class="Main-Container">
				<!-- APPLIED PHP -->
				<div class="Display">
					<?php
					$TenantID = $_GET['emailid'];	
					$sql = "SELECT * FROM Tenants WHERE Id = $TenantID";
					$rs = mysqli_query($conn,$sql);

					if($rs){
						while ($row = mysqli_fetch_assoc($rs)) {
							// code...

							$Tenant = $row['Tenant'];
							$Age = $row['Age'];
							$ContactNo = $row['ContactNo'];
							$Address = $row['Address'];
							$Email = $row['Email'];
							$BuildID = $row['BuildingID'];

								echo "
								<form>
									<label> SELECTED TENANT </label>
									<div class='form-items'>
										<input type='text' 	 disabled placeholder=".$Tenant." />
									</div>

									<div class='form-items'>
										<input type='number' disabled placeholder=".$Age." />
									</div>
									
									<div class='form-items'>
										<input type='number' disabled placeholder=".$ContactNo." />
									</div>		

									<div class='form-items'>
										<input type='text' disabled placeholder=".$Address." />
									</div>

									<div class='form-items'>
										<input type='email'  disabled placeholder=".$Email." />
									</div>

									<div class='form-items'>
										<input type='number' disabled placeholder=".$BuildID." />
									</div>
									<div class='form-items'>
							
									</div>				
								</form>	
								";


						}

					}	
					?>
				</div>

				<div class="Display">

					<?php

						$bldgID = $_GET['BuildID'];
							$sqlBldg = "SELECT * FROM building WHERE BuildingID = $bldgID";
							$rsBldg = mysqli_query($conn,$sqlBldg);		
							if($rsBldg){
								while ($row = mysqli_fetch_assoc($rsBldg)){
									$Bname = $row['Building'];
									$Bprice = $row['Price'];
									$Bstatus = $row['Status'];
									$Bbedroom = $row['Bedroom'];
									$Bfloor = $row['Floor'];
									$Bbathroom = $row['Bathroom'];
									$Blandscape = $row['Landscape'];

									echo "
									<form>
									<label> BUILDING INFO </label>
									<div class='form-items'>
										<input type='text' 	 disabled placeholder=".$Bname." />
									</div>

									<div class='form-items'>
										<input type='number' disabled placeholder=".$Bprice." />
									</div>
									
									<div class='form-items'>
										<input type='number' disabled placeholder=".$Bstatus." />
									</div>		

									<div class='form-items'>
										<input type='text' disabled placeholder=".$Bbedroom." />
									</div>

									<div class='form-items'>
										<input type='email'  disabled placeholder=".$Bfloor." />
									</div>

									<div class='form-items'>
										<input type='number' disabled placeholder=".$Bbathroom." />
									</div>

									<div class='form-items'>
										<input type='number' disabled placeholder=".$Blandscape." />
									</div>				
									</form>	
									";
								}
							}
					?>

				</div>

				<div class="Fillup">
					<form method="POST">

						<div class="form-items">
							<input type="submit" value="Send to Email" id="Update-BTN" name="Gmail" />
						</div>				
					</form>	
				</div>		
		</div>		
	</main>
<!-- FOOTER -->
	<footer>
		<section class="letUsKnow">
			<p>SpotOnLiving Group is committed to ensuring digital accessibility for individuals with disabilities. We are continuously working to improve the accessibility of our web experience for everyone, and we welcome feedback and accommodation requests. If you wish to report an issue or seek an accommodation, please</p>
			<a href="#">let us know </a>
		</section>

		<nav class="FooterNav">
			<ul>
				
				<li><a href="#"> <i class="fa-brands fa-facebook"> </i></a></li>
				<li><a href="#"> <i class="fa-brands fa-whatsapp"></i></a> </li>
				<li><h3><i class="fa-solid fa-building-user"></i> SpotOnLiving</h3></li>
				<li><a href="#"> <i class="fa-brands fa-instagram"></i></a> </li>
				<li><a href="#"> <i class="fa-brands fa-x-twitter"></i></a> </li>
			</ul>

		</nav>
		<div class="Footer-BG"> </div>
	</footer>	
</body>
</html>