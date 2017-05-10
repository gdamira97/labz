<?php
mysql_connect("localhost","root","");
mysql_select_db("back");
$id = $_REQUEST["id"];
echo $id;
$query = "DELETE FROM food WHERE id=$id";
mysql_query($query);
header("location: retrieve.php");
?>