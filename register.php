<?php
  @include 'config.php';

	if(isset($_POST['submit'])){

		$name = mysqli_real_escape_string($con, $_POST['name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$pass = md5($_POST['password']);
		$cpass = md5($_POST['cpassword']);
		$user_type = $_POST['user_type'];
		
		//Error handling
			if(!$con){
				die("Cannot connect to DB server");
			}

		$sql = " SELECT * FROM user_form WHERE email = '".$email."' && password = '".$pass."' ";

		$result = mysqli_query($con, $sql);

			if(mysqli_num_rows($result) > 0){

				$error[] = 'User already exist!';

			}else{
				if($pass != $cpass){
					$error[] = 'Password not matched!';
				}else{
					$insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
					mysqli_query($con, $insert);
					header('location:login.php');
				}
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
					<li><a href="login.php">Account</a></li>
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
							<h3 >Sign Up</h3>
							<input type="text" name="name" required placeholder="Name">
							<input type="email" name="email" required placeholder="Email">
							<input type="password" name="password" required placeholder="Password">
							<input type="password" name="cpassword" required placeholder="Confirm Password">
							<select name="user_type">
								<option value="user">User</option>
								<option value="admin">Admin</option>
							</select>
							<?php
							if(isset($error)){
								foreach($error as $error){
									echo '<span class="error-msg">'.$error.'</span>';
								};
							};
							?>
							<input type="submit" name="submit" value="Register now" class="btn">
							<p>Have an account? <a href="login.php">Sign In</a></p>
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