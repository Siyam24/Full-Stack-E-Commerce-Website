<?php

session_start();

if((!isset($_SESSION['user_name']))){
   header('location:login_form.php');
}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>All Product-Sham Sports</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/653b53d264.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
		<div class="navber">
			<div class="logo">
				<a href="Index.html"><img src="IMG/sham-sports-high-resolution-logo-color-on-transparent-background.png" width="200px"></a>
			</div>
		
			<nav>
				<ul id="MenuItems">
					<li><a href="Index.html">Home</a></li>
					<li><a href="user_page.php">User Page</a></li>
					<li><a href="login.php">Account</a></li>
					<li><a href="AboutPage.html">About Us</a></li>
				</ul>
			</nav>
			<a href="AddtoCart.html"><img src="IMG/cart.png" width="30px" height="30px"></a>
			<img src="IMG/menu.png" class="menu-icon" onClick="menutoggle()">
		</div>
	
	<div class="small-container">
		<div class="col-3">
			<div class="news" onLoad="showSlides()"><br>
			<h2>Recent News</h2><br>
				<div class="slideshow-container">
					<div class="mySlides fade">
						<img src="IMG/345631467_128091616954727_225716492624650927_n.jpg" width="1000px" height="600px">
					</div>
					<div class="mySlides fade">
						<img src="IMG/349854860_161169446759222_3631082130298831078_n.jpg"  width="1000px" height="600px"/>	
					</div>
					<div class="mySlides fade">
						<img src="IMG/865502-caqnadraed-1516266751.png" width="1000px" height="600px"/>
					</div>
					<div class="mySlides fade">
						<img src="IMG/1685121350_72160655-ba10-4f86-bf10-f0a0228f771d-16851213503x2.avif" width="1000px" height="600px">
					</div>
				</div>
			</div>
		</div>
		<div class="row row-2">
			<h2>All Products</h2>
			<select>
				<option>Default Shorting</option>
				<option>Short by price</option>
				<option>Short by popularity</option>
				<option>Short by sale</option>
			</select>
		</div>
		<div class="row">
		<div class="row">
			<?php
				//DB connection
				@include 'config.php';

				//Error handling
				if(!$con){
					die("Cannot connect to DB server");
				}
				
				$sql = "SELECT * FROM `productTable` WHERE `published`= 1 ";

				$result = mysqli_query($con, $sql);

				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result))
					
					{
			?>
			<div class="col-4">
				<a href="<?php echo $row['path'];?>"><img src="<?php echo $row['path'];?>" width="300px" height="300px"></a>
				<h4><?php echo $row[ 'pName'];?></h4>
				<p><?php echo $row[ 'price'];?></p>
				<p>★★★★☆</p>
				<a href="AddtoCart.html" class="btn">Add to Cart</a>
			</div>

			<?php
					}
				}
				
				mysqli_close($con);

			?>
				
		</div>	
		</div>
			
		<div class="page-btn">
			<span>1</span>
			<span>2</span>
			<span>3</span>
			<span>>></span>
		</div>
	</div>
</div>
	
<!----------Footer---------->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Download Our App</h3>
					<p>Download App for Android and ios mobile phone.</p>
					<div class="app-logo">
						<img src="IMG/play-store.png">
						<img src="IMG/app-store.png">
					</div>
				</div>
				<div class="footer-col-2">
					<img src="IMG/sham-sports-high-resolution-logo-color-on-transparent-background.png">
					<p>Our Purpose Is Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.</p>
				</div>
				<div class="footer-col-3">
					<h3>Useful Link</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
						<li>Join Affiliate</li>
					</ul>
				</div>
				<div class="footer-col-4">
					<h3>Follow us</h3>
					<ul>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Youtube</li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2023 - Siyam</p>
		</div>
	</div>

<!-----------js for toggle menu----------->
	<script>
		var MenuItems = document.getElementById("MenuItems");
		
		MenuItems.style.maxHeight = "0px";
		
		function menutoggle(){
			if(MenuItems.style.maxHeight == "0px"){
				
				MenuItems.style.maxHeight = "200px";
			}
			else{
				
				MenuItems.style.maxHeight = "0px";
			}
		}
	</script>
<!-----------js for news img--------->
	<script>
		let slideIndex = 0;
		showSlides();

		function showSlides() {
			let i;
			let slides = document.getElementsByClassName("mySlides");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			slideIndex++;
			if (slideIndex > slides.length) {
				slideIndex = 1;
			}
			slides[slideIndex - 1].style.display = "block";
			setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
	</script>
</body>
</html>