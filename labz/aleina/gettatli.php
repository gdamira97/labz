<?php
	$conn = new mysqli("localhost", "root", "");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	mysqli_select_db($conn,"tatlilar");

	$result = mysqli_query($conn,"SELECT * FROM `tatli`");
	$theend = array();
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		array_push($theend, $row);
	}
	echo json_encode($theend);
?>
