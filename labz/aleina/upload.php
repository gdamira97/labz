<?php
if(!isset($_POST['name']))die("You have no access to this area");
$target_dir = "content/";
$target_file = $target_dir.basename($_FILES["image"]["name"]);
$uploadOk = 1;
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$image = $_FILES['image']['name'];
$conn = new mysqli("localhost", "root", "");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
mysqli_select_db($conn,"tatlilar");
mysqli_query($conn,"INSERT INTO `tatli`(`name`, `price`, `detail`, `image`) VALUES ('$name',$price,'$detail','$image')");
echo "<link rel='stylesheet' type='text/css' href='adminstyle.css'><div class='nav'>".$name." was added successfully. <span>Add <a href='addtatli.php'> new tatli</a> or go back to <a href='admin.php'>admin page</a></span></div>";
?>