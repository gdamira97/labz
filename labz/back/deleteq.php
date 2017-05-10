<?php
mysql_connect("localhost","root","");
mysql_select_db("back");
$query = "SELECT * FROM back ORDER BY name";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for ($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);
}
$id = $_REQUEST["id"];
header("location: delete.php?id= <?= $row[$id]?>");
?>
