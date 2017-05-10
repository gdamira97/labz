<?php
mysql_connect("localhost","root","");
mysql_select_db("back");
$id	= $_REQUEST["id"];
$mid = $_REQUEST["mid"];
$name = $_REQUEST["name"];
$price = $_REQUEST["price"];
	$query = "UPDATE `food` SET `mid`='$mid',`name`='$name',`price`='$price' WHERE id=$id";
	mysql_query($query);
	header("location: retrieve.php");
?>