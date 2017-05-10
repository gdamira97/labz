<?php
mysql_connect("localhost","root","");
mysql_select_db("web");
$id = $_REQUEST["id"];
echo $id;
// $query = "DELETE FROM car WHERE id=$id";
// mysql_query($query);
// header("location: retrieve.php");
?>