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
// CEK APAKAH TOMBOL SUBMIT SUDAH DITEKAN BELUM
	if ( isset($_POST["upload"]) ) {

		// CEK APAKAH BERHASIL DITAMBAHKAN ATAU TIDAK
		if ( tambah($_POST) > 0 ) {
			echo " 
				<script>
					alert( 'data berhasil ditambahkan !' );
					document.location.href = 'developer_list.php';
				</script>
			";
		} else {
			echo " 
				<script>
					alert( 'data gagal ditambahkan !' );
					document.location.href = 'developer_list.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Developer_Upload</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<link rel="shortcut icon" href="bg_logo/icon.png">

		<link rel="stylesheet" type="text/css" href="syntax/reset.css">
		<link rel="stylesheet" type="text/css" href="css/developer_upload.css">
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
			
				<form action=" " method="POST" enctype="multipart/form-data">
<!-- FORM-LOGIN --> 
						<h4>Upload Film</h4>
						<br><br>
					
							<label for="judul">Title :</label><br>
							<input type="text" name="judul_film" id="judul" required="">
							<br><br>
	<!-- Thumbnail -->					
							<label for="foto">Thumbnail :</label><br>
							<input type="file" name="thumb_film" id="foto" required="">
							<br><br>

							<label for="genre">Genre [ACTION | COMEDY | HOROR] :</label><br>
							<input type="text" name="genre_film" id="genre" required="">
							<br><br>
	<!-- movie -->
							<label for="movie">Movie :</label><br>
							<input type="file" name="movie_film" id="movie" required="">
							<br><br>

							<label for="tahun">Year [yyyy] :</label><br>
							<input type="tahun" name="tahun_film" id="tahun" required="">
							<br><br>

							<label for="country">Country :</label><br>
							<input type="text" name="country" id="country" required="">
							<br><br>

							<label for="sinopsis">Synopsis :</label><br>
							<textarea type="text" name="sinopsis" id="sinopsis"></textarea>

							<br><br><br><br>

<!-- FORM-CONFIRM-->	
						<a href="developer_list.php"><button type="button" name="back">Back</button></a>
						<button type="submit" name="upload">Upload</button>
				</form>	
			</div>	
		</div>	
	</body>
</html>