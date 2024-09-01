<?php 

session_start();
	
if (isset($_POST["btnSubmit"])){
	
		$pName = $_POST["txtProductName"];
		$price = $_POST["txtPrice"];
		
		if(isset($_POST["chkPublish"])){
			$status = 1;
		}
		else{
			$status = 0;
		}
		
	if(!file_exists($_FILES["imageFile"]["tmp_name"]) || !is_uploaded_file($_FILES["imageFile"]["tmp_name"])){
		
		$image = $_SESSION["imagePath"];
	}
	else{
		$image = "uploads/".basename($_FILES["imageFile"]["name"]);
		move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
	}
	
	//DB Connection
	@include 'config.php';
	
	if(!$con)
	{
		die("Sorry, We are facing a technical issue");
	}
	
	$sql = "UPDATE `productTable` SET `pName`='".$pName."',`price`='".$price."',`path`='".$image."',`published`='".$status."' WHERE `productTable`.`pId`='".$_SESSION["pId"]."'";

	if(mysqli_query($con, $sql)){
		header('location:viewProduct.php');
	}
	 
}
?>