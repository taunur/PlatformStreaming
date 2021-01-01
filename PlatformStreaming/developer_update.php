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
	if ( !isset( $_GET["id_film"] ) || !isset( $_GET["judul_film"] ) || !isset( $_GET["thumb_film"] ) || !isset( $_GET["genre_film"] ) || !isset( $_GET["movie_film"] ) ) {
		
		header("location: developer_list.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Developer_Update</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<link rel="shortcut icon" href="bg_logo/icon.png">

		<link rel="stylesheet" type="text/css" href="syntax/reset.css">
		<link rel="stylesheet" type="text/css" href="css/developer_update.css">
	</head>

	<body>
		<div class="top-bar">
			<div class="logo">
				<a href="developer_list.php"><img src="bg_logo/Fil.mi.png" alt="Fil.mi" title="Fil.mi"></a>
				<h3>Fil.mi</h3>
			</div>
		</div>

		<div class="container">
			
			<div class="main-content">
			
<?php 
// AMBIL DATA DARI URL
	$id_film = $_GET["id_film"];

// QUERY UPDATE DATA
	$fm = query("SELECT * FROM tb_film WHERE id_film = $id_film")[0]; 


 
// CEK APAKAH TOMBOL UPDATE SUDAH DITEKAN BELUM
	if ( isset($_POST["update"]) ) {

		// CEK APAKAH BERHASIL DIUBAH ATAU TIDAK
		if ( update($_POST) > 0 ) {
			echo " 
				<script>
					alert( 'data berhasil diubah !' );
					document.location.href = 'developer_list.php';
				</script>
			";
		} else {
			echo " 
				<script>
					alert( 'tidak ada data yang diubah !' );
					document.location.href = 'developer_list.php';
				</script>
			";
		}
	}
?>
				<form action=" " method="POST" enctype="multipart/form-data">
<!-- FORM-LOGIN --> 
						<h4>Update Film</h4>
						<br><br>
							
							<input type="hidden" name="id_film" value="<?= $fm["id_film"]; ?>">
							<input type="hidden" name="oldThumb" value="<?= $fm["thumb_film"]; ?>">
							<input type="hidden" name="oldMovie" value="<?= $fm["movie_film"]; ?>">

							<label for="judul">Title :</label><br>
							<input type="text" name="judul_film" id="judul" required="" value="<?= $fm["judul_film"]; ?>">
							<br><br>
	<!-- Thumbnail -->					
							<label for="foto">Thumbnail : </label>
							<label for="foto" style="color: white; font-size: 14px;"><?= $fm["thumb_film"]; ?></label><br>
							<input type="file" name="thumb_film" id="foto">
							<br><br>

							<label for="genre">Genre [ACTION | COMEDY | HOROR] :</label><br>
							<input type="text" name="genre_film" id="genre" required="" value="<?= $fm["genre_film"]; ?>">
							<br><br>
	<!-- movie -->
							<label for="movie">Movie :</label>
							<label for="movie" style="color: white; font-size: 14px;"><?= $fm["movie_film"]; ?></label><br>
							<input type="file" name="movie_film" id="movie">
							<br><br>
							
							<label for="country">Country :</label><br>
							<input type="text" name="country" id="country" required="" value="<?= $fm["country"]; ?>">

							<br><br><br><br>

<!-- FORM-CONFIRM-->	
						<a href="developer_list.php"><button type="button" name="back">Back</button></a>
						<button type="submit" name="update">Update</button>
				</form>	
			</div>	
		</div>	
	</body>
</html>