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
	<link rel="stylesheet" href="formStyle.css" type="text/css">
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
					<li><a href="login.php">Account</a></li>
					<li><a href="AboutPage.html">About Us</a></li>
				</ul>
			</nav>
			<a href="AddtoCart.html"><img src="IMG/cart.png" width="30px" height="30px"></a>
			<img src="IMG/menu.png" class="menu-icon" onClick="menutoggle()">
		</div>
	</div>
	
	
<!------------Add product------------->	
<div class="container"></div>
		<?php

			$_SESSION["pId"] = $_GET["id"];

			//DB connection
			@include 'config.php';
			
			//Error handling
			if(!$con){
				die("Sorry, We are facing a technical issue");
			}

			//Sql Query
			$sql = "SELECT * FROM `productTable` WHERE `pId`= '".$_GET["id"]."' ";

			//Execute the query against the database
			$result = mysqli_query($con, $sql);

			//Retrieve one row of data from DB
			$row = mysqli_fetch_assoc($result);
			
		?>
 	<div class="form-style-5">
		<form action="EditHandler.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Product Info</legend>
					<p>
					<input type="text" name="txtProductName" id="txtProductName" placeholder="Product Name *" value="<?php echo $row["pName"]; ?>" required/>
					<input type="text" name="txtPrice" id="txtPrice" placeholder="Price *" value="<?php echo $row["price"]; ?>" required/>
					<input type="file" name="imageFile" id="imageFile" placeholder="Upload a Picture" />
					</p><?php 
							$_SESSION["imagePath"]=$row["path"];
						?>
					<label for="chkPublish">Publish the Product :
                      <input type="checkbox" name="chkPublish" <?php 
							if($row["published"]==1){
								
								echo "Checked";
							}
						?>
						>
					</label>
			</fieldset>
				<p><input type="submit" name="btnSubmit" value="Add Post"/></p>
		</form>
	</div>
</div><br><br><br><br>

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