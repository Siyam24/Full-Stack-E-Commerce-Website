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
					<li><a href="AboutPage.html">About Us</a></li>
				</ul>
			</nav>
			<a href="AddtoCart.html"><img src="IMG/cart.png" width="30px" height="30px"></a>
			<img src="IMG/menu.png" class="menu-icon" onClick="menutoggle()">
		</div>
	</div><br><br>
	
<!------------Add product------------->	
<div class="container"></div>
 	<div class="form-style-5">
		<form action="addProduct.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Product Info</legend>
					<p>
					<input type="text" name="txtProductName" id="txtProductName" placeholder="Product Name *" required/>
					<input type="text" name="txtPrice" id="txtPrice" placeholder="Price *" required/>
					<input type="file" name="fileImage" id="fileImage" placeholder="Upload a Picture" required/>
					</p>
					<label for="chkPublish">Publish the Product :
                      <input type="checkbox" name="chkPublish">
					</label>
			</fieldset>
				<p><input type="submit" name="btnSubmit" value="Add Post"/></p>
				<?php

					if(isset($_POST["btnSubmit"])){
						$pName = $_POST["txtProductName"];
						$price = $_POST["txtPrice"];

						if(isset($_POST["chkPublish"])){
							$status = 1;
						}
						else{
							$status = 0;
						}

						$image = "uploads/".basename($_FILES["fileImage"]["name"]);
						move_uploaded_file($_FILES["fileImage"]["tmp_name"], $image);

						//DB connection
						@include 'config.php';
						
						//Error handling
						if(!$con){
							die("Sorry, We are facing a technical issue");
						}

						$sql = "INSERT INTO `productTable` (`pId`, `pName`, `price`, `path`, `published`) VALUES 
						(NULL, '".$pName."', '".$price."', '".$image."', '".$status."');";

						//Execute the query against the database
						if(mysqli_query($con, $sql)){
							echo "Product was uploaded successfully.";
						}
						else{
							echo "Oops, something went wrong, Please try again.";
						}
					}
				?>
				
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