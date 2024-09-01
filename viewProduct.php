<?php
	session_start();

	if(!isset($_SESSION['admin_name'])){
	header('location:login_form.php');
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>About-Sham Sports</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="container">
		<div class="navber">
			<div class="logo">
				<img src="IMG/sham-sports-high-resolution-logo-color-on-transparent-background.png" width="200px">
			</div>
			<nav>
				<ul id="MenuItems">
					<li><a href="Index.html">Home</a></li>
					<li><a href="admin_page.php">Admin Page</a></li>
					<li><a href="AboutPage.html">About Us</a></li>
				</ul>
			</nav>
			<a href="AddtoCart.html"><img src="IMG/cart.png" width="30px" height="30px"></a>
			<img src="IMG/menu.png" class="menu-icon" onClick="menutoggle()">
		</div>
	<form action="viweProduct.php" method="get"></form>
		<div class="small-container">
		<div class="row">
			<?php

				//DB connection
				@include 'config.php';

				//Error handling
				if(!$con){
					die("Cannot connect to DB server");
				}
				
				$sql = "SELECT * FROM `productTable`";

				$result = mysqli_query($con, $sql);

				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result))
					
					{


			?>
			<div class="col-4">
				<a href="<?php echo $row['path'];?>"><img src="<?php echo $row['path'];?>" width="300px" height="300px"></a>
				<h4><?php echo $row['pName'];?></h4>
				<p><?php echo $row['price'];?></p>
				<p>★★★★☆</p>
				<a href="AddtoCart.html" class="btn">Add to Cart</a><br>
				<a href="editProduct.php?id=<?php echo $row["pId"];?>">Edit</a> | 
				<a href="DeleteProduct.php?id=<?php echo $row["pId"];?>">Delete</a>
			</div>

			<?php
					}
				}
				
				mysqli_close($con);

			?>
				
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
</body>
</html>