<?php
// MEMBUAT SESSION LOGIN
	session_start();

// JIKA SUDAH LOGIN MASUKKAN KEDALAM SHOWDATA
	if ( isset($_SESSION["sign-in"]) ) {
	 	header('location: developer_list.php');
	 	exit;
	}


// MENGHUBUNGKAN KONEKSI DATABASE
	require "koneksi.php";


// APABILA BUTTON SIGN IN DI KLIK
	if ( isset($_POST["sign-in"]) ) {
		global $conn;

		$username = $_POST["username"];
		$password = $_POST["password"];

		$username = strtoupper( stripcslashes($username) );

		$result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password' ");

		// CEK USERNAME DAN PASSWORD APAKAH TERDAFTAR
		if ( mysqli_fetch_assoc($result) ) {
			
				// SET SESSION LOGIN
				$_SESSION["sign-in"] = true;

				// SET SESSION NAMA
				$_SESSION["username"] = $username;

				header('location: developer_list.php');
				exit;
		}

		$error = true;
	}

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Developer_Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<link rel="shortcut icon" href="bg_logo/icon.png">

		<link rel="stylesheet" type="text/css" href="syntax/reset.css">
		<link rel="stylesheet" type="text/css" href="css/developer_login.css">
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
			
			<div class="main-content">
			
				<form action=" " method="POST" enctype="multipart/form-data">
<!-- FORM-LOGIN -->
						<h4>Login by Admin</h4>
						<br><br>

						<?php if ( isset($error) ) : ?>
							<p style="color: rgba(255, 210, 0, 1); font-style: italic;"> username / password salah </p>
						<?php endif; ?>

						<div class="Username">
							<i class="fa fa-user"></i>
							<label for="username">Username</label><br>
							<input type="username" name="username" id="username" required=" " minlength="3" maxlength="12">
							<br><br>
						</div>

						<div class="password">
							<i class="fa fa-lock"></i>
							<label for="password">Password</label><br>
							<input type="password" name="password" id="password" required=" " minlength="3" minlength="8">
							<br><br>
						</div>		
<!-- FORM-CONFIRM-->	
						<button type="submit" name="sign-in">SIGN IN</button>				
				</form>
			</div>	
		</div>	
	</body>
</html>