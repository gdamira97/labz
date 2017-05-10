<?php
mysql_connect("localhost","root","");
mysql_select_db("web");
$id = $_REQUEST["id"];
$query = "SELECT * FROM car WHERE id=$id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<form action="update.php">
Model: <input type="text" name="model" value="<?= $row['model'] ?>"/><br/>
Manufacturer:   <select name="manufacturer">
                   <option selected value="<?= $row['manufacturer']?>"><?= $row['manufacturer'] ?></option>
			       <option value="toyota">Toyota</option>
			       <option value="bmw">BMW</option>
			       <option value="ford">Ford</option>
			       <option value="mercedes">Mercedes-Benz</option>
			       <option value="volkswagen">Volkswagen</option>
			       <option value="porche">Porsche</option>
			       <option value="audi">Audi</option>
			       <option value="ferrari">Ferrari</option>
		        </select></br>
Year: <input type="text" name="year" value="<?= $row['year'] ?>"/><br/>
<input type="hidden" name="id" value="<?= $row['id'] ?>"/><br/>
<input type="submit"/>
</form>