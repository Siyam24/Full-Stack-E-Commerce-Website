<?php 

	session_start();

	//DB connection
	@include 'config.php';
	
	//Error handling
	if(!$con)
	{
		die("Sorry, We are facing a technical issue");
	}
	
	$sql = "DELETE FROM `productTable` WHERE `productTable`.`pId` = ".$_GET["id"]."";
	
	if(mysqli_query($con, $sql)){
		
		header('location:viewProduct.php');
	}
?>