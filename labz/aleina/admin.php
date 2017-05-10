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

		$result = mysqli_query($conn,"SELECT * FROM `orders` ORDER by `orderdate` DESC");
		?>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="adminstyle.css">
		<div class="nav">
			<h3>Good day, Aleina</h3>
			<span><a href="logout.php">LOGOUT</a></span>
			<span><a href="addtatli.php">Add new Tatli</a></span>
			<span><a href="mytatlis.php">My Tatlis</a></span>
			<span>GO TO  <a href="index.html">Tatlilar.com</a></span>
			<div class="clear"></div>
		</div>
		<div class="orders_main">
			<h3>Orders</h3>
			<ul id="adminorderslist"><?
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					?><li class="adminordersList_li">
						<span class="order_name"><?=$row['name']?></span><span class="order_phone"><?=$row["phone"]?></span>   <span class="order_email"><?=$row["email"]?></span>
						<ul class="adminorderslistlist">
							<?
								$id=json_decode($row['orders']);
								for($i=0;$i<sizeof($id);$i++){
								   $r= $id[$i];
									$result2 = mysqli_query($conn,"SELECT * FROM `tatli` WHERE id=$r");
									$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
									?><li><?=$row2['name']?>: <?=$row2['price']?>тг</li><?
								}
							?>
						</ul>
						   <span class="order_date"><?=$row['orderdate']?></span>
					</li>
				<?}?>
			</ul>
		</div>
	<?}
?>