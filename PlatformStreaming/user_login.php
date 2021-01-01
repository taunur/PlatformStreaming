<?php
// MEMBUAT SESSION LOGIN
	session_start();

// JIKA SUDAH LOGIN MASUKKAN KEDALAM SHOWDATA
	if ( isset($_SESSION["login"]) ) {
	 	header('location: index.php');
	 	exit;
	}


// MENGHUBUNGKAN KONEKSI DATABASE
	require "koneksi.php";


// APABILA BUTTON SIGN IN DI KLIK
	if ( isset($_POST["login"]) ) {
		global $conn;

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' ");

		// CEK USERNAME APAKAH ADA PADA TABEL TB_USER
		if ( mysqli_num_rows($result) === 1 ) {
			
			// CEK APAKAH PASSWORD BENAR 
			$row = mysqli_fetch_assoc($result);

			if ( password_verify($password, $row["password"]) ) {
				
				// SET SESSION LOGIN
				$_SESSION["login"] = true;

				// SET SESSION NAMA
				$_SESSION["username"] = strtoupper( $row["username"] );

				header('location: index.php');
				exit;
			}

		}

		$error = true;
	}

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login_user</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<link rel="shortcut icon" href="bg_logo/icon.png">

		<link rel="stylesheet" type="text/css" href="syntax/reset.css">
		<link rel="stylesheet" type="text/css" href="css/user_login.css">
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	</head>

	<body>
		<div class="top-bar">
			<div class="logo">
				<img src="bg_logo/Fil.mi.png" alt="Fil.mi" title="Fil.mi">
				<h3>Fil.mi</h3>
			</div>
		</div>

		<div class="container">
			<div class="text">
				<h3>Register Yourself,</h3>
				<h3>and Enjoy Watching Movies</h3>
			</div>

			<div class="main-content">
				<div class="thumbnail">
					<img src="thumb/avenger_endgame.jpg" alt="avenger_endgame" title="avenger_endgame">
					<img src="thumb/us.jpg" alt="us" title="us">
					<img src="thumb/joker.jpg">
					<img src="thumb/bird_of_prey.jpg"> 
				</div>
			
				<form action=" " method="POST" enctype="multipart/form-data">
<!-- FORM-LOGIN -->
					<div class="login">	 
						<h4>Fil.mi</h4>
						<br><br><br>

						<?php if ( isset($error) ) : ?>
							<p style="color: rgba(255, 210, 0, 1); font-style: italic;"> username / password salah </p>
						<?php endif; ?>

						<div class="username">
							<i class="fa fa-envelope"></i>
							<label for="username">Username</label><br>
							<input type="username" name="username" id="username" required=" " minlength="3" maxlength="12">
							<br><br>
						</div>

						<div class="password">
							<i class="fa fa-lock"></i>
							<label for="password">Password</label><br>
							<input type="password" name="password" id="password" required=" " minlength="3" maxlength="8">
							<br><br>
						</div>		
					</div>
<!-- FORM-CONFIRM-->	
					<div class="confirm">	
						<input type="checkbox" name="remember" id="remember"><label for="remember">Remember me </label>	
						<br><br>
						
						<button type="submit" name="login">SIGN IN</button>
						<br><br>
						
						<p>or</p>
						<br>

						<a href="user_register.php"><button type="button">SIGN UP</button></a>
						<br><br>

						<h6><a href="developer_login.php">Login by Admin</h6></a>
					</div>						
				</form>	
			</div>	
		</div>	
	</body>
</html>