<?php
	include 'php\Connection.php';



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Building</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

   <script src="https://kit.fontawesome.com/83786b8894.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="Css/Adminpage/AdminImage.css">
</head>
<body>

	<!-- HEADER -->
	<header>
		
		<nav class="Navigator-Head">
			<ul>
				<li><p class="Nav-Select"><i class="fa-solid fa-house-chimney"></i> Home</p></li>
				<li><a href="#"><i class="fa-solid fa-people-line"></i> About Us</a></li>
				<li> <h3><i class="fa-solid fa-building-user"></i>SpotOnLiving <h3> </li>
				<li><a href="Zonepage.html"><i class="fa-solid fa-list"></i> Zones</a></li>
				<li><a href="#"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
			</ul>
		</nav>
	</header>

	<main>

		<form>
			<div class="form-group">
				<div class="form-items">
					<input type="text" name="Building" placeholder="Building name">
				</div>				

				<div class="form-items">
					<input type="text" name="Price" placeholder="Price">
				</div>				

				<div class="form-items">
					<input type="radio" name="Status" value="Rent"> <span>Rent</span>
					<input type="radio" name="Status" value="Sale"> <span>Sale</span>
				</div>				

				<div class="form-items">
					<input type="number" name="bedroom" placeholder="Bedroom" min="1" max="10" >
				</div>				

				<div class="form-items">
					<input type="number" name="Floor" placeholder="Floor" min="1" max="4">
				</div>				

				<div class="form-items">
					<input type="number" name="Bathroom" placeholder="Bathroom" min="1" max="4">
				</div>				

				<div class="form-items">
					<input type="text" name="Landscape" placeholder="Landscape">
				</div>				

				<div class="form-items">
					<input type="file" name="image" >
				</div>				

				<div class="form-items">
					<button name="submit" value="add" type="submit">Add</button>
				</div>
			</div>
		</form>


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