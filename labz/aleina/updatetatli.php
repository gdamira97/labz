<?php
session_start();
$conn = new mysqli("localhost", "root", "");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_select_db($conn,"tatlilar");
$tatli_id =  $_POST['tatli_id'];
$tatli_name = $_POST['tatli_name'];
$tatli_price = $_POST['tatli_price'];
$tatli_detail = $_POST['tatli_detail'];
if($_POST['submit']=="UPDATE"){
	$result = mysqli_query($conn,"UPDATE `tatli` SET `name`='$tatli_name',`price`=$tatli_price,`detail`='$tatli_detail' WHERE `id`=$tatli_id");
}
else if($_POST['submit']=="DELETE"){
	$result = mysqli_query($conn,"DELETE FROM `tatli` WHERE `id`=$tatli_id");
}
header("Location: mytatlis.php");
?>