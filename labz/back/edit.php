<?php
mysql_connect("localhost","root","");
mysql_select_db("back");
$id = $_REQUEST["id"];
$query = "SELECT * FROM food WHERE id=$id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<form action="update.php">
Mid: <input type="text" name="mid" value="<?= $row['mid'] ?>"/><br/>
Name:   <input type="text" name="name" value="<?= $row['name'] ?>"/><br/>
Price: <input type="text" name="price" value="<?= $row['price'] ?>"/><br/>
<input type="hidden" name="id" value="<?= $row['id'] ?>"/><br/>
<input type="submit"/>
</form>