<?php
mysql_connect("localhost","root","");
mysql_select_db("back");

$query = "SELECT * FROM food ORDER BY name";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for ($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);?>
	<?= $row["name"]?> <?= $row["mid"]?> <?= $row["price"]?>
	<a href="delete.php?id= <?= $row['id']?>">Delete</a>
	<a href="edit.php?id=<?= $row['id']?>">Edit</a> <br/>
<?php
}
?>
<form action="create.php">
        <input type="text" name="mid"/></br>
		<input type="text" name="name"/></br>
		<input type="text" name="price"/></br>
		<input type="submit"/>
	</form>