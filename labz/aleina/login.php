<?php
	session_start();
	if(!isset($_SESSION['login'])){
		if(isset($_POST['from'])){
			if($_POST["login"]=="admin" && $_POST['password']=="123"){
				$_SESSION["login"]="admin";
				header("Location: admin.php");
			}
			else{
				session_unset("login");
				?>
				<link rel="stylesheet" href="adminstyle.css">
				<div class="form_container">
					<h3>Please, login to admin page</h3>
					<form action="login.php" method="post" class="form">
						<input type="hidden" name="from" value="auth">
						<input type="text" name="login" placeholder="login" required class="text">
						<input type="password" name="password" placeholder="password" required class="text">
						<p>Wrong login or password</p>
						<input type="submit" name="submit" value="enter" class="submit">
						<a href="index.html">TATLILAR.kz</a>
					</form>
				</div>
			<?}
		}
		else{?>
			<link rel="stylesheet" href="adminstyle.css">
			<div class="form_container">
				<h3>Please, login to admin page</h3>
				<form action="login.php" method="post" class="form">
					<input type="hidden" name="from" value="auth">
					<input type="text" name="login" placeholder="login" required class="text">
					<input type="password" name="password" placeholder="password" required class="text">
					<input type="submit" name="submit" value="enter" class="submit">
				</form>
				<a href="index.html">TATLILAR.kz</a>
			</div>
		<?}
	}
	else{
		header("Location: admin.php");
	}
	//$_SESSION["login"]="admin";

?>
