<?php
mysql_connect("localhost","root","");
mysql_select_db("web");

$query = "SELECT * FROM car ORDER BY manufacturer";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for ($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);?>
	<?= $row["manufacturer"]?> <?= $row["model"]?> <?= $row["year"]?>
	<a href="deleteq.php?id= <?= $row['id']?>">Delete</a>
	<a href="edit.php?id=<?= $row['id']?>">Edit</a> <br/>
<?php
}
?>
<form action="create.php">
<input type="text" name="model"/></br>
		<select name="manufacturer">
			<option selected disabled>Choose manufacturer</option>
			<option value="toyota">Toyota</option>
			<option value="bmw">BMW</option>
			<option value="ford">Ford</option>
			<option value="mercedes">Mercedes-Benz</option>
			<option value="volkswagen">Volkswagen</option>
			<option value="porche">Porsche</option>
			<option value="audi">Audi</option>
			<option value="ferrari">Ferrari</option>
		</select></br>
		<input type="text" name="year"/></br>
		<input type="submit"/>
	</form>