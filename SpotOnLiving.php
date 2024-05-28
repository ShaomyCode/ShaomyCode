<?php
	include 'php/Connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SpotOnLiving</title>
	<!-- CSS LINK -->
	<link rel="stylesheet" type="text/css" href="Css\SpotOnLivingv1.css">
	<!-- LINK FOR FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
	<!-- EMBEDED WITH FONTAWESOME -->
   <script src="https://kit.fontawesome.com/83786b8894.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- HEADER -->
	<header>
		
		<nav class="Navigator-Head">
			<ul>
				<li><p class="Active"><i class="fa-solid fa-house-chimney"></i> Home</p></li>
				<li><a href="Aboutus.php"><i class="fa-solid fa-people-line"></i> About Us</a></li>
				<li> <h3><i class="fa-solid fa-building-user"></i>SpotOnLiving <h3> </li>
				<li><a href="Zonepage.php"><i class="fa-solid fa-list"></i> Zones</a></li>
				<li><a href="ContactUs.php"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
			</ul>
		</nav>
	</header>

	<main>
	<!-- SECTION SUB-CONTENT 1 -->
	<section class="Sub-Content Searching">
		<div class="Search">
			<h3> Houses, Loans, Space </h3>
			<input type="search" name="Search" placeholder="Search here">
		</div>
		<div class="Sub-Content Banner">
		</div>
	</section>
	<!-- SECTION: SUB-CONTENT 2 -->
	<section class="Sub-Content Recommendation">
		
		<div class="Home-Recommendation">
			<h3>Get Home Recommendation </h3>
			<p> Sign in for a more personalized experience. </p>
			
			<button onclick="LoginOpen()" class="LoginBTN" > Login</button>

			<script type="text/javascript">
				
			</script>
		</div>

		<div class="ImageViewer Image1">
		</div>
		<div class="ImageViewer Image2">
		</div>
		<div class="ImageViewer Image3">
		</div>				
	</section>
	<!-- SECTION: SUB-CONTENT 3 -->
	<section class="Sub-Content Option">
		<div class="Card">
			<div class="Image ISell"> </div>
			<p> No matter what path you take to sell your home, we can help you navigate a successful sale. </p>
			<a href="#"> See your options </a>
		</div>

		<div class="Card">
			<div class="Image Rent"> </div>
			<p> We’re creating a seamless online experience – from shopping on the largest rental network, to applying, to paying rent. </p>
			<a href="#"> Find rentals </a>

		</div>

		<div class="Card">
			<div class="Image Buy"> </div>
			<p> Find your place with an immersive photo experience and the most listings, including things you won’t find anywhere else. </p>
			<a href="#"> Browse home </a>
		</div>				
	</section>
	</main>
	<?php

		if(isset($_POST['LoginBTN'])){
			$username = $_POST['Username'];
			$password = $_POST['Password'];

			$sql = "SELECT * FROM admin WHERE username = '$username' AND password ='$password'";
			$rs = mysqli_query($conn,$sql);

			if($rs){

				while ($row =mysqli_fetch_assoc($rs)) {
						
						if($row['password'] == $password && $row['username'] == $username ){
						echo "<script>alert('login sucess: username or password')</script>";
							   header('location: admin.php');

						}

				}
				echo "<script>alert('login failed: username or password')</script>";

	    	}
		}
	?>
	<!-- DIALOG: LOGIN -->
	<dialog id="DialogLogin">
		<button onclick="LoginClose()" class="Close"> <i class="fa-solid fa-xmark"></i></button>

		<div class="Container">

		<form method="POST">
			
			<div class="form-container">
		
						<div class='form-input'>
							<input type='text' placeholder='Username' name='Username' class='formnput' required />
						</div>

						<div class='form-input'>
							<input type='password' placeholder='password' name='Password' class='formnput' required />
						</div>

						<div class='form-input'>
							<button type='submit' name='LoginBTN' id='submitBTN' required>Login</button>
						</div>		
			</div>
		</form>
	</div>
	</dialog>

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
	<script type="text/javascript" src="Js/SpotOnLiving.js"></script>
</body>
</html>