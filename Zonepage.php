<?php
		include 'php\Connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Css\Zonepage\Zonepagev1.css">
	<script src="https://kit.fontawesome.com/83786b8894.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
	<title>SpotOnLiving: Zone</title>
</head>
<body>
<!-- HEADER -->
	<header>
		<nav class="Navigator-Head">
			<ul>
					<li> <h3><i class="fa-solid fa-building-user"></i>SpotOnLiving <h3> </li>
				<li><a href="SpotOnLiving.php" class="Nav-Select"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
				<li><a href="Aboutus.php"><i class="fa-solid fa-people-line"></i> About Us</a></li>
				<li><p><i class="fa-solid fa-list"></i> Zones</p></li>
				<li><a href="ContactUs.php"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
			</ul>
		</nav>
	</header>

	<section class="Modals">

		<?php

			if(isset($_POST['submit'])){
				$fullname = $_POST['fullname'];
				$age = $_POST['age'];
				$ContactNo = $_POST['contactNo'];
				$Address = $_POST['address'];
				$Email = $_POST['Email'];
				$BuildingID = $_POST['BuildingID'];

				$sql = "INSERT INTO tenants(tenant,Age,ContactNo,Address,Email,BuildingID) VALUES ('$fullname','$age','$ContactNo','$Address','$Email','$BuildingID')";
				$rs = mysqli_query($conn,$sql);

				if($rs){
					echo "<script> alert('Quatation successfully saved!')</script>";
				}
			}
		?>

		<dialog id="Fillmeup">
			<button onclick="fillupclose()" class="Close"> <i class="fa-solid fa-xmark"></i></button>
			<form class="form" method="POST">
				<div class="form-group">
		    	  	
		    	  	<div class="form-item">
		    		  	<input type="text"  placeholder="Fullname" id="Fullname" name="fullname" required>
		    		</div>

		    		<div class="form-item">
		     			<input type="number" placeholder="Age" id="Age" name="age" required>
		     		</div>

		     		<div class="form-item">
		     			<input type="number" placeholder="Contact number"id="ContactNo" name="contactNo" required>
		     		</div>

		     		<div class="form-item">
		 		   	 <input type="text" placeholder="Current Address" id="Address" name="address" required>
		 			</div>

		 			<div class="form-item">
		      			<input type="email" placeholder="Email Address" id="Email" name="Email" required>	      
		      		</div>

				    <div class="form-item">
				    	<?php
				    	$sql = "SELECT COUNT(BuildingID) AS total FROM Building";
				    	$rs = mysqli_query($conn,$sql);

				    	$row = $rs ->fetch_assoc();
				    	$total = $row["total"];
				    	  echo " <input type='number' placeholder='Building no' value='Building No' max='".$total."'  min='1' name='BuildingID' required> ";
				      	?>
				  	</div>

		      		<input type="submit" value="Confirm" id="ConfirmBTN" name="submit">
		  		</div>
	   		 </form>
		</dialog>

	</section>

	<!-- CONTENT -->
	<main>
		<div class='MainBox'>
				<?php

		// CONNECTION
		$sql = "SELECT * FROM building";
		$rs = mysqli_query($conn,$sql);
		if($rs){
			while ($row = mysqli_fetch_assoc($rs)) {
				
				$BImage = 'Images/'.$row['Image'];
				$BBuildingID = $row['BuildingID'];
				$BBuilding = $row['Building'];
				$BPrice = $row['Price'];
				$BStatus = $row['Status'];
				$BBedroom = $row['Bedroom'];
				$BFloor = $row['Floor'];
				$BBathroom = $row['Bathroom'];
				$BLandscape = $row['Landscape'];

				// echo "  ";
					//CONTENT HERE 
				echo "
						<div class='Image-Box'>
							
							<div class='Images'> 
								<img src='".$BImage."'> 
							</div>
							
							<div class='Details'>
								<p>Building ID: ".$BBuildingID."</p>
								<p>Building: ".$BBuilding."</p>
								<p>Price: ".$BPrice."</p>
								<p>Status: ".$BStatus."</p>
								<p>Bedroom: ".$BBedroom."</p>
								<p>Floor: ".$BFloor."</p>
								<p>Bathroom: ".$BBathroom."</p>
								<p>Landscape: ".$BLandscape."</p>
								<button type='submit' name='Status' onclick='fillup()' id='getItem'><i class=fa-solid fa-shop'> Check out</i></button>
							</div>
						</div>
				";

			}
		}
		?>
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
	<script type="text/javascript" src="Js\Zonepage.js"></script>
</body>
</html>