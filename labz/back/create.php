<?php
mysql_connect("localhost","root","");
mysql_select_db("back");
$mid = $_REQUEST["mid"];
$name = $_REQUEST["name"];
$price = $_REQUEST["price"];
$a = 0;
if(!empty($mid)){
	if(!empty($name)){
		if(!empty($price)){
			$a = 1;
		}
	}
}
if($a==1){
	$query = "INSERT INTO `food`(`mid`, `name`, `price`) VALUES ('$mid','$name','$price')";
	mysql_query($query);
	header("location: retrieve.php");
}
else{
	echo "Oops, error. <a href='new.php'>Back</a>";
}
?>