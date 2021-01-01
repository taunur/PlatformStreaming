<?php  
// MEMBUAT SESSION LOGIN
	session_start();

// JIKA SUDAH LOGIN MASUKKAN KEDALAM SHOWDATA
	if ( !isset($_SESSION["sign-in"]) ) {
	 	header('location: user_login.php');
	 	exit;
	}


// MENGHUBUNGKAN KONEKSI DATABASE
	require "koneksi.php";

?>

<?php 
// PERIZINAN AKSES
	if ( !isset( $_GET["judul_film"] ) || !isset( $_GET["thumb_film"] ) || !isset( $_GET["genre_film"] ) || !isset( $_GET["movie_film"] ) ) {
		
		header('location: developer_list.php');
		exit;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Developer_PlayMovies</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<link rel="shortcut icon" href="bg_logo/icon.png">

		<link rel="stylesheet" type="text/css" href="syntax/reset.css">
		<link rel="stylesheet" type="text/css" href="css/mov_film.css">
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	</head>
	
	<body>
		<div class="top-bar">
			<div class="logo">
				<a href="developer_list.php"><img src="bg_logo/Fil.mi.png" alt="Fil.mi" title="Fil.mi"></a>
				<h3>Fil.mi</h3>
			</div>
	
<!-- FUNCTION SEARCH -->
<?php  
	if ( isset($_POST["search"]) ) {
		$film = search($_POST["keyword"]);
		
		// JIKA DATA YANG DICARI TIDAK ADA
		if ( mysqli_affected_rows($conn) == false ) {
			header('location: dev_notfound.php');
		}
	}
?>			

			<div class="search">
				<form action="developer_search.php" method="POST">
					<button type="submit" name="search"><i class="fas fa-search"></i></button>
					
					<input type="search" id="gsearch" name="keyword" placeholder="Search a movie ...">
				</form>
			</div>

			<div class="navbar">
				<button><i class="fas fa-bars" id="btn"></i></button>
				<ul id="list">
					<li><a href="developer_list.php">Home</a></li>
					<li id="btn-btn"><a href="#">Genre</a></li>
						<ul id="list-list">
							<li><a href="dev_genreAction.php">Action</a></li>
							<li><a href="dev_genreComedy.php">Comedy</a></li>
							<li><a href="dev_genreHoror.php">Horor</a></li>
						</ul>
					<li style="color: rgba(255, 26, 26, 1); font-weight: bold; font-size: 18px;"><?= $_SESSION["username"]; ?></li>
					<li><a href="koneksi_logout.php">Log Out</a></li>
				</ul>
			</div>

			<script type="text/javascript" src="jscript/navbar.js"></script>
		</div>

		<div class="container">

<?php 
// AMBIL DATA DARI URL
	$movie_film = $_GET["movie_film"];

// QUERY UPDATE DATA
	$fm = query("SELECT * FROM tb_film WHERE movie_film = '$movie_film'")[0]; 
?>
			<div class="main-content">

				<video controls>
  					<source src="movies/<?= $fm["movie_film"]; ?>" type="video/mp4">
  				</video>

  				<div class="information">
  					<div class="left">
  						<h1><?= $fm["judul_film"]; ?></h1>
  						<br><br>

  						<div class="desc">	
	  						<img src="thumb/<?= $fm["thumb_film"]; ?>">
	  						
	  						<table>
	  							<tr>
	  								<td>Genre</td>
	  								<td>:</td>
	  								<td><?= $fm["genre_film"]; ?></td>
	  							</tr>
	  							<tr>
	  								<td>Country</td>
	  								<td>:</td>
	  								<td><?= $fm["country"]; ?></td>
	  							</tr>
	  							<tr>
	  								<td>Year</td>
	  								<td>:</td>
	  								<td><?= $fm["tahun_film"]; ?></td>
	  							</tr>
	  						</table>
	  					</div>	
  					</div>

  					<div class="right">
  						<br><br><br>
  						<p>Synopsis :</p><br>
  						<p><?= $fm["sinopsis"]; ?></p>
  					</div>
  				</div>
			</div>	


		</div>
	</body>
</html>