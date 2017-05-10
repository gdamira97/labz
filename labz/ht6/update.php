<?php
mysql_connect("localhost","root","");
mysql_select_db("web");
$id	= $_REQUEST["id"];
$model = $_REQUEST["model"];
$manufacturer = $_REQUEST["manufacturer"];
$year = $_REQUEST["year"];
	$query = "UPDATE `car` SET `model`='$model',`manufacturer`='$manufacturer',`year`='$year' WHERE id=$id";
	mysql_query($query);
	header("location: retrieve.php");
?>