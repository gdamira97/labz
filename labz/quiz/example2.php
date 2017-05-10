<?php
mysql_connect("localhost","root","");
mysql_select_db("quiz");
$query = "SELECT * FROM `Students` WHERE name LIKE '%a%' AND name NOT LIKE '%f%'";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for ($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);
	echo $row["name"];
}
?>