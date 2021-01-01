<?php  
// MEMBUAT SESSION LOGIN
	session_start();

// PERSYARATAN LOGIN
	if ( !isset($_SESSION["login"]) ) {
	 	header('location: user_login.php');
	 	exit;
	} 


// MENGHUBUNGKAN KONEKSI DATABASE
	require "koneksi.php";

?>

<!-- QUERY SHOW DATA -->
<?php 
	$film = query("SELECT * FROM tb_film ORDER BY id_film DESC"); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<link rel="shortcut icon" href="bg_logo/icon.png">

		<link rel="stylesheet" type="text/css" href="syntax/reset.css">
		<link rel="stylesheet" type="text/css" href="css/user_list.css">
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	</head>
	
	<body>
		<div class="top-bar">
			<div class="logo">
				<a href="index.php"><img src="bg_logo/Fil.mi.png" alt="Fil.mi" title="Fil.mi"></a>
				<h3>Fil.mi</h3>
			</div>
			
<!-- FUNCTION SEARCH -->
<?php  
	if ( isset($_POST["search"]) ) {
		$film = search($_POST["keyword"]);
		
		// JIKA DATA YANG DICARI TIDAK ADA
		if ( mysqli_affected_rows($conn) == false ) {
			header('location: usr_notfound.php');
		}
	}
?>

			<div class="search">
				<form action="user_search.php" method="POST">
					<button type="submit" name="search"><i class="fas fa-search"></i></button>
					
					<input type="search" id="gsearch" name="keyword" placeholder="Search a movie ...">
				</form>
			</div>

			<div class="navbar">
				<button><i class="fas fa-bars" id="btn"></i></button>
				<ul id="list">
					<li><a href="index.php">Home</a></li>
					<li id="btn-btn"><a href="#">Genre</a></li>
						<ul id="list-list">
							<li><a href="usr_genreAction.php">Action</a></li>
							<li><a href="usr_genreComedy.php">Comedy</a></li>
							<li><a href="usr_genreHoror.php">Horor</a></li>
						</ul>
					<li style="color: rgba(255, 26, 26, 1); font-weight: bold; font-size: 18px;"><?= $_SESSION["username"]; ?></li>
					<li><a href="koneksi_logout.php">Log Out</a></li>
				</ul>
			</div>

			<script type="text/javascript" src="jscript/navbar.js"></script>
		</div>

<!-- CONTAINER -->
		<div class="container">

			<?php foreach ($film as $fm) : ?>
				<div class="kotak">
					<a href="usr_mov_film.php?judul_film=<?= $fm["judul_film"]; ?> &thumb_film=<?= $fm["thumb_film"]; ?> &genre_film=<?= $fm["genre_film"]; ?> &movie_film=<?= $fm["movie_film"]; ?>">

						<img src="thumb/<?= $fm["thumb_film"]; ?>">
						<p><?= $fm["judul_film"]; ?></p>
						<p>( <?= $fm["tahun_film"]; ?> )</p>
						<p style="font-weight: normal; color: rgba(255, 210, 0, 1);"><?= $fm["genre_film"]; ?></p>

					</a>
				</div>
			<?php endforeach; ?>

		</div>
	</body>
</html>