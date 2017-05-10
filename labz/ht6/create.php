<?php
mysql_connect("localhost","root","");
mysql_select_db("web");
$model = $_REQUEST["model"];
$manufacturer = $_REQUEST["manufacturer"];
$year = $_REQUEST["year"];
$a = 0;
if(!empty($model)){
	if(!empty($manufacturer)){
		if(!empty($year)){
			if(preg_match('/^[-]?[0]|[1-9][0-9]$/',$year)){
			$a = 1;
		}
		}
	}
}
if($a==1){
if ($model && preg_match('/[A-Za-z0-9]+/',$model)){
	$query = "INSERT INTO `car`(`model`, `manufacturer`, `year`) VALUES ('$model','$manufacturer','$year')";
	mysql_query($query);
	header("location: retrieve.php");
}
else{
	echo "Error";
}
}
else{
	echo "Oops, error. <a href='new.php'>Back</a>";
}
?>