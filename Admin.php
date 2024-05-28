<?php
	include 'php\Connection.php';


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Css/Adminpage/AdminDuplicate.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/83786b8894.js" crossorigin="anonymous"></script>
	<title>Admin Page</title>
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
		<!-- OUTSIDE BUTTON -->
		<div class="Container">

			<button onclick="tenants()" class="link-btn Tenants"> <i class="fa-solid fa-users"> Tenants  </i></button>
			<button onclick="openRes()" class="link-btn Residence"><i class="fa-solid fa-building-wheat"> Residence </i></button>

		</div>
	</main>

	<!-- SECTION: DIALOGS -->

	<section class="Dialogs">	
		<!-- DIALOG FOR TENANTS -->
		<dialog id="Tenants">
		<table class="Table-Tenant">
		
			<thead>
				<tr>
					<caption>TENANTS</caption>
					<button onclick="closeModal()" id="Close-BTN"><i class="fa-solid fa-xmark"></i></button>
				</tr>
				<tr>
					<th>Tenant ID</th>
					<th>Tenants</th>
					<th>Age</th>
					<th>Contact no</th>
					<th>Address</th>
					<th>Email</th>
					<th>Building ID</th>
					<th>Operation</th>
			
				</tr>
			</thead>

			<tbody>
				<?php

					$sql = "Select * FROM tenants";
					$rs = mysqli_query($conn,$sql);

					if($rs){
						while ($row = mysqli_fetch_assoc($rs)) {
							// code...
							$ID = $row['ID'];
							$Tenant = $row['Tenant'];
							$Age = $row['Age'];
							$ContactNo = $row['ContactNo'];
							$Address = $row['Address'];
							$Email = $row['Email'];
							$BuildID = $row['BuildingID'];

							echo 
							"
							<tr>
								<td> ".$ID." </td>
								<td> ".$Tenant." </td>
								<td> ".$Age." </td>
								<td> ".$ContactNo." </td>
								<td> ".$Address." </td>
								<td> ".$Email." </td>
								<td> ".$BuildID." </td>
								<td>
								<a href='AdminUpdate.php?updateid=".$ID."' class='TBL-btn update'><i class='fa-solid fa-pen-to-square'></i></a>
								 <a href='AdminPrint.php?emailid=".$ID."&BuildID=".$BuildID."' class='TBL-btn email'><i class='fa-solid fa-print'></i></a>
								<a href='AdminDelete.php?deleteid=".$ID."' class='TBL-btn delete'><i class='fa-solid fa-user-minus'></i></a>
								</td>
							</tr>

							";
						}
					}

				?>

			</tbody>

			</table>
		</dialog>
		<!-- DIALOG FOR RESIDENCE -->
		<dialog id="res">
			<button onclick="closeBuilding()" id="Close-BTN"><i class="fa-solid fa-xmark"></i></button>
       <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-items">
                        <input type="text" name="Building" placeholder="Building name" required>
                    </div>              

                    <div class="form-items">
                        <input type="text" name="Price" placeholder="Price" required>
                    </div>              

                    <div class="form-items">
                        <input type="radio" name="Status" value="Rent" required> <span>Rent</span>
                        <input type="radio" name="Status" value="Sale" required> <span>Sale</span>
                    </div>              
             

                    <div class="form-items">
                        <input type="number" name="Floor" placeholder="Floor" min="1" max="4" required>
                    </div>                  

                    <div class="form-items">
                        <input type="number" name="Bedding" placeholder="Bedroom" min="1" max="7" required>
                    </div>              

                    <div class="form-items">
                        <input type="number" name="Bathroom" placeholder="Bathroom" min="1" max="4" required>
                    </div>              

                    <div class="form-items">
                        <input type="text" name="Landscape" placeholder="Landscape" required>
                    </div>              

                    <div class="form-items">
                        <input type="file" name="image" required>
                    </div>              

                    <div class="form-items">
                        <button name="SubmitBTN" value="add" type="submit">Add building</button>
                    </div>

                    <!-- CONNECTION: WITH PHP -->
                    <?php

                    	if(isset($_POST['SubmitBTN'])){
                    		if($_POST['SubmitBTN'] == "add"){
                    			add($conn);
                    		}
                    	}

                    	function add($conn){
                    		$Bbuilding = $_POST['Building'];
                    		$BPrice = $_POST['Price'];
                    		$BStatus = $_POST['Status'];
                    		$BBedrooms = $_POST['Bedding'];
                    		$BFloor = $_POST['Floor'];
                    		$BBathroom = $_POST['Bathroom'];
                    		$BLandscape = $_POST['Landscape'];
                    		$Filename =$_FILES['image']["name"];
                    		$Tmpname =$_FILES['image']["tmp_name"];
                    		$Newfile = uniqid() . "-" .$Filename;
                    		$Uploadpath ='Images/' . $Newfile;
                    		move_uploaded_file($Tmpname, $Uploadpath);

                    		$sql = "INSERT INTO building(building,price,status,Bedroom,floor,bathroom,landscape,Image) VALUES ('$Bbuilding','$BPrice','$BStatus','$BBedrooms','$BFloor','$BBathroom','$BLandscape','$Newfile')";
                    		mysqli_query($conn,$sql);

                    		echo "<script>alert('Building sucessfully added!') </script>";
                    	}
                    ?>
                </div>
            </form> 
		</dialog>
	</section>


	<section class="For_Residence">
		<section class="tbl-wrapper">
			<table>
							<tr>

								<th> Building ID </th>
								<th> Building </th>
								<th> Price </th>
								<th> Status </th>
								<th> Bedroom </th>
								<th> Floor </th>
								<th> Bathroom </th>
								<th> Landscape </th>
								<th> Image </th>

							</tr>				
			<?php
			
				$sql = "SELECT * FROM building";
				$rs = mysqli_query($conn,$sql);

				if($rs){
						while ($row = mysqli_fetch_assoc($rs)) {
							// code...
							$BuildingID = $row['BuildingID'];
							$Building = $row['Building'];
							$Price = $row['Price'];
							$Status = $row['Status'];
							$Bedroom = $row['Bedroom'];
							$Floor = $row['Floor'];
							$Bathroom = $row['Bathroom'];
							$Landscape = $row['Landscape'];
							$Image = $row['Image'];
						
							echo 

							"
						

							<tr>
								<td> ".$BuildingID." </td>
								<td> ".$Building." </td>
								<td> ".$Price." </td>
								<td> ".$Status." </td>
								<td> ".$Bedroom." </td>
								<td> ".$Floor." </td>
								<td> ".$Bathroom." </td>
								<td> ".$Landscape." </td>
								<td> ".$Image." </td>
								<td>		<a href='Delete_Residence.php?DELbuildingID=".$BuildingID."' class='TBL-btn delete'>Delete Residence</i></a> </td>
							</tr>

							";
						}
					}
			
			?>
			</table>
		</section>	

	
	</section>


<!-- FOOTER  -->
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

	<!-- FOR JS:CALLER -->
	<script type="text/javascript" src="Js\AdminJs.js"></script>
</body>
</html>



