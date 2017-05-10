<?php
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: login.php");
	}
	else{
		$conn = new mysqli("localhost", "root", "");
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		mysqli_select_db($conn,"tatlilar");

		$result = mysqli_query($conn,"SELECT * FROM `tatli` ORDER by `id` DESC");
		?>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="adminstyle.css">
		<div class="nav">
			<h3>MY TATLIS</h3>
			<span><a href="logout.php">LOGOUT</a></span>
			<span><a href="admin.php">ORDERS</a></span>
			<span><a href="addtatli.php">Add new Tatli</a></span>
			<span>GO TO  <a href="index.html">Tatlilar.com</a></span>
		</div>
		<div class="orders_main">
			<h3>Update or Delete</h3>
			<ul id="adminorderslist"><?
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					?><li class="adminordersList_li">
						<form method="post" action="updatetatli.php">
							<input type="hidden" value="<?=$row['id']?>" name="tatli_id">
							<span class="order_name">Name: </span> <input type="text" value="<?=$row['name']?>" name="tatli_name"><br>
							<span class="order_name">Price: </span> <input type="number" value="<?=$row['price']?>" name="tatli_price"><br>
							<span class="order_name">Detail: </span> <textarea name="tatli_detail"><?=$row['detail']?></textarea><br>
							<span class="order_name">Image: </span> <img height="200" src="content/<?=$row['image']?>"><br>
							<input type="submit" value="UPDATE" name="submit">
							<input type="submit" value="DELETE" name="submit">
						</form>
					</li>
				<?}?>
			</ul>
		</div>
		<?
	}

?>