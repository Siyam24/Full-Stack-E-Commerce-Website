<?php
	@include 'config.php';

	session_start();

	if(!isset($_SESSION['user_name'])){
 	  header('location:login_form.php');
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>Add to Cart-Sham Sports</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
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
               		<li><a href="logged-out.php">Logout</a></li>
               		<li><a href="AboutPage.html">About Us</a></li>
				</ul>
			</nav>
			<img src="IMG/menu.png" class="menu-icon" onClick="menutoggle()">
		</div>
	</div>

<div class="container">
   <div class="content">
      <h1 style="text-align: center">Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p style="text-align: center">This is an user page.</p><br><br><br>
	  		<div class="row">
				<div class="col-4">
					<a href=""><img src="IMG/profile.jpg" width="100px" height="300px"></a>
					<a href=""><h4 style="text-align: center">Profile</h4></a>
				</div>
				<div class="col-4">
					<a href="ProductPage.php"><img src="IMG/view.png" width="100px" height="300px">
					<h4 style="text-align: center">Product Page</h4></a>
				</div>	
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
			<p class="copyright">Copyright 2023 -  Siyam</p>
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
</body>
</html>