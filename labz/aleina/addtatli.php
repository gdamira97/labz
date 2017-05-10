<?php
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: login.php");
	}
	else{?>
		<link rel="stylesheet" type="text/css" href="adminstyle.css">
		<div class="nav">
			<h3>ADD NEW TATLI</h3>
			<span><a href="logout.php">LOGOUT</a></span>
			<span><a href="admin.php">ORDERS</a></span>
			<span><a href="mytatlis.php">My Tatlis</a></span>
			<span>GO TO  <a href="index.html">Tatlilar.com</a></span>
		</div>
		<div class="form_container">
			<form action="upload.php" method="post" enctype="multipart/form-data" class="form">
				<input type="text" name="name" placeholder="Enter name of tatli" required><br>
				<input type="number" name="price" placeholder="Enter price of tatli" required><br>
				<textarea name="detail" placeholder="Enter name of tatli"> </textarea> <br>
				<input type="file" name="image"><br>
    			<input type="submit" value="ADD TATLI" name="submit" class="submit">
			</form>
		</div>
		<?
	}

?>