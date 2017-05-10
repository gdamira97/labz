<?php
mysql_connect("localhost","root","");
mysql_select_db("web");
$query = "SELECT * FROM car ORDER BY manufacturer";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for ($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);?>
}
?>
Are sure you want to delete</br>
<a href="delete.php?id= <?= $row['id']?>">Delete</a>
<a href="retrieve.php">No</a>