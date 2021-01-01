<?php 
// MEMBUAT KONEKSI KE DATABASE
	$conn = mysqli_connect("localhost", "root", "", "db_filmi");




// *************** MEMBUAT FUNCTION SHOW DATA (READ)  *************** //
	function query($query) {
		global $conn;
		
		$result = mysqli_query($conn, $query);
		$boxs = [];

	// AMBIL DATA (FETCH) DARI VARIABEL RESULT DAN MASUKKAN KE ARRAY
		while ( $fm = mysqli_fetch_assoc($result) ) {
			$boxs[] = $fm;
		}
		return $boxs;
	}





// *************** FUNCTION UPLOAD THUMBNAIL *************** //
	function uploadThumb() {
		$namaGambar = $_FILES['thumb_film']['name'];
		$ukuranGambar = $_FILES['thumb_film']['size'];
		$tmpGambar = $_FILES['thumb_film']['tmp_name'];
		$error = $_FILES['thumb_film']['error'];

		// CEK APAKAH TIDAK ADA GAMBAR YANG DIUPLOAD (ERROR_VALUE = "4" -> TIDAK ADA )
		if ( $error === 4 ) {
			echo "<script>
					alert('pilih gambar terlebih dahulu');
				  </script>";

			return false;
		}

		// CEK APAKAH YANG DIUPLOAD ADALAH GAMBAR
		$formatGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
		$formatGambar = explode('.', $namaGambar);
		$formatGambar = strtolower( end($formatGambar) );

			// CEK APAKAH EKSTENSI GAMBAR YANG DI UPLOAD [$formatGambar] == EKSTENSI GAMBAR YANG DIPERBOLEHKAN [$formatGambarValid]
			if ( !in_array($formatGambar, $formatGambarValid) ) {
				echo "<script>
						alert('yang anda upload bukan gambar');
					  </script>";

				return false;	
			}

		// CEK UKURAN FILE YANG DI UPLOAD [max : 2MB]
		if ( $ukuranGambar > 2000000) {
			echo "<script>
					alert('ukuran gambar terlalu besar');
				  </script>";

			return false;
		}

		// APABILA LOLOS PERSYARATAN, COPY GAMBAR DARI FOLDER LAMA [$tmpGambar] KE FOLDER BARU[destionation]
		// GENERATE NAMA BARU -> Agar nama file tidak sama (UNIQUE)
		$namaGambarBaru = uniqid();
		$namaGambarBaru .= '.';
		$namaGambarBaru .= $formatGambar; 

		$folder = './thumb/'; // nama folder tempat penyimpanan baru

		move_uploaded_file($tmpGambar, $folder . $namaGambarBaru);

		return $namaGambarBaru;
	}





// *************** FUNCTION UPLOAD MOVIE *************** // 
	function uploadMovie() {
		$namaMovie = $_FILES['movie_film']['name'];
		$ukuranMovie = $_FILES['movie_film']['size'];
		$tmpMovie = $_FILES['movie_film']['tmp_name'];
		$error = $_FILES['movie_film']['error'];

		// CEK APAKAH TIDAK ADA VIDEO YANG DIUPLOAD (ERROR_VALUE = "4" -> TIDAK ADA )
		if ( $error === 4 ) {
			echo "<script>
					alert('pilih video terlebih dahulu');
				  </script>";

			return false;
		}

		// CEK APAKAH YANG DIUPLOAD ADALAH VIDEO
		$formatMovieValid = ['mp4', 'mov', 'mkv', 'avi'];
		$formatMovie = explode('.', $namaMovie);
		$formatMovie = strtolower( end($formatMovie) );

			// CEK APAKAH EKSTENSI Movie YANG DI UPLOAD [$formatMovie] == EKSTENSI Movie YANG DIPERBOLEHKAN [$formatMovieValid]
			if ( !in_array($formatMovie, $formatMovieValid) ) {
				echo "<script>
						alert('yang anda upload bukan video');
					  </script>";

				return false;	
			}

		// CEK UKURAN FILE YANG DI UPLOAD
		if ( $ukuranMovie > 4000000) {
			echo "<script>
					alert('ukuran video terlalu besar');
				  </script>";

			return false;
		}

		// APABILA LOLOS PERSYARATAN, COPY Movie DARI FOLDER LAMA [$tmpMovie] KE FOLDER BARU[destionation]
		// GENERATE NAMA BARU -> Agar nama file tidak sama (UNIQUE)
		$namaMovieBaru = uniqid();
		$namaMovieBaru .= '.';
		$namaMovieBaru .= $formatMovie; 

		$folder = './movies/'; // nama folder tempat penyimpanan baru

		move_uploaded_file($tmpMovie, $folder . $namaMovieBaru);

		return $namaMovieBaru;
	}





