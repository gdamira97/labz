<?php
	$item = $_REQUEST["id"];
	if(isset($_COOKIE["stars"])){
		$stars = json_decode($_COOKIE["stars"]);
		}
	else{
		$stars = [];
	}
	if(in_array($item, $stars)){
				foreach ($stars as $index => $value) {
					if ($item == $value) {
						unset($stars[$index]);

					}
				}
		$time = time() + 60*60*24*7;
				setcookie("stars",json_encode($stars),$time);
			}
	else{
		$stars[] = $item;
		$string = json_encode($stars);
		$time = time() + 60*60*24*7;
		setcookie("stars",$string,$time);
	}
	header("location: task6.php");
?>
