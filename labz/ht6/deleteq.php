<?php
mysql_connect("localhost","root","");
mysql_select_db("web");
$query = "SELECT * FROM car ORDER BY manufacturer";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for ($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);
}
$id = $_REQUEST["id"];
header("location: ques.php");
?>
