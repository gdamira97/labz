<?php
	$name = $_POST['name'];
	$phone = $_POST["phone"];
	include("database");
	mysqli_query($conn,"INSERT INTO `orders`(`name`, `phone`, `email`, `orders`) VALUES ('$name','$phone','$email','$orders')") or die("error occured");
	echo "success";
?>