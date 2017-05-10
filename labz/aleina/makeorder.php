<?php
	$name = $_POST['name'];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$orders = $_POST["order"];
	$conn = new mysqli("localhost", "root", "");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	mysqli_select_db($conn,"tatlilar");
	mysqli_query($conn,"INSERT INTO `orders`(`name`, `phone`, `email`, `orders`) VALUES ('$name','$phone','$email','$orders')") or die("error occured");
	echo "success";
?>