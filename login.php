<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = md5($_POST['password']);

   //Error handling
   if(!$con){
	die("Cannot connect to DB server");
   }
   
   $sql = " SELECT * FROM user_form WHERE email = '".$email."' && password = '".$pass."' ";

   $result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) > 0){

		$row = mysqli_fetch_array($result);

		if($row['user_type'] == 'admin'){

			$_SESSION['admin_name'] = $row['name'];
			header('location:admin_page.php');

		}
		elseif($row['user_type'] == 'user'){

			$_SESSION['user_name'] = $row['name'];
			header('location:user_page.php');
		}
	}
	else{
		$error[] = 'Incorrect email or password!';
	}

};
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>User login-Sham Sports</title>
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
					<li><a href="ProductPage.php">Product</a></li>
					<li><a href="register.php">Account</a></li>
					<li><a href="AboutPage.html">About Us</a></li>
				</ul>
			</nav>
			<a href="AddtoCart.html"><img src="IMG/cart.png" width="30px" height="30px"></a>
			<img src="IMG/menu.png" class="menu-icon" onClick="menutoggle()">
		</div>
	</div>
		
<!----------account page----------->
	<div class="account-page">
		<div class="container">
			<div class="row">
				<div class="col-2">
					<img src="IMG/Subject 2 2.PNG" width="100%">
				</div>
				<div class="col-2">
					<div class="form-container">
						
						<form action="" method="post">
						<h3>Sign In</h3>
						<input type="email" name="email" required placeholder="Email">
						<input type="password" name="password" required placeholder="Password">
						<?php
						if(isset($error)){
							foreach($error as $error){
								echo '<span class="error-msg">'.$error.'</span>';
							};
						};
						?>
						<input type="submit" name="submit" value="Login now" class="btn">
						<p>Don't have an account? <a href="register.php">Sign Up</a></p>
					</form>
					</div>
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