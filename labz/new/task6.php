<html>
<head>
	<style>
	#wrapper {
		border: black;
		background-color: lightgrey;
		color: black;
	}
	</style>
</head>
<body>
	<div id ="wrapper">
		<?php
		print_r($_COOKIE);
		mysql_connect("localhost","root","");
		mysql_select_db("cook");
		$query = "SELECT * FROM cars ORDER BY id";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);
		if ($num > 0) {
		    for($i=0;$i<$num;$i++){
		    	$row=mysql_fetch_array($result);
		    	if(isset($_COOKIE["stars"])){
					$stars = json_decode($_COOKIE["stars"]);
				}
				else{ $stars = [];}
		    	?>
		    	<div id = "box">
		    		<div class = "element" if = "text">
		    			<?= $row["name"]?><br>
		    			<?= $row["price"]?><br>
		    			<a href = "star.php?id=<?= $row["id"]?>"><?php
		    				if(in_array($row["id"], $stars)){
		    					?>Unstar <?php
		    				}
		    				else{
		    					?>Starred <?php
		    				}
		    				?>
		    			</a>
		    		</div>
		    		<?php
		    }
		} else {
		    echo "No data in database";
		}
		?>
	</div>
</body>
</html>