// *************** MEMBUAT FUNCTION TAMBAH DATA  *************** //
	function tambah($data) {
		global $conn;

	// AMBIL DATA DARI TIAP ELEMEN KEY DALAM FORM
		$judul_film = strtoupper( htmlspecialchars( $data["judul_film"] ) );
		$genre_film = strtoupper( htmlspecialchars( $data["genre_film"] ) );
		$tahun_film =  htmlspecialchars( $data["tahun_film"] );
		$country =  strtoupper( htmlspecialchars( $data["country"] ) );

		$sinopsis = strtolower( htmlspecialchars( $data["sinopsis"] ) );
		
	// UPLOAD THUMB_FILM
		$thumb_film = uploadThumb();
		if ( !$thumb_film ) {
			
			return false;
		}

	// UPLOAD MOVIE_FILM
		$movie_film = uploadMovie();
		if ( !$movie_film ) {
			
			return false;
		}
		
	// QUERY INSERT DATA
		$query = "INSERT INTO tb_film VALUES('', '$judul_film', '$thumb_film', '$genre_film', '$movie_film', '$tahun_film', '$country', '$sinopsis')";

		mysqli_query($conn, $query);	
	
	// MENGEMBALIKAN NILAI BERUPA "-1"(false) atau "1"(true)
		return mysqli_affected_rows($conn);
	}





// *************** MEMBUAT FUNCTION DELETE DATA  *************** //
	function hapus($id_film) {
		global $conn;

		// QUERY DELETE DATA
		$query = "DELETE FROM tb_film WHERE id_film = $id_film";

		mysqli_query($conn, $query);

		// MENGEMBALIKAN NILAI BERUPA "-1"(false) atau "1"(true)
		return mysqli_affected_rows($conn);
	}





// *************** MEMBUAT FUNCTION UPDATE DATA  *************** //
	function update($data) {
		global $conn;

	// AMBIL DATA DARI TIAP ELEMEN KEY DALAM FORM
		$id_film = $data["id_film"];

		$judul_film = strtoupper( htmlspecialchars( $data["judul_film"] ) );
		$genre_film = strtoupper( htmlspecialchars( $data["genre_film"] ) );
		$country = strtoupper( htmlspecialchars( $data["country"] ) );

		$oldThumb = htmlspecialchars($data["oldThumb"]);
		$oldMovie = htmlspecialchars($data["oldMovie"]);

	// CEK APAKAH USER MENGUBAH GAMBAR BARU ATAU TIDAK
		if ( $_FILES['thumb_film']['error'] === 4 ) {
			$thumb_film = $oldThumb;
		} else {
			$thumb_film = uploadThumb();
		}

	// CEK APAKAH USER MENGUBAH VIDEO BARU ATAU TIDAK
		if ( $_FILES['movie_film']['error'] === 4 ) {
			$movie_film = $oldMovie;
		} else {
			$movie_film = uploadMovie();
		}

	// QUERY INSERT DATA
		$query = "UPDATE tb_film SET 
					judul_film = '$judul_film', 
					thumb_film = '$thumb_film', 
					genre_film = '$genre_film', 
					movie_film = '$movie_film', 
					country = '$country'
				WHERE id_film = $id_film ";

		mysqli_query($conn, $query);	
	
		// MENGEMBALIKAN NILAI BERUPA "-1"(false) atau "1"(true)
		return mysqli_affected_rows($conn);
	}





// MEMBUAT FUNCTION SEARCH
	function search($keyword) {
		$query = "SELECT * FROM tb_film WHERE 
					judul_film LIKE '%$keyword%'";

		// MENGEMBALIKAN NILAI ASSOSIATIF
		return query($query);
	}	





// MEMBUAT FUNCTION REGISTER USER
	function registrasi($data) {
		global $conn;

		$username = strtolower( stripcslashes($data["username"]) );
		$email = strtolower( stripcslashes($data["email"]) );
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

		// CEK USERNAME SUDAH ADA ATAU BELUM
		$result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username' ");

		if ( mysqli_fetch_assoc($result) ) {
			echo "<script>
					alert('Username yang dibuat sudah ada !');
				 </script>";
			
			return false;
		} 

		// CEK EMAIL SUDAH ADA ATAU BELUM
		$result = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '$email' ");

		if ( mysqli_fetch_assoc($result) ) {
			echo "<script>
					alert('Username yang dibuat sudah ada !');
				 </script>";
			
			return false;
		}		

		// CEK KONFIRMASI PASSWORD 
		if ( $password !== $password2 ) {
			echo "<script>
					alert('Konfirmasi password salah');
				 </script>";
			
			return false;
		}

		// ENSKRIPSI PASSWORD
		$passwordValid =  password_hash($password2, PASSWORD_DEFAULT);

		// TAMBAHKAN USER BARU KEDATABASE
		$query = "INSERT INTO tb_user VALUES('', '$username', '$email', '$passwordValid')";

		mysqli_query($conn, $query);	

		return mysqli_affected_rows($conn);
	}










?>