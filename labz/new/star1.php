
<?php
$star_id = $_REQUEST["star"];
if (isset($_COOKIE["stars"])){
	$stars = json_decode($_COOKIE["stars"]);
}
else{
	$stars = [];
}

$cookie_value = json_encode($stars);
setcookie("star", $cookie_value, time()+86400, '/');
header("location:conn.php");
?